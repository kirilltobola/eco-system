@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <div class="card border-dark mb-3">
        <div class="card-header">{{ $project->name}}</div>
        <div class="card-body text-dark">
            <h5 class="card-title">Описание</h5>
            <p class="card-text">{!! $project->description !!}</p>
        </div>

        <div class="container m-2">
            <span class="badge text-bg-success">{{ $project->category()->get()[0]->name }}</span>
        </div>
    </div>

<form method="POST" action="{{ route('moderation.moderate', ['kaizen' => $project->id]) }}">
    @csrf
    <div class="container-fluid justify-content-center mx-auto mt-2" style="max-width: 50rem;">
        <form>
            <div class="mb-3">
                <label for="status" class="form-label">Статус</label>
                <select id="status" name="status" class="form-select" aria-label="Default select example">
                    <option selected disabled>Выберете статус</option>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Описание реализации</label>
                <!-- Create the editor container -->
                <div id="editor" style="min-height: 20rem;"></div>
                <textarea id="realization_description" name="realization_description" style="display: none"></textarea>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-secondary" style="color: orange;">Опубликовать</button>
            </div>
        </form>

        <div class="mb-3">
            <form method="DELETE" action="{{ route('moderation.delete', ['kaizen' => $project]) }}">
                @csrf
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
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
        document.getElementById('realization_description').innerText = (document.getElementById('editor').querySelector('.ql-editor').innerHTML);
    });
</script>
@endsection
