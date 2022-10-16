@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <img src="https://imageio.forbes.com/specials-images/dam/imageserve/1063184564/960x0.jpg?format=jpg&width=960" height="300" class="card-img-top" alt="...">
                <div class="card-body" style="background-color: #eee">
                    <h5 class="card-title">Голосование</h5>
                    <a href="{{ route('votes.index') }}" class="btn btn-primary">Выбрать</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <img src="https://www.lansingcitypulse.com/uploads/original/20200320-134347-petition.jpg" height="300" class="card-img-top" alt="...">
                <div class="card-body" style="background-color: #eee">
                    <h5 class="card-title">Петиция</h5>
                    <a href="{{ route('petitions.index') }}" class="btn btn-primary">Выбрать</a>
                </div>
            </div>
        </div>
    </div>
@endsection
