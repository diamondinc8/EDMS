<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=add" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Документооборот</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Найди документ"
                            aria-label="Search" />
                        <button class="btn btn-outline-success" type="submit">Найти</button>
                    </form>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">Настройки</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="#" class="dropdown-item">Настройки профиля</a>
                                    <a href="#" class="dropdown-item">Информация о профиле</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="d-flex">
                <div class="col-2 mt-3 text-center">
                    <ul class="nav flex-column">
                        <div class="list-group">
                            <li class="nav-item">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#createDocumentForm"
                                    class="text-secondary-emphasis list-group-item list-group-item-action d-flex align-items-center">
                                    <span class="material-symbols-outlined me-2">
                                        add
                                    </span>
                                    Новый документ
                                </button>
                            </li>
                        </div>

                        <div class="list-group mt-3">
                            <a href="{{ route('index') }}"
                                class="list-group-item list-group-item-action {{ request()->routeIs('index') ? 'active' : '' }}"
                                aria-current="true">
                                Входящие документы
                            </a>
                            <a href="{{ route('orders') }}"
                                class="list-group-item list-group-item-action {{ request()->routeIs('orders') ? 'active' : '' }}">Приказы</a>
                            <a href="{{ route('acts') }}"
                                class="list-group-item list-group-item-action {{ request()->routeIs('acts') ? 'active' : '' }}">Акты</a>
                            <a href="{{ route('contracts') }}"
                                class="list-group-item list-group-item-action {{ request()->routeIs('contracts') ? 'active' : '' }}">Договоры</a>
                            <a href="{{ route('invoices') }}"
                                class="list-group-item list-group-item-action {{ request()->routeIs('invoices') ? 'active' : '' }}">Счета/счета
                                фактуры</a>
                            <a href="{{ route('requests') }}"
                                class="list-group-item list-group-item-action {{ request()->routeIs('requests') ? 'active' : '' }}">Заявки</a>
                            <a href="{{ route('reports') }}"
                                class="list-group-item list-group-item-action {{ request()->routeIs('reports') ? 'active' : '' }}">Отчеты</a>
                            <a href="{{ route('memos') }}"
                                class="list-group-item list-group-item-action {{ request()->routeIs('memos') ? 'active' : '' }}">Внутренние
                                служебные
                                записки</a>
                        </div>
                    </ul>
                </div>
                <!-- Модальное окно -->
                <div class="modal fade" id="createDocumentForm" tabindex="-1"
                    aria-labelledby="dynamicFormModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="dynamicFormModalLabel">Создание документа</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Закрыть"></button>
                            </div>

                            <div class="modal-body">
                                <form id="myForm" method="POST">
                                    <div class="mb-3">
                                        <label for="typeSelect" class="form-label">Выберите тип документа</label>
                                        <select class="form-select" id="typeSelect">
                                            <option value="">-- Выберите --</option>
                                            <option value="text">Текстовое поле</option>
                                            <option value="email">Email поле</option>
                                        </select>
                                    </div>

                                    <!-- Здесь будут добавляться новые поля -->
                                    <div id="additionalFields"></div>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Закрыть</button>
                                <button type="button" class="btn btn-primary">Отправить</button>
                            </div>

                        </div>
                    </div>
                </div>

                <script>
                    const typeSelect = document.getElementById('typeSelect');
                    const additionalFields = document.getElementById('additionalFields');

                    typeSelect.addEventListener('change', function() {
                        // Очищаем старые поля
                        additionalFields.innerHTML = '';

                        if (this.value === 'text') {
                            const input = document.createElement('input');
                            const input2 = document.createElement('input');
                            input.type = 'text';
                            input.className = ""
                            input2.type = 'text';
                            input.className = 'form-control mb-3';
                            input.placeholder = 'Введите текст';
                            input2.className = 'form-control mb-3';
                            input2.placeholder = 'Введите текст';
                            additionalFields.appendChild(input);
                            additionalFields.appendChild(input2);
                        }

                        if (this.value === 'email') {
                            const input = document.createElement('input');
                            input.type = 'email';
                            input.className = 'form-control mb-3';
                            input.placeholder = 'Введите email';
                            additionalFields.appendChild(input);
                        }
                    });
                </script>
                <div class="col-10 p-3">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    </div>
</body>

</html>
