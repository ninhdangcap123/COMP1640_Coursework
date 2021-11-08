<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $userRoles = UserRole::all();
        $departments = Department::all();
        return view('user.index', compact('users',
            'userRoles','departments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $userRoles = UserRole::all();
        $departments = Department::all();
        return view('user.create', compact('users'
            , 'userRoles','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email',
            'user_role_id' => 'required',
            'department_id' => 'required',
        ]);

       User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password),
            'user_role_id' =>$request->user_role_id,
            'department_id'=>$request->department_id,
        ]);
        return redirect()->route('admin.home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id){

        $user = User::find($id);
        $userRoles = UserRole::all();
        $departments = Department::all();
        return view('user.edit', compact('user',
            'userRoles','departments'));
    }

    public function update(Request $request, $id){

        $user = User::find($id);

        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email',
            'user_role_id' => 'required',
            'department_id'=>'required',
        ]);

        $user->update([
           'name' => $request->name,
           'email'=> $request->email,
           'password'=> Hash::make($request->password),
           'user_role_id' => $request->user_role_id,
           'department_id'=>$request->department_id,
        ]);

        return redirect()->route('admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        return Redirect::back();
    }
}
