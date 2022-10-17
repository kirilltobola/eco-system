@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <div class="container mb-3">
{{--        <div class="card-header">{{ $vote->thesis }}</div>--}}
{{--        <div class="card-body text-dark">--}}


            <form class="form-control p-4" method="POST" action="{{ route('votes.vote', ['vote' => $vote->id]) }}">
                @csrf

                <h2 class="display-4">Тема: {{ $vote->thesis }}</h2>
                <p class="lead">Варианты ответов:</p>
                @if($selected_choice != null)
                    @foreach($vote->choices as $choice)
                        <div class="form-check">
                            <input class="form-check-input" value="{{ $choice->id }}" type="radio" id="choice" name="choice"
                                   @if($choice->id == $selected_choice->id) checked @else disabled @endif>
                            <label class="form-check-label" for="choice">
                                {{ $choice->name }}
                            </label>
                        </div>
                    @endforeach
                @else
                    @foreach($vote->choices as $choice)
                        <div class="form-check">
                            <input class="form-check-input" value="{{ $choice->id }}" type="radio" id="choice" name="choice">
                            <label class="form-check-label" for="choice">
                                {{ $choice->name }}
                            </label>
                        </div>
                    @endforeach
                @endif

                <div class="mt-4">
                    <button class="btn btn-success" @if($selected_choice != null) disabled @endif type="submit">
                        Проголосовать
                    </button>
                </div>

                <div class="mt-3">
                    @if($vote->owner()->first()->id == Auth::user()->id)
                        <a type="button" href="{{ route('votes.results', ['vote' => $vote->id]) }}" class="btn btn-dark ml-3">Посмотреть результаты</a>
                    @endif
                </div>
            </form>
        </div>
@endsection
