<?php

namespace App\Services\Company;

use App\Models\Company;
use App\Models\CompanyContractors;
use App\Models\CompanyRole;

class Service
{
    public function createCompany(array $data)
    {
        // Создание компании
        $company = Company::firstOrCreate($data);

        // Получение id только что созданной компании
        $company_id = $company->id;
        // Создание массива для назначения роли создателя пользователю 
        $data_for_role = [
            'user_id' => $data['owner_id'],
            'company_id' => $company_id,
            'role_id' => 1,

        ];

        // Создание записи в таблице company_roles
        CompanyRole::firstOrCreate($data_for_role);
    }
    public function addContractor($data)
    {
        CompanyContractors::firstOrCreate($data);
    }
}
