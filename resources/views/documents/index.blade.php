@extends('layouts.documents')

@section('title')
    Документы: новое
@endsection

@section('new')
    active
@endsection

@section('content')
    <div class="text-center text-secondary">
        <span class="material-symbols-outlined" style="font-size: 500%">
            folder_off
        </span>
        <h2>Новых документов нет</h2>
    </div>

    {{-- <h4>Недавно полученные документы</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>ИНН отправителя</th>
                <th>Email</th>
                <th>Статус</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Иван</td>
                <td>ivan@example.com</td>
                <td>Активен</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Анна</td>
                <td>anna@example.com</td>
                <td>Неактивен</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Петр</td>
                <td>petr@example.com</td>
                <td>Активен</td>
            </tr>
        </tbody>
    </table> --}}
@endsection
