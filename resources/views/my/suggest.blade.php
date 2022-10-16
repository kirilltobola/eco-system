@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card mt-2">
                <img src="https://cdn.ttgtmedia.com/rms/onlineimages/erp-kaizen_cycle_mobile.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Кайзен</h5>
                    <p class="card-text">
                        Кайзен – процесс непрерывного внесения улучшений, производимый каждым участником рабочего процесса на своем рабочем месте.
                        <br><br>
                        Кайзен  направлен на:
                        <ul>
                            <li>улучшения условий труда</li>
                            <li>снижения трудоёмкости</li>
                            <li>повышения безопасности  труда</li>
                            <li>повышения качества</li>
                            <li>снижения затрат </li>
                            <li>улучшения экологии </li>
                        </ul>
                        Кайзен должен быть:
                        <ul>
                            <li>малозатратным;</li>
                            <li>небольшое улучшение;</li>
                            <li>быстрореализуемый.</li>
                        </ul>
                        Построение системы KAIZEN-улучшений – ключ к повышению качества продукции и постоянному совершенствованию процессов производства.
                    </p>
                    <a href="{{ route('kaizens.create') }}" class="btn btn-primary">Предложить</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card mt-2">
                <img src="https://i.pinimg.com/originals/d9/76/50/d9765063d67573ad5877bffe56a1e68f.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Проект</h5>
                    <p class="card-text">Здесь будет описание</p>
                    <a href="{{ route('kaizens.create') }}" class="btn btn-primary disabled">Предложить</a>
                </div>
            </div>
        </div>
    </div>
@endsection
