@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Вы успешно зарегистрировались!') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>
                            Чтобы продолжить работу, вам требуется <a href="{{ route('company.create') }}">зарегистрировать
                                компанию</a>,
                            либо получить приглашение от руководителя компании.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
