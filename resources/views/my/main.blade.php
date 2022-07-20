@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <div class="container-fluid justify-content-center mx-auto mt-2" style="max-width: 50rem;">
        @if(sizeof($kaizens) == 0)
            <div class="position-absolute top-50 start-50 translate-middle">
                <h1 class="display-2">Пусто</h1>
            </div>
        @endif
        @foreach($kaizens as $kaizen)
            <div class="card border-dark mb-3">
                <div class="card-header"></div>
                <div class="card-body text-dark">
                    <h5 class="card-title">
                        <a href="{{ route('kaizens.show', ['kaizen' => $kaizen->id]) }}">{{ $kaizen->name }}</a>
                    </h5>
                    <p class="card-text">
                        {!! $kaizen->description !!}
                    </p>
                </div>

                <div class="container m-2">
                    <span @if($kaizen->category()->get()[0]->name == 'Проблема') class="badge text-bg-danger" @else class="badge text-bg-success" @endif>{{ $kaizen->category()->get()[0]->name }}</span>
                    <span class="badge text-bg-light">{{ $kaizen->status()->get()[0]->name }}</span>
                </div>
            </div>
        @endforeach

        <div class="m-3" style=" position: fixed; bottom: 0px; right: 0px;">
            <a href="{{ route('suggest') }}" type="button" class="btn btn-secondary btn-lg" style="color: orange;">Предложить</a>
        </div>
    </div>
@endsection
