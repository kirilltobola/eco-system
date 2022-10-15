@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <div class="card border-dark mb-3">
        @foreach($vote->choices as $choice)
            <div class="form-check">
                <input class="form-check-input" value="{{ $choice->id }}" type="radio" id="choice" name="choice"
                       @if($choice->id == $selected_choice->id) checked @else disabled @endif>
                <label class="form-check-label" for="choice">
                    {{ $choice->name }}
                </label>
                <div>{{ /** @var Choice $choice */ $choice->users()->count() }}</div>
            </div>
        @endforeach
    </div>
@endsection
