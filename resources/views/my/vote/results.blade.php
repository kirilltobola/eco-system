@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <div class="mb-3">
        <div class="container">
            <h1 class="display-3">Результаты опроса</h1>
        </div>

        <div class="container">
            <h1 class="display-4">{{ $vote->thesis }}</h1>
        </div>

        @foreach($vote->choices as $choice)
            <div class="container p-2 mt-4">
                <ul class="list-group list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">{{ $choice->name }}</div>
                        </div>
                        <span class="badge bg-primary rounded-pill">{{/** @var Choice $choice */ $choice->users()->count() }}</span>
                    </li>
                </ul>
            </div>
{{--            <div class="form-check">--}}
{{--                <input class="form-check-input" value="{{ $choice->id }}" type="radio" disabled id="choice" name="choice">--}}
{{--                <label class="form-check-label" for="choice">--}}
{{--                    {{ $choice->name }}--}}
{{--                </label>--}}
{{--                <div>{{ /** @var Choice $choice */ $choice->users()->count() }}</div>--}}

{{--            </div>--}}
        @endforeach
    </div>
@endsection
