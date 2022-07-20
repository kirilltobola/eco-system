@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <div class="card border-dark mb-3">
        <div class="card-header">{{ $project->name }}</div>
        <div class="card-body text-dark">
            <h5 class="card-title">Регистрационный номер</h5>
            <h5 class="card-title">{{ $project->id }}</h5>

            <h5 class="card-title">Описание ситуации до кайзена</h5>
            <p class="card-text">{!! $project->description !!}</p>

            <h5 class="card-title">Предлагаемое улучшение</h5>
            <p class="card-text">{!! $project->improvement !!}</p>

            <h5 class="card-title">Результаты от внедрения кайзена</h5>
            <p class="card-text">{!! $project->result !!}</p>

            <h5 class="card-title">Авторы</h5>
            @foreach($project->authors()->get() as $author)
                <p class="card-text">{{ $author }}</p>
            @endforeach

            <h5 class="card-title">Группа внедрения</h5>
            @if(sizeof($project->implementationGroup()->get()) == 0)
                <p class="card-text">Отсутсвует</p>
            @endif
            @foreach($project->implementationGroup()->get() as $person)
                <p class="card-text">{{ $person }}</p>
            @endforeach

            <h5 class="card-title">Руководитель</h5>
            @if(sizeof($project->manager()->get()) == 0)
                <p class="card-text">Отсутсвует</p>
            @else
                <p class="card-text">{{ $project->manager()->get() }}</p>
            @endif

            <h5 class="card-title">Специалист отдела БС</h5>
                @if(sizeof($project->manager()->get()) == 0)
                    <p class="card-text">Отсутсвует</p>
                @else
                    <p class="card-text">{{ $project->bsSpecialist()->get() }}</p>
                @endif
        </div>

        <div class="container m-2">
            <span class="badge text-bg-success">{{ $project->category()->get()[0]->name }}</span>
        </div>
    </div>

<form method="POST" action="{{ route('moderation.moderate', ['kaizen' => $project->id]) }}">
    @csrf

    <div class="container-fluid justify-content-center mx-auto mt-2" style="max-width: 50rem;">

            <div class="mb-3">
                <label for="status" class="form-label">Статус</label>
                <select id="status" name="status" class="form-select" aria-label="Default select example">
                    <option selected disabled>Выберете статус</option>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>
                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-secondary" style="color: orange;">Опубликовать</button>
            </div>


        <div class="mb-3">
            <form method="DELETE" action="{{ route('moderation.delete', ['kaizen' => $project]) }}">
                @csrf
                <button type="submit" class="btn btn-danger" disabled>Удалить</button>
            </form>
        </div>
    </div>
</form>
@endsection
