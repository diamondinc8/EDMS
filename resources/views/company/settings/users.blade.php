@extends('layouts.companySettings')

@section('title')
    Настройки организации: работники
@endsection

@section('content')
    <table class="table">
        <h4>Сотрудники</h4>
        @can('user_can_add_or_remove_partner')
            <a href="" class="text-end" data-bs-toggle="modal" data-bs-target="#add">Добавить</a>
            <div class="modal fade" id="add" tabindex="-1" aria-labelledby="dynamicFormModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dynamicFormModalLabel">Добавление сотрудника
                            </h5>
                        </div>
                        <div class="modal-body">
                            <form id="myForm" method="POST" action="{{ route('employee.store') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">ID сотрудника:</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default" name="user_id" required>
                                </div>
                                <input type="text" name="company_id" hidden value="{{ $company_id }}">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Должность:</span>
                                    <select class="form-select" aria-label="Default select example" name="role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
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
