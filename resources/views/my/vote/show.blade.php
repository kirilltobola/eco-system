@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <div class="card border-dark mb-3">
        <div class="card-header">{{ $vote->thesis }}</div>
        <div class="card-body text-dark">
            <form class="form-control" method="POST" action="{{ route('votes.vote', ['vote' => $vote->id]) }}">
                @csrf
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

                <button class="btn btn-success" @if($selected_choice != null) disabled @endif type="submit">Add</button>
                @if($vote->owner()->first()->id == Auth::user()->id)
                    <a type="button" href="#" class="btn btn-dark">Посмотреть результаты</a>
                @endif
            </form>
        </div>
@endsection
