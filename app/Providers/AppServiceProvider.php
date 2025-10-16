<?php

namespace App\Providers;

use App\Models\CompanyRole;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Проверка на то, может ли пользователь получить доступ к кнопке добавления контрагента
        Gate::define('user_can_add_or_remove_partner', function (User $user) {
            $user_role_id = CompanyRole::where('user_id', $user->id)->first()->role_id;
            if ($user_role_id == 1 || $user_role_id == 2) {
                return true;
            }
            return false;
        });
        // Проверка на то может ли создать пользователь тот или иной тип документа. 
        Gate::define('user_can_create_document', function (User $user, $document_type) {
            $user_role_id = CompanyRole::where('user_id', $user->id)->first()->role_id;
            if ($user_role_id == 1) return true;
            switch ($document_type) {
                case 'приказ':
                    if ($user_role_id < 3) {
                        return true;
                    }
                    break;
                case 'акт':
                    if ($user_role_id == 4) {
                        return true;
                    }
                    break;
                case 'договор':
                    if ($user_role_id == 2) {
                        return true;
                    }
                    break;
                case 'счет':
                    if ($user_role_id == 3) {
                        return true;
                    }
                    break;
                case 'заявка':
                    if ($user_role_id == 4) {
                        return true;
                    }
                    break;
                case 'отчет':
                    if ($user_role_id == 4) {
                        return true;
                    }
                    break;
                case 'записка':
                    if ($user_role_id == 4) {
                        return true;
                    }
                    break;
            }
            return false;
        });
    }
}
