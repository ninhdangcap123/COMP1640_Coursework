<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\File;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Webpatser\Uuid\Uuid;
use ZipArchive;

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $idea = $request->all();
        $idea['uuid'] = (string)Uuid::generate();
        if ($request->hasFile('document')) {
            $idea['document'] = $request->document->getClientOriginalName();
            $request->document->storeAs('ideas', $idea['document']);
        }
        Idea::create($idea);

        return redirect()->route('idea.index');
    }
    public function fileDownload($uuid){
        $idea = Idea::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/ideas/' . $idea->document);
        return response()->download($pathToFile);
    }

    /**c
     * Display the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $idea = Idea::find($id);
        $comment = $idea->comment;
        return view('ideas.show', compact('idea',
            'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idea = Idea::find($id);
        $categories = Category::all();
        return view('ideas.edit', compact('idea',
        'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $idea = Idea::find($id);

        $idea->update([
            'title' => $request->title,
            'description'=> $request->description,
            'user_id'=> $request->user_id,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('idea.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $idea = Idea::find($id);
        $idea->delete();
        return redirect()->route('idea.index');
    }
    public function likeIdea($id)
    {
        $idea = Idea::find($id);
        $idea->like();
        $idea->save();

        return redirect()->route('idea.show', compact('id'));
    }

    public function unlikeIdea($id)
    {
        $idea =Idea::find($id);
        $idea->unlike();
        $idea->save();

        return redirect()->route('idea.show',compact('id'));
    }
    public function downloadAllAsZip(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {

        $zip = new ZipArchive;

        $fileName = 'AllFile.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('documents'));

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download(public_path($fileName));
    }
}
