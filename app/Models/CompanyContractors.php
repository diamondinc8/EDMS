<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyContractors extends Model
{
    use HasFactory;
    protected $table =  'company_contractors';
    protected $guarded = false;
}
