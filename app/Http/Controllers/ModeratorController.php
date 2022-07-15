<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Status;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public function index()
    {
        $projects = Project::where('published', false)->get();

        return view(
            'my.moderator.index',
            ['projects' => $projects]
        );
    }

    public function show($id)
    {
        /** @var Project $project */
        $project = Project::find($id);
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
        /** @var Project $project */
        $project = Project::find($id);
        $status = $request->status;
        $realization_description = $request->realization_description;

        $project->published = true;
        $project->status()->associate($status);
        $project->realization_description = $realization_description;
        $project->save();

        return redirect()->route('moderation.index');
    }

    public function delete(Request $request)
    {

    }
}
