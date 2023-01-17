@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
<div class="row">
        <div class="col-sm-6">
            <div class="card mt-2">
                <img src="https://aif-s3.aif.ru/images/029/851/ea1af713ba4374ae9ac7e1825e0cad8d.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('kaizens.index', ['theme' => 'ecology']) }}">Экология</a>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card mt-2">
                <img src="https://grans.hse.ru/data/2020/11/06/1362073056/3scale_1200.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('kaizens.index', ['theme' => 'ecology']) }}">Цифровизация</a>
                    </h5>
                </div>
            </div>
        </div>
    
        <div class="col-sm-6">
            <div class="card mt-2">
                <img src="https://hb.bizmrg.com/rostbk.com-backup/uf/94a/94adafbf15685082a45befaa14da9969/c864d21e3a77ae4ac344042122fa6457.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('kaizens.index', ['theme' => 'ecology']) }}">Охрана Труда</a>
                    </h5>
                </div>
            </div>
        </div>

    </div>

    <!-- <a class="navbar-brand" href="{{ route('kaizens.index', ['theme' => 'ecology']) }}">Экология</a>
    <a class="navbar-brand" href="{{ route('kaizens.index', ['theme' => 'digital']) }}">Цифровизация</a>
    <a class="navbar-brand" href="{{ route('kaizens.index', ['theme' => 'ot']) }}">Охрана Труда</a> -->
@endsection
