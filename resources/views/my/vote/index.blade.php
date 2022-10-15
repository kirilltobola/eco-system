@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <div class="container-fluid justify-content-center mx-auto mt-2" style="max-width: 50rem;">
        @if(sizeof($votes) == 0)
            <div class="position-absolute top-50 start-50 translate-middle">
                <h1 class="display-2">Голосования отсутствуют</h1>
            </div>
        @endif

        @foreach($votes as $vote)
            <div class="card border-dark mb-3">
                <div class="card-header"></div>
                <div class="card-body text-dark">
                    <h5 class="card-title">
                        <a href="{{ route('votes.show', ['vote' => $vote->id]) }}">{{ $vote->thesis }}</a>
                    </h5>
                    <p class="card-text">
                        some text?
                    </p>
                </div>
            </div>
        @endforeach

        <div class="m-3" style=" position: fixed; bottom: 0px; right: 0px;">
            <a href="{{ route('votes.create') }}" type="button" class="btn btn-secondary btn-lg" style="color: orange;">Создать голосование</a>
        </div>
    </div>
@endsection
