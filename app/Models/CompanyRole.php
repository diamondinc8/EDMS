<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyRole extends Model
{
    use HasFactory;
    protected $table =  'company_roles';
    protected $guarded = false;
}
