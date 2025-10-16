@extends('layouts.documents')

@section('title')
    Добавление партнера
@endsection

@section('new')
    active
@endsection

@section('content')
    <h4>Таблица</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
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
    </table>
@endsection
