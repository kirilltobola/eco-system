@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <form class="form-control" method="POST" action="{{ route('projects.store') }}">

{{--        {{ csrf_field() }}--}}
        @csrf

        <div class="mb-3">
            <label for="headline" class="form-label">Заголовок проекта</label>
            <input type="text" class="form-control" id="headline" name="headline" aria-describedby="headlineHelp">
            <div id="headlineHelp" class="form-text">Опишите проект одним предложением</div>
        </div>


        <div class="mb-3">
            <label for="editor" class="form-label">Описание проекта</label>
            <!-- Create the editor container -->
            <div id="editor" style="min-height: 20rem;"></div>
            <textarea id="details" name="details" style="display: none"></textarea>
        </div>

        <div class="mb-3">
            <label for="theme" class="form-label">Тип</label>
            <select id="theme" name="theme" class="form-select" aria-label="Default select example">
                <option selected disabled>Выберете тип</option>
                @foreach($themes as $theme)
                    <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Тип</label>
            <select id="type" name="type" class="form-select" aria-label="Default select example">
                <option selected disabled>Выберете тип</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Категория</label>
            <select id="category" name="category" class="form-select" aria-label="Default select example">
                <option selected disabled>Выберете категорию</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-secondary" style="color: orange;">Добавить</button>
        </div>
    </form>

    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        let quill = new Quill('#editor', {
            theme: 'snow'
        });

        quill.on('text-change', function (delta, oldDelta, source) {
            document.getElementById('details').innerText = (document.getElementById('editor').querySelector('.ql-editor').innerHTML);
        });
    </script>
@endsection
