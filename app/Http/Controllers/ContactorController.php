<?php

namespace App\Http\Controllers;

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
    function add(ContractorRequest $request)
    {

        $tin = $request->validated();
        $companiesTins = Company::all()->pluck('tin')->toArray();

        $user = Auth::user();
        $company_id = CompanyRole::where('user_id', $user->id)
            ->value('company_id');

        if (in_array($tin['tin'], $companiesTins)) {
            $company_contractor_id = Company::where('tin', $tin['tin'])->first();
            $dataArray = [
                'company_id' => $company_id,
                'company_contractor_id' => $company_contractor_id['id'],
            ];
            $this->service->addContractor($dataArray);
            return redirect()->route('partners');
        }
        dd('Указан неверный ИНН.');
    }

    function destroy(CompanyContractors $partner)
    {
        $partner->delete();
        return redirect()->route('partners');
    }
}
