<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Services\CompanyService;

class CompanyController extends BaseController
{

    public function create()
    {
        return view('company.create');
    }

    public function store(CompanyRequest $request)
    {
        $data = $request->validated();
        $this->service->createCompany($data);

        return redirect()->route('company.index');
    }
}
