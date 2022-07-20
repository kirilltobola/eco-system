@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <div class="container-fluid justify-content-center mx-auto mt-2" style="max-width: 50rem;">
        @if(sizeof($kaizens) == 0)
            <div class="position-absolute top-50 start-50 translate-middle">
                <h1 class="display-2">Заявки отсутствуют</h1>
            </div>
        @endif
        @foreach($kaizens as $kaizen)
            <div class="card border-dark mb-3">
                <div class="card-header"></div>
                <div class="card-body text-dark">
                    <h5 class="card-title">
                        <a href="{{ route('moderation.show', ['kaizen' => $kaizen->id]) }}">{{ $kaizen->name }}</a>
                    </h5>
                    <p class="card-text">
                        {!! $kaizen->description !!}
                    </p>
                </div>

                <div class="container m-2">
                    <span @if($kaizen->category()->get()[0]->name == 'Проблема') class="badge text-bg-danger" @else class="badge text-bg-success" @endif>{{ $kaizen->category()->get()[0]->name }}</span>
                </div>
            </div>
        @endforeach
    </div>
@endsection
