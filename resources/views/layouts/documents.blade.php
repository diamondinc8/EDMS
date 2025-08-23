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


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container-fluid">
        <main class="py-4">
            <div class="d-flex">
                <div class="col-2 mt-3 text-center">
                    <ul class="nav flex-column">
                        <li class="nav-item"><button type="button" data-bs-toggle="modal"
                                data-bs-target="#createDocumentForm" class="btn btn btn-outline-secondary">Новый
                                документ</button>
                        </li>

                        <div class="list-group mt-3">
                            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                                Входящие документы
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">Приказы</a>
                            <a href="#" class="list-group-item list-group-item-action">Акты</a>
                            <a href="#" class="list-group-item list-group-item-action">Договоры</a>
                            <a href="#" class="list-group-item list-group-item-action">Счета/счета фактуры</a>
                            <a href="#" class="list-group-item list-group-item-action">Заявки</a>
                            <a href="#" class="list-group-item list-group-item-action">Отчеты</a>
                            <a href="#" class="list-group-item list-group-item-action">Внутренние служебные
                                записки</a>
                        </div>
                    </ul>
                </div>
                <!-- Модальное окно -->
                <div class="modal fade" id="createDocumentForm" tabindex="-1" aria-labelledby="dynamicFormModalLabel"
                    aria-hidden="true">
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
                <div class="col-9 p-3">
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
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    </div>
</body>

</html>
