@extends('my.layout')

@section('head')
    @include('my._head')
@endsection

@section('content')
    <form class="form-control" method="POST" action="{{ route('votes.store') }}">
        @csrf

        <input type="hidden" name="type" value="petition">

        <div class="mb-3" id="test">
            <label for="thesis" class="form-label">Тема петиции</label>
            <input value="{{ old('thesis') }}" type="text" class="form-control" id="thesis" name="thesis" aria-describedby="nameHelp">

            @error('thesis')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="container" id="answers_container">
            <p id="answers_list">Варианты ответов:</p>
            <div id="end_answers" class="mb-3">
                <input readonly name="answer_0"  class="form-control mb-2" value="Подписать">

            </div>
        </div>

        <div class="container" id="participants_container">
            <p id="participants_list">Участники опроса:</p>
            <div id="end_participants" class="mb-3"></div>
        </div>

        <div class="mb-3">
            <button id="submit" type="submit" class="btn btn-secondary" style="color: orange;">Добавить</button>
        </div>
    </form>

{{--    <div class="mb-3">--}}
{{--        <label for="answer" class="form-label mt-4">Добавить варианты ответов:</label>--}}
{{--        <input type="text" class="form-control" id="answer" name="answer" aria-describedby="nameHelp">--}}
{{--        --}}{{--        <div id="nameHelp" class="form-text">Какая то подсказка</div>--}}
{{--        <button id="add_answer" class="btn btn-secondary mt-3" style="color: orange;">Добавить</button>--}}
{{--    </div>--}}

    <div class="mt-3">
        <select class="form-select" id="select_user">
            <option selected disabled>Выберите участников</option>
            @foreach($users as $user)
                {{--                <option id="user{{ /** @var \App\Models\User $user */ $user->attributesToArray()['id'] }}">--}}
                <option id="user{{ $user->id }}">
                    <p hidden>{{ $user->id }}</p> {{ $user }}
                </option>
            @endforeach
        </select>
    </div>

    <script>
        let select = document.getElementById("select_user")
        // let participant_cnt = 0;
        select.onchange = function () {
            console.log(select.value)
            let user_id = select.value.split(" ")[0];
            let option = document.getElementById("user" + user_id);
            option.disabled = true;

            const participant = document.createElement("input")
            participant.id = "participant_" + user_id;
            participant.name = "participant_" + user_id;
            // participant_cnt++;
            participant.value = select.value
            participant.classList.add("form-control", "mb-2");
            participant.readOnly = true

            const end_participants = document.getElementById("end_participants");
            document.getElementById("participants_container").insertBefore(participant, end_participants);
        }
    </script>

    <script>
        let cnt = 0;
        document.getElementById("add_answer").onclick = function () {
            const input = document.createElement("input");
            let text_content = document.getElementById("answer").value

            input.id = "answer_" + cnt;
            input.name = "answer_" + cnt;
            cnt++;
            input.value = text_content;
            input.classList.add("form-control", "mb-2");

            const answers_list = document.getElementById("end_answers");
            document.getElementById("answers_container").insertBefore(input, answers_list);

            document.getElementById("answer").value = "";
        }
    </script>
@endsection
