@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <div class="container-fluid justify-content-center mx-auto mt-2" style="max-width: 50rem;">

        @foreach($projects as $project)
            <div class="card border-dark mb-3">
                <div class="card-header"></div>
                <div class="card-body text-dark">
                    <h5 class="card-title">
                        <a href="{{ route('kaizens.show', ['kaizen' => $project->id]) }}">{{ $project->name }}</a>
                    </h5>
                    <p class="card-text">
                        {!! $project->description !!}
                    </p>
                </div>

                <div class="container m-2">
                    <span class="badge text-bg-success">{{ $project->category()->get()[0]->name }}</span>
                    <span class="badge text-bg-light">{{ $project->status()->get()[0]->name }}</span>
                </div>
            </div>
        @endforeach

        <div class="m-3" style=" position: fixed; bottom: 0px; right: 0px;">
            <a href="{{ route('suggest') }}" type="button" class="btn btn-secondary btn-lg" style="color: orange;">Предложить</a>
        </div>
    </div>
@endsection
