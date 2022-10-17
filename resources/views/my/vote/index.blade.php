@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <div class="container-fluid justify-content-center mx-auto mt-2" style="max-width: 50rem;">
        @if(sizeof($votes) == 0)
            <div class="position-absolute top-50 start-50 translate-middle">
                <h1 class="display-2">Пусто</h1>
            </div>
        @endif

        @foreach($votes as $vote)
            <div class="card text-center mb-3">
                <div class="card-body text-dark">
                    <h5 class="card-title">
                        <a href="{{ route('votes.show', ['vote' => $vote->id]) }}">{{ $vote->thesis }}</a>
                    </h5>
                </div>
            </div>
        @endforeach

        <div class="m-3" style=" position: fixed; bottom: 0px; right: 0px;">
            <a @if ($petition) href="{{ route('petitions.create') }}" @else href="{{ route('votes.create') }}" @endif type="button" class="btn btn-secondary btn-lg" style="color: orange;">Создать</a>
        </div>
    </div>
@endsection
