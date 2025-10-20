<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Employee\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends BaseController
{
    public function store(EmployeeRequest $request)
    {
        // Получение данных из формы
        $data = $request->validated();
        // Создание компании в SQl
        $this->service->addEmployee($data);
        // Переадресация на главную страницу
        return redirect()->route('company.settings.users');
    }
}
