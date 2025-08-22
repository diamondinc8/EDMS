<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleDocumentTypeCanCreate extends Model
{
    use HasFactory;
    protected $table =  'role_document_type_can_creates';
    protected $guarded = false;
}
