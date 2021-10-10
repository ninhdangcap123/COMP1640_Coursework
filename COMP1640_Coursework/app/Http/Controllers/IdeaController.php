<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $ideas = Idea::orderBy('created_at', 'DESC')->paginate(5);
        $comments = Comment::all();
        $categories = Category::all();
        $users = User::all();
        return view('ideas.index', compact('ideas',
            'comments','categories', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $ideas = Idea::all();
        $comments = Comment::all();
        $categories = Category::all();
        $users = User::all();
        $userRoles = User::all();
        return view('ideas.create', compact('ideas',
            'comments','categories', 'users','userRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
            $ideas = Idea::create([
                'title' => $request->title,
                'description' =>$request->description,
                'user_id'=>$request->user_id,
                'category_id' => $request->category_id,


                ]);
        return redirect()->route('idea.index');



    }

    /**c
     * Display the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function show(Idea $idea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function edit(Idea $idea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Idea $idea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idea $idea)
    {
        //
    }
}
