<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{

    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $votes = $user->votes()->get();
        # dd($votes);

        return view(
            'my.vote.index',
            ['votes' => $votes]
        );
    }

    public function create()
    {

        /** @var Collection $users */
        $users = User::where('id', '!=', Auth::user()->id)->get();
        // dd($users);

        return view(
            "my.vote.create",
            ["users" => $users]
        );
    }

    public function store(Request $request)
    {
        $thesis = $request->get('thesis');
        $data = $request->except('_token', 'thesis');

        /** @var Vote $vote */
        $vote = Vote::factory()->create([
            'thesis' => $thesis
        ]);
        $vote->owner()->associate(Auth::user());
        $vote->save();

        foreach ($data as $key => $value) {
            if (str_contains($key, 'answer')) {
                /** @var Choice $choice */
                $choice = Choice::factory()->create([
                   'name' => $value
                ]);
                $choice->vote()->associate($vote);
                $choice->save();
            } else if (str_contains($key, 'participant')) {
                $user_id = explode('_', $key)[1];
                $vote->users()->attach($user_id);
            }
        }
        $vote->save();
    }

    public function show($id)
    {
        /** @var Vote $vote */
        $vote = Vote::find($id);
        $choices = $vote->choices()->get();

        $selected_choice = null;

        /** @var Choice $choice */
        $choicess = [];
        foreach ($choices as $choice) {
            if ($choice->users()->where('user_id', '=', Auth::user()->id)->get()->isNotEmpty()) {
                $selected_choice = $choice;
                break;
            }
        }

        # dd($choicess);
        return view(
            'my.vote.show',
            [
                'vote' => $vote,
                'selected_choice' => $selected_choice
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /** @var Vote $vote */
        $vote = Vote::find($id);

        // TODO: render view with $vote
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
