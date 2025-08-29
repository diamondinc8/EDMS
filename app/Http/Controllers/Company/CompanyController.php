<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Services\CompanyService;

class CompanyController extends BaseController
{

    // Открытие формы для заполнения информации о компании
    public function create()
    {
        return view('company.create');
    }

    // Создание компании
    public function store(CompanyRequest $request)
    {
        // Получение данных из формы
        $data = $request->validated();
        // Создание компании в SQl
        $this->service->createCompany($data);
        // Переадресация на главную страницу
        return redirect()->route('index');
    }
}
