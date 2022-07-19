<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand fs-4" href="{{ route('kaizens.index') }}" style="color:orange;">ЭКОСИСТЕМА</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" href="{{ route('kaizens.index', ['theme' => 'ecology']) }}">Экология</a>
            <a class="navbar-brand" href="{{ route('kaizens.index', ['theme' => 'digital']) }}">Цифровизация</a>
            <a class="navbar-brand" href="{{ route('kaizens.index', ['theme' => 'ot']) }}">ОТ</a>
            <a class="navbar-brand" href="{{ route('moderation.index') }}">Модерация</a>
        </div>

        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Найти проект" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Найти</button>
        </form>


        <div class="mx-3 d-flex">
            <a href="{{ route('dashboard') }}">Личный кабинет</a>
        </div>
    </div>
</nav>
