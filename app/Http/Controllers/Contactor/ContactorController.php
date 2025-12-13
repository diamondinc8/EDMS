<?php

namespace App\Http\Controllers\Contactor;

use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContractorRequest;
use App\Models\Company;
use App\Models\CompanyContractors;
use App\Models\CompanyRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactorController extends BaseController
{
    public function index()
    {
        //$user = Auth::user();

        // Получаем ID компании, с которой связан пользователь
        $company_id = Auth::company_id();

        // Получаем партнёров компании (таблица связей)
        $company_partners = CompanyContractors::where('company_id', $company_id)
            ->get(['id', 'company_contractor_id']);

        // Извлекаем id компаний-партнёров
        $partner_company_ids = $company_partners->pluck('company_contractor_id')->toArray();

        // Загружаем все компании одним запросом
        $companies = Company::whereIn('id', $partner_company_ids)
            ->get(['id', 'name', 'tin'])
            ->keyBy('id'); // теперь можно быстро искать по id

        // Формируем итоговый массив с данными
        $company_partners_array = [];

        foreach ($company_partners as $partner) {
            $company = $companies->get($partner->company_contractor_id);

            if ($company) {
                $company_partners_array[] = [
                    'id' => $company->id,
                    'name' => $company->name,
                    'tin' => $company->tin,
                    'company_partner_id' => $partner->id
                ];
            }
        }

        return view('partners.index', compact('company_partners_array'));
    }

    function add(ContractorRequest $request)
    {

        $tin = $request->validated();
        $companiesTins = Company::all()->pluck('tin')->toArray();

        $company_id = Auth::company_id();

        if (in_array($tin['tin'], $companiesTins)) {
            $company_contractor_id = Company::where('tin', $tin['tin'])->first();
            $dataArray = [
                'company_id' => $company_id,
                'company_contractor_id' => $company_contractor_id['id'],
            ];
            $this->service->addContractor($dataArray);
            return redirect()->route('contractors.index');
        }
        dd('Указан неверный ИНН.');
    }

    function destroy(CompanyContractors $partner)
    {
        $partner->delete();
        return redirect()->route('contractors.index');
    }


    public function get_contractors_json()
    {
        // Получаем коллекцию контрагентов
        $contractors = Auth::company_contractors();

        // Возвращаем JSON
        return response()->json($contractors);
    }
}
