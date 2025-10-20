<?php

namespace App\Services\Contractor;

use App\Models\CompanyContractors;

class Service
{
    public function addContractor($data)
    {
        CompanyContractors::firstOrCreate($data);
    }
}
