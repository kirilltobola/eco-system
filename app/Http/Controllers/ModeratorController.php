<?php

namespace App\Http\Controllers;

use App\Models\Kaizen;
use App\Models\Project;
use App\Models\Status;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public function index()
    {
        $kaizens = Kaizen::where('published', false)->get();

        return view(
            'my.moderator.index',
            ['kaizens' => $kaizens]
        );
    }

    public function show($id)
    {
        /** @var Kaizen $project */
        $project = Kaizen::find($id);
        $statuses = Status::all();

        return view(
            'my.moderator.project',
            [
                'project' => $project,
                'statuses' => $statuses
            ]
        );
    }

    public function moderate(Request $request, $id)
    {
        $request->validate([
            'status' => ['required'],
        ]);

        /** @var Kaizen $project */
        $project = Kaizen::find($id);
        $status = $request->status;
        $project->published = true;
        $project->status()->associate($status);
        $project->save();

        return redirect()->route('moderation.index');
    }

    public function delete(Request $request)
    {
        return "TODO";
    }
}
