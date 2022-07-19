@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <div class="container-fluid justify-content-center mx-auto mt-2" style="max-width: 50rem;">

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
                    <span class="badge text-bg-success">{{ $kaizen->category()->get()[0]->name }}</span>
                    <span class="badge text-bg-light">{{ $kaizen->status()->get()[0]->name }}</span>
                </div>
            </div>
        @endforeach
    </div>
@endsection
