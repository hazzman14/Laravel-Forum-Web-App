<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'title' => 'required|max:255',
            'body' => 'required|max:255',
            'cover_image' => 'image|nullable|max:1999'
            
        ]);

         //file upload
         if($request->hasFile('cover_image')){
            // get filename with whatever extension it has
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get only the ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store in db, makes filename unique incase identical images uploaded
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        


        //make new post
        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->cover_image = $fileNameToStore;
        $post->save();

        session()->flash('message', 'Post was created.');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::findOrFail($id);
        //check for user
        if(auth()->user()->id !== $post->user_id){
            session()->flash('error', 'Unauthorized');
            return redirect('/posts');
           
        }
        return view('posts.edit', ['post' => $post]);
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
        $validatedData = $request->validate([
            
            'title' => 'required|max:255',
            'body' => 'required|max:255',
            
        ]);

 //file upload
 if($request->hasFile('cover_image')){
    // get filename with whatever extension it has
    $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
    //get just the filename
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    //get only the ext
    $extension = $request->file('cover_image')->getClientOriginalExtension();
    //filename to store in db, makes filename unique incase identical images uploaded
    $fileNameToStore = $filename.'_'.time().'.'.$extension;
    //upload
    $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
}


        $post = Post::findOrFail($id);
       
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        if($request->hasFile('cover_image')){
        $post->cover_image = $fileNameToStore;
        }
        $post->save();

        session()->flash('message', 'Post was edited.');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        //check for user
        if(auth()->user()->id !== $post->user_id){
            session()->flash('error', 'Unauthorized');
            return redirect('/posts');
           
        }

        if($post->cover_image != 'noimage.jpg'){
            //delete 
            Storage::delete('public/cover_images/'.$post->cover_image);

        }

        $post->delete();

        return redirect()->route('posts.index')->with('message', 'Post was deleted.');
    }
}
