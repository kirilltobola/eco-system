<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kaizen;
use App\Models\Project;
use App\Models\Status;
use App\Models\Theme;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaizenController extends Controller
{

    public function index(Request $reuqest)
    {
        $theme = $reuqest->get('theme', 'ecology');
        $_theme = Theme::where('name', $theme)->get()[0];

        $kaizens = Kaizen::with('theme')
            ->where('theme_id', $_theme->id)
            ->where('published', true)
            ->get();

        return view(
            'my.main',
            [
                'kaizens' => $kaizens,
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
                'categories' => Category::all(),
            ]
        );
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'improvement' => ['required'],
            'theme' => ['required'],
            'category' => ['required'],
        ]);



        /** @var Kaizen $kaizen */
        $kaizen = Kaizen::factory()->create([
            'name' => $request->name,
            'description' => $request->description,
            'improvement' => $request->improvement,
        ]);

        $kaizen->category()->associate(Category::find($request->category));
        $theme = Theme::find($request->theme);
        $kaizen->theme()->associate($theme);

        // $kaizen->status()->associate(Status::find(1));

        $kaizen->users()->attach(Auth::id(), ['type' => Kaizen::AUTHOR]);
        $kaizen->save();

        return redirect()->route('kaizens.index');
    }


    public function show($id)
    {
        // TODO: use Project $project
        /** @var Kaizen $project */
        $project = Kaizen::find($id);
        $category = $project->category()->get()[0]->name;
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
