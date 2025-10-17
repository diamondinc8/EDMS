@extends('layouts.documents')

@section('title')
    Партнеры
@endsection

@section('content')
    <h4>Контрагенты</h4>
    @can('user_can_add_or_remove_partner')
        <a href="" class="text-end" data-bs-toggle="modal" data-bs-target="#add">Добавить</a>
        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="dynamicFormModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dynamicFormModalLabel">Добавление контрагента
                        </h5>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" method="POST" action="{{ route('partner.add') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">ИНН контрагента:</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" name="tin" required>
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
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>ИНН</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($company_partners_array as $company_partner)
                <tr>
                    <td>{{ $company_partner['id'] }}</td>
                    <td>{{ $company_partner['name'] }}</td>
                    <td>{{ $company_partner['tin'] }}</td>
                    <td>
                        @can('user_can_add_or_remove_partner')
                            <button type="button" data-bs-toggle="modal" data-bs-target="#delete"
                                class="text-secondary-emphasis list-group-item list-group-item-action d-flex align-items-center">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                            </button>
                        @endcan
                        <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="dynamicFormModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="dynamicFormModalLabel">Вы уверены что хотите удалить?
                                        </h5>
                                    </div>

                                    <div class="modal-body">
                                        <form id="myForm" method="POST"
                                            action="{{ route('partner.destroy', $company_partner['company_partner_id']) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-success"
                                                data-bs-dismiss="modal">Нет</button>
                                            <button class="btn btn-danger" type="submit">
                                                Да
                                            </button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
