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
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                    data-bs-target="#createDocumentForm">
                    Создать документ
                </button>
                <!-- Модальное окно -->
                <div class="modal fade" id="createDocumentForm" tabindex="-1" aria-labelledby="dynamicFormModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
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
                <div class="p-2 w-100">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    </div>
</body>

</html>
