<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $users = User::all();
        $userRoles = UserRole::all();
        return view('category.index', compact('categories','userRoles','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $categories = Category::create([
            'name' => $request->name,
            'idea_start_date'=>$request->idea_start_date,
            'idea_end_date'=>$request->idea_end_date,
            'comment_start_date'=>$request->comment_start_date,
            'comment_end_date'=>$request->comment_end_date,
        ]);
        return redirect()->route('qam.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $category= Category::find($id);

        $this->validate($request,[
            'name' => 'required|max:255',
            'idea_start_date'=>'before:idea_end_date',
            'comment_start_date'=>'before:comment_end_date',
        ]);

        $category->update([
            'name' => $request->name,
            'idea_start_date'=>$request->idea_start_date,
            'idea_end_date'=>$request->idea_end_date,
            'comment_start_date'=>$request->comment_start_date,
            'comment_end_date'=>$request->comment_end_date,

        ]);

        return redirect()->route('qam.home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $categories =Category::find($id);
        $categories->delete();
        return Redirect::back();

    }
}
