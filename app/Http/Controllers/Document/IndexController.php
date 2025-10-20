<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyContractors;
use App\Models\CompanyRole;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view('documents.index');
    }

    public function partners()
    {
        $user = Auth::user();

        // Получаем ID компании, с которой связан пользователь
        $company_id = CompanyRole::where('user_id', $user->id)
            ->value('company_id');

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
}
