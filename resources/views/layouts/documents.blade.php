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
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <!--
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=add" />
    -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">{{ Auth::company_name() }}</a>
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
                            <a class="nav-link" href="{{ route('index') }}">Документооборот</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Найти документ"
                            aria-label="Search" />
                        <button class="d-inline-flex align-items-center btn btn-outline-success" type="submit">
                            <span class="material-symbols-outlined" style="margin-right: 0.09cm">
                                search
                            </span>
                            Найти</button>
                    </form>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="{{ route('company.settings.index') }}" class="nav-link active">Настройки
                                    организации</a>
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
                                    <span class="material-symbols-outlined" style="margin-right: 0.09cm">
                                        add
                                    </span>
                                    Новый документ
                                </button>
                            </li>
                        </div>

                        <div class="list-group mt-3">
                            <a href="{{ route('index') }}"
                                class="d-inline-flex align-items-center list-group-item list-group-item-action {{ request()->routeIs('index') ? 'active' : '' }}"
                                aria-current="true">
                                <span class="material-symbols-outlined" style="margin-right: 0.09cm">
                                    acute
                                </span>
                                Входящие документы
                            </a>
                            <a href="{{ route('orders') }}"
                                class="d-inline-flex align-items-center list-group-item list-group-item-action {{ request()->routeIs('orders') ? 'active' : '' }}">
                                <span class="material-symbols-outlined" style="margin-right: 0.09cm">
                                    orders
                                </span>
                                Приказы</a>
                            <a href="{{ route('acts') }}"
                                class="d-inline-flex align-items-center list-group-item list-group-item-action {{ request()->routeIs('acts') ? 'active' : '' }}">
                                <span class="material-symbols-outlined" style="margin-right: 0.09cm">
                                    format_list_numbered
                                </span>
                                Акты</a>
                            <a href="{{ route('contracts') }}"
                                class="d-inline-flex align-items-center list-group-item list-group-item-action {{ request()->routeIs('contracts') ? 'active' : '' }}">
                                <span class="material-symbols-outlined" style="margin-right: 0.09cm">
                                    contract
                                </span>
                                Договоры</a>
                            <a href="{{ route('invoices') }}"
                                class="d-inline-flex align-items-center list-group-item list-group-item-action {{ request()->routeIs('invoices') ? 'active' : '' }}">
                                <span class="material-symbols-outlined" style="margin-right: 0.09cm">
                                    receipt
                                </span>
                                Счета/счета
                                фактуры</a>
                            <a href="{{ route('requests') }}"
                                class="d-inline-flex align-items-center list-group-item list-group-item-action {{ request()->routeIs('requests') ? 'active' : '' }}">
                                <span class="material-symbols-outlined" style="margin-right: 0.09cm">
                                    fact_check
                                </span>
                                Заявки</a>
                            <a href="{{ route('reports') }}"
                                class="d-inline-flex align-items-center list-group-item list-group-item-action {{ request()->routeIs('reports') ? 'active' : '' }}">
                                <span class="material-symbols-outlined" style="margin-right: 0.09cm">
                                    list_alt_check
                                </span>
                                Отчеты</a>
                            <a href="{{ route('memos') }}"
                                class="d-inline-flex align-items-center list-group-item list-group-item-action {{ request()->routeIs('memos') ? 'active' : '' }}">
                                <span class="material-symbols-outlined" style="margin-right: 0.09cm">
                                    edit_calendar
                                </span>
                                Внутренние
                                служебные
                                записки</a>
                        </div>
                        <div class="list-group mt-3">
                            <!--
                                Переход на страницу с редактированием контрагентов компании. Должны иметь доступ только: основатель и менеджер
                                
                            -->
                            <a href="{{ route('submitted') }}"
                                class="d-inline-flex align-items-center list-group-item list-group-item-action {{ request()->routeIs('submitted') ? 'active' : '' }}">
                                <span class="material-symbols-outlined" style="margin-right: 0.09cm">
                                    reply
                                </span>
                                Отправленные
                                документы</a>
                        </div>
                        <div class="list-group mt-3">
                            <!--
                                Переход на страницу с редактированием контрагентов компании. Должны иметь доступ только: основатель и менеджер
                                
                            -->
                            <a href="{{ route('partners') }}"
                                class="d-inline-flex align-items-center list-group-item list-group-item-action {{ request()->routeIs('partners') ? 'active' : '' }}">
                                <span class="material-symbols-outlined" style="margin-right: 0.09cm">
                                    apartment
                                </span>
                                Контрагенты</a>
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
                                <form id="myForm" method="POST" action="{{ route('document.store') }}">
                                    <div class="mb-3">
                                        <label for="typeSelect" class="form-label">Выберите тип документа</label>
                                        <select class="form-select" id="typeSelect">
                                            <option value="">-- Выберите тип документа --</option>

                                            @can('user_can_create_document', 'приказ')
                                                <option value="order">Приказ</option>
                                            @endcan

                                            @can('user_can_create_document', 'акт')
                                                <option value="act">Акт</option>
                                            @endcan

                                            @can('user_can_create_document', 'договор')
                                                <option value="contract">Договор</option>
                                            @endcan

                                            @can('user_can_create_document', 'счет')
                                                <option value="invoice">Счет/счет-фактура</option>
                                            @endcan

                                            @can('user_can_create_document', 'заявка')
                                                <option value="request">Заявка</option>
                                            @endcan

                                            @can('user_can_create_document', 'отчет')
                                                <option value="report">Отчет</option>
                                            @endcan

                                            @can('user_can_create_document', 'записка')
                                                <option value="memo">Внутренняя служебная записка</option>
                                            @endcan


                                        </select>
                                    </div>

                                    <!-- Здесь будут добавляться новые поля -->
                                    <div id="additionalFields"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Закрыть</button>
                                        <button type="submit" class="btn btn-primary">Отправить</button>
                                    </div>
                                </form>
                            </div>
                            <script>
                                const typeSelect = document.getElementById('typeSelect');
                                const additionalFields = document.getElementById('additionalFields');

                                typeSelect.addEventListener('change', function() {
                                    // Очищаем старые поля
                                    additionalFields.innerHTML = '';


                                    if (this.value === 'order') {
                                        // Поле номера документа
                                        const numberGroup = document.createElement('div');
                                        numberGroup.className = "input-group mb-3";
                                        const spanNumberMessage = document.createElement('span');
                                        spanNumberMessage.className = "input-group-text";
                                        spanNumberMessage.id = "basic-addon1";
                                        spanNumberMessage.textContent = "№";
                                        const numberInput = document.createElement('input');
                                        numberInput.type = "number";
                                        numberInput.className = "form-control";
                                        numberInput.placeholder = "Номер документа";
                                        numberInput.name = "document_number";
                                        numberGroup.appendChild(spanNumberMessage);
                                        numberGroup.appendChild(numberInput);

                                        // Заголовок
                                        const titleGroup = document.createElement('div');
                                        titleGroup.className = "input-group mb-3";
                                        const spanTitleMessage = document.createElement('span');
                                        spanTitleMessage.className = "input-group-text";
                                        spanTitleMessage.id = "basic-addon1";
                                        spanTitleMessage.textContent = "Заголовок";
                                        const titleInput = document.createElement('input');
                                        titleInput.type = "input";
                                        titleInput.className = "form-control";
                                        titleInput.placeholder = "Заголовок документа";
                                        titleInput.name = "title";
                                        titleGroup.appendChild(spanTitleMessage);
                                        titleGroup.appendChild(titleInput);


                                        // Дата приказа
                                        const dateGroup = document.createElement('div');
                                        dateGroup.className = "input-group mb-3";
                                        const spanDateMessage = document.createElement('span');
                                        spanDateMessage.className = "input-group-text";
                                        spanDateMessage.id = "basic-addon2";
                                        spanDateMessage.textContent = "Дата";
                                        const dateInput = document.createElement('input');
                                        dateInput.type = "date";
                                        dateInput.className = "form-control";
                                        dateInput.name = "date";
                                        dateInput.placeholder = "Дата приказа";
                                        dateGroup.appendChild(spanDateMessage);
                                        dateGroup.appendChild(dateInput);

                                        // Содержание приказа
                                        const contentGroup = document.createElement('div');
                                        contentGroup.className = "input-group mb-3";

                                        const spanContentMessage = document.createElement('span');
                                        spanContentMessage.className = "input-group-text";
                                        spanContentMessage.id = "basic-addon3";
                                        spanContentMessage.textContent = "Содержание";

                                        const contentTextarea = document.createElement('textarea');
                                        contentTextarea.className = "form-control";
                                        contentTextarea.name = "content";
                                        contentTextarea.placeholder = "Содержание приказа";

                                        contentGroup.appendChild(spanContentMessage);
                                        contentGroup.appendChild(contentTextarea);

                                        // Добавление файлов
                                        const fileGroup = document.createElement('div');
                                        fileGroup.className = "input-group mb-3";

                                        const spanFileMessage = document.createElement('span');
                                        spanFileMessage.className = "input-group-text";
                                        spanFileMessage.id = "basic-addon4";
                                        spanFileMessage.textContent = "Приложения";

                                        const fileInput = document.createElement('input');
                                        fileInput.type = "file";
                                        fileInput.name = "documents[]";
                                        fileInput.className = "form-control";
                                        fileInput.multiple = true;

                                        fileGroup.appendChild(spanFileMessage);
                                        fileGroup.appendChild(fileInput);


                                        additionalFields.appendChild(numberGroup);
                                        additionalFields.appendChild(titleGroup);
                                        additionalFields.appendChild(dateGroup);
                                        additionalFields.appendChild(contentGroup);
                                        additionalFields.appendChild(fileGroup);
                                    }
                                    if (this.value === 'act') {
                                        // Поле номера документа
                                        const numberGroup = document.createElement('div');
                                        numberGroup.className = "input-group mb-3";
                                        const spanNumberMessage = document.createElement('span');
                                        spanNumberMessage.className = "input-group-text";
                                        spanNumberMessage.id = "basic-addon1";
                                        spanNumberMessage.textContent = "№";
                                        const numberInput = document.createElement('input');
                                        numberInput.type = "number";
                                        numberInput.className = "form-control";
                                        numberInput.placeholder = "Номер документа";
                                        numberInput.name = "document_number";
                                        numberGroup.appendChild(spanNumberMessage);
                                        numberGroup.appendChild(numberInput);

                                        // Выбор компании получателя
                                        const recipientCompanyGroup = document.createElement('div');
                                        recipientCompanyGroup.className = "input-group mb-3";
                                        const spanRecipientCompanyMessage = document.createElement('span');
                                        spanRecipientCompanyMessage.className = "input-group-text";
                                        spanRecipientCompanyMessage.textContent = "Получатель документа";

                                        const recipientCompanySelect = document.createElement('select');
                                        recipientCompanySelect.className = "form-select"; // исправлено
                                        recipientCompanySelect.name = "recipient_company_id";

                                        const defaultOption = document.createElement('option');
                                        defaultOption.value = "";
                                        defaultOption.textContent = "Выберите контрагента";
                                        defaultOption.disabled = true;
                                        defaultOption.selected = true;
                                        recipientCompanySelect.appendChild(defaultOption);

                                        fetch('/api/contractors')
                                            .then(res => res.json())
                                            .then(contractors => {
                                                contractors.forEach(contractor => {
                                                    const option = document.createElement('option');
                                                    option.value = contractor.id;
                                                    option.textContent = `${contractor.tin} - ${contractor.name}`;
                                                    recipientCompanySelect.appendChild(option);
                                                });
                                            })
                                            .catch(err => console.error('Ошибка при загрузке контрагентов:', err));

                                        recipientCompanyGroup.appendChild(spanRecipientCompanyMessage);
                                        recipientCompanyGroup.appendChild(recipientCompanySelect);

                                        // Заголовок
                                        const titleGroup = document.createElement('div');
                                        titleGroup.className = "input-group mb-3";
                                        const spanTitleMessage = document.createElement('span');
                                        spanTitleMessage.className = "input-group-text";
                                        spanTitleMessage.id = "basic-addon1";
                                        spanTitleMessage.textContent = "Заголовок";
                                        const titleInput = document.createElement('input');
                                        titleInput.type = "input";
                                        titleInput.className = "form-control";
                                        titleInput.placeholder = "Заголовок документа";
                                        titleInput.name = "title";
                                        titleGroup.appendChild(spanTitleMessage);
                                        titleGroup.appendChild(titleInput);


                                        // Дата приказа
                                        const dateGroup = document.createElement('div');
                                        dateGroup.className = "input-group mb-3";
                                        const spanDateMessage = document.createElement('span');
                                        spanDateMessage.className = "input-group-text";
                                        spanDateMessage.id = "basic-addon2";
                                        spanDateMessage.textContent = "Дата";
                                        const dateInput = document.createElement('input');
                                        dateInput.type = "date";
                                        dateInput.className = "form-control";
                                        dateInput.name = "date";
                                        dateInput.placeholder = "Дата акта";
                                        dateGroup.appendChild(spanDateMessage);
                                        dateGroup.appendChild(dateInput);

                                        // Содержание приказа
                                        const contentGroup = document.createElement('div');
                                        contentGroup.className = "input-group mb-3";

                                        const spanContentMessage = document.createElement('span');
                                        spanContentMessage.className = "input-group-text";
                                        spanContentMessage.id = "basic-addon3";
                                        spanContentMessage.textContent = "Содержание";

                                        const contentTextarea = document.createElement('textarea');
                                        contentTextarea.className = "form-control";
                                        contentTextarea.name = "content";
                                        contentTextarea.placeholder = "Содержание акта";

                                        contentGroup.appendChild(spanContentMessage);
                                        contentGroup.appendChild(contentTextarea);

                                        // Добавление файлов
                                        const fileGroup = document.createElement('div');
                                        fileGroup.className = "input-group mb-3";

                                        const spanFileMessage = document.createElement('span');
                                        spanFileMessage.className = "input-group-text";
                                        spanFileMessage.id = "basic-addon4";
                                        spanFileMessage.textContent = "Приложения";

                                        const fileInput = document.createElement('input');
                                        fileInput.type = "file";
                                        fileInput.name = "documents[]";
                                        fileInput.className = "form-control";
                                        fileInput.multiple = true;

                                        fileGroup.appendChild(spanFileMessage);
                                        fileGroup.appendChild(fileInput);

                                        additionalFields.appendChild(numberGroup);
                                        additionalFields.appendChild(recipientCompanyGroup);
                                        additionalFields.appendChild(titleGroup);
                                        additionalFields.appendChild(dateGroup);
                                        additionalFields.appendChild(contentGroup);
                                        additionalFields.appendChild(fileGroup);
                                    }
                                });
                            </script>

                        </div>
                    </div>
                </div>

                <div class="col-10 p-3">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    </div>
</body>

</html>
