<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Status;
use App\Models\Theme;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index(Request $reuqest)
    {
        $theme = $reuqest->get('theme', 'ecology');
        $_theme = Theme::where('name', $theme)->get()[0];

        $projects = Project::with('theme')
            ->where('theme_id', $_theme->id)
            ->where('published', true)
            ->get();

        return view(
            'my.main',
            [
                'projects' => $projects,
                'theme' => $theme,
            ]
        );
    }

    public function create()
    {
        return view(
            'my.add_project_form',
            [
                'themes' => Theme::all(),
                'types' => Type::all(),
                'categories' => Category::all(),
            ]
        );
    }


    public function store(Request $request)
    {
        $project = Project::factory()->create([
            'headline' => $request->headline,
            'details' => $request->details,
        ]);
        $project->type()->associate(Type::find($request->type));
        $project->status()->associate(Status::find(1));
        $project->categories()->save(Category::find($request->category));
        $theme = Theme::find($request->theme);
        $project->theme()->associate($theme);

        $project->save();

        return redirect()->route('projects.index');
    }


    public function show($id)
    {
        // TODO: use Project $project
        /** @var Project $project */
        $project = Project::find($id);
        $category = $project->categories()->get()[0]->name;
        $status = $project->status()->get()[0]->name;

        return view(
            'my.project',
            [
                'project' => $project,
                'category' => $category,
                'status' => $status,
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
        //
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
