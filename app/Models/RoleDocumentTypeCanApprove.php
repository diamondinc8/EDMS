<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleDocumentTypeCanApprove extends Model
{
    use HasFactory;
    protected $table =  'role_document_type_can_approves';
    protected $guarded = false;
}
