<?php

namespace App\Services\Employee;

use App\Models\CompanyRole;

class Service
{
    public function addEmployee($data)
    {
        CompanyRole::firstOrCreate($data);
    }
}
