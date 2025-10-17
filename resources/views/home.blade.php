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

                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Ваш ID:</h5>
                                <p class="card-text fs-4" id="copyText">{{ Auth::id() }}</p>
                                <button class="btn btn-outline-primary" onclick="copyText()">
                                    <i class="bi bi-clipboard"></i> Копировать
                                </button>
                            </div>
                            Отправьте его вашему начальнику, чтобы получить доступ к документообороту.
                        </div>
                        <hr class="border border-secondary border-2 opacity-50">
                        <div class="text-center mb-1">
                            Или вы можете зарегистрировать компанию. <a href="{{ route('company.create') }}">Для этого
                                откройте
                                форму регистрации.</a>
                            </p>
                            Если вы зашли не в тот аккаунт вы можете <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('выйти.') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </a>
                            <p>
                        </div>
                        <script>
                            function copyText() {
                                const text = document.getElementById('copyText').innerText;
                                navigator.clipboard.writeText(text).then(() => {
                                    const btn = event.currentTarget;
                                    btn.innerHTML = '<i class="bi bi-check2"></i> Скопировано!';
                                    setTimeout(() => btn.innerHTML = '<i class="bi bi-clipboard"></i> Копировать', 1500);
                                });
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
