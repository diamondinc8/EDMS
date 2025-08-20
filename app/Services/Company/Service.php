<?php

namespace App\Services\Company;

use App\Models\Company;

class Service
{
    public function createCompany(array $data)
    {
        Company::create($data);
    }
}
