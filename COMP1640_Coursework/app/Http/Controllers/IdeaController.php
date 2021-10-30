<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;

use Illuminate\Support\Facades\File;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

use Vtiful\Kernel\Excel;
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
        $ideas = Idea::query()->orderBy('created_at', 'DESC')->paginate(5);
        $comments = Comment::all();
        $categories = Category::all();
        $users = User::all();
        return view('ideas.index', compact('ideas',
            'comments','categories', 'users'));
    }

    public function getIdeas($id){

        $ideas = Idea::query()->where('category_id', $id)->paginate();
        $comments = Comment::all();
        $categories = Category::all();
        $users = User::all();
        return view('ideas.index', compact('ideas',
            'comments','categories', 'users'));

    }

    public function myIdea(){
        $ideas = Idea::query()->where('user_id', auth()->user()->id)->paginate(5);
        $comments = Comment::all();
        $categories = Category::all();
        $users = User::all();
        return view('ideas.index', compact('ideas',
            'comments','categories', 'users'));
    }

    public function search(Request $request){
        $search = $request->input('search');
        $categories = Category::all();
        $users = User::all();

        // Search in the title and body columns from the posts table
        $ideas = Idea::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->paginate(5);

        // Return the search view with the resluts compacted
        return view('ideas.index', compact('ideas',
        'categories', 'users'));
    }    /**
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
        $idea = $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ]) ;
        $idea['uuid'] = (string)Uuid::generate();
        if ($request->hasFile('document')) {
            $idea['document'] = $request->document->getClientOriginalName();
            $request->document->storeAs('public/document', $idea['document']);
        }
        Idea::create($idea);

        return redirect()->back();
    }
    public function fileDownload($uuid){
        $idea = Idea::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/public/document/' . $idea->document);
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
        $categories = Category::all();
        $idea->increment('views');
        $comment = $idea->comment;
        return view('ideas.show', compact('idea',
            'comment', 'categories'));
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
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Idea $idea
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $idea = Idea::find($id);

        $this->validate($request,[
           'name'=>'required|max:255',
           'description'=>'required|max:255',
           'user_id'=>'required',
           'category_id'=>'required',
        ]);

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
    public static function writeArrayToCsvFile() : \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $table = Idea::all();
        $filename = "ideas.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('title', 'description', 'uuid', 'user_id','category_id','document'));

        foreach($table as $row) {
            fputcsv($handle, array($row['title'], $row['description'], $row['uuid'], $row['user_id'],
                $row['category_id'], $row['document']));
        }
        fclose($handle);
        $headers = array(
            'Content-Type' => 'text/csv',
        );
        return Response::download($filename, 'ideas.csv', $headers);
    }
    public function getLastestIdea(){
        $ideas = Idea::query()->orderBy('created_at', 'DESC')->paginate(5);
        $comments = Comment::all();
        $categories = Category::all();
        $users = User::all();

        return view('ideas.index', compact('ideas',
        'comments','categories','users'));
    }
    public function getMostViewedIdea(){
        $ideas = Idea::query()->orderBy('views', 'DESC')->paginate(5);
        $comments = Comment::all();
        $categories = Category::all();
        $users = User::all();
        return view('ideas.index', compact('ideas',
            'comments','categories','users'));

    }
    public function getMostCommentIdea(){
        $ideas = Idea::query()->withCount('comments')->paginate(5);
        $comments = Comment::all();
        $categories = Category::all();
        $users = User::all();

        return view('ideas.index', compact('ideas',
            'comments','categories','users'));
    }



}
