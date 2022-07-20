@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <form class="form-control" method="POST" action="{{ route('kaizens.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Название кайзена</label>
            <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
            <div id="nameHelp" class="form-text">Опишите проект одним предложением</div>

            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="theme" class="form-label">Направление</label>
            <select id="theme" name="theme" class="form-select" aria-label="Default select example">
                <option selected disabled>Выберете направление</option>
                @foreach($themes as $theme)
                    <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                @endforeach
            </select>

            @error('theme')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Категория</label>
            <select id="category" name="category" class="form-select" aria-label="Default select example">
                <option selected disabled>Выберете категорию</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            @error('category')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="editor" class="form-label">Описание ситуации до кайзена</label>
            <!-- Create the editor container -->
            <div id="editor" style="min-height: 20rem;">{!! old('description') !!}</div>
            <textarea id="description" name="description" style="display: none">{!! old('description') !!}</textarea>

            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="editor1" class="form-label">Предлагаемое улучшение</label>
            <!-- Create the editor container -->
            <div id="editor1" style="min-height: 20rem;">{!! old('improvement') !!}</div>
            <textarea id="improvement" name="improvement" style="display: none">{!! old('improvement') !!}</textarea>

            @error('improvement')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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
            document.getElementById('description').innerText = (document.getElementById('editor').querySelector('.ql-editor').innerHTML);
        });

        let quill1 = new Quill('#editor1', {
            theme: 'snow'
        });
        quill1.on('text-change', function (delta, oldDelta, source) {
            document.getElementById('improvement').innerText = (document.getElementById('editor1').querySelector('.ql-editor').innerHTML);
        });
    </script>
@endsection
