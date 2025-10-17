<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanySettings extends BaseController
{
    function index()
    {
        $user = Auth::user();
        $company_id = CompanyRole::where('user_id', $user->id)->value('company_id');
        $company = Company::find($company_id);

        return view('company.settings.index');
    }
    function users()
    {
        $user = Auth::user();
        $company_id = CompanyRole::where('user_id', $user->id)->value('company_id');
        $workers = CompanyRole::where('company_id', $company_id)->get(['user_id'])->toArray();
        $roles = CompanyRole::where('company_id', $company_id)->get(['role_id'])->toArray();

        $roles_name = Role::find($roles)->pluck('name')->toArray();
        $users = User::whereIn('id', $workers)->get(['id', 'name', 'surname', 'email'])->toArray();

        for ($i = 0; $i < count($users); $i++) {
            $users[$i]['role'] = $roles_name[$i];
        }

        return view('company.settings.users', compact('users'));
    }
}
