@extends('layouts.companySettings')

@section('title')
    Настройки организации: работники
@endsection

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Почта</th>
                <th scope="col">Роль</th>
                <th scope="col">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user['id'] }}</th>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['surname'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['role'] }}</td>
                    <td>
                        @can('user_can_add_or_remove_partner')
                            <div class="d-flex flex-row gap-2">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#delete"
                                    class="text-secondary-emphasis list-group-item list-group-item-action d-flex align-items-center">
                                    <span class="material-symbols-outlined">person_cancel</span>
                                </button>

                                <button type="button" data-bs-toggle="modal" data-bs-target="#edit"
                                    class="text-secondary-emphasis list-group-item list-group-item-action d-flex align-items-center">
                                    <span class="material-symbols-outlined">edit</span>
                                </button>
                            </div>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
