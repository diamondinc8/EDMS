<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class contractor_category_of_activity extends Model
{
    use HasFactory;
    protected $table =  'contractors_categories_of_activities';
    protected $guarded = false;
}
