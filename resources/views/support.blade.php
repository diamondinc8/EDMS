@extends('layouts.main')

@section('title')
    Поддержка
@endsection

@section('content')
    <form action="#" method="POST">
        <input type="hidden" value="{{ Auth::id() }}" name="user_id">
        <div class="mb-3 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Заголовок запроса</label>
            <input name="title" type="string" class="form-control" id="exampleFormControlInput1" placeholder="Заголовок">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Текст запроса</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
        </div>
        <div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Выберите изображение (не обязательно)</label>
                <input class="form-control" type="file" id="formFileMultiple" multiple>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Отправить запрос</button>
    </form>
@endsection
