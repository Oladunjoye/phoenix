<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.posts.index')->with('posts', Post::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count() == 0 || $tags->count() == 0){

            Session::flash('info', "You must have a category and tag set");

            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories', $categories)->with('tags',$tags);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // /
        $this->validate($request,[
        
        'title' => 'required|max:255',
        'feature' => 'required',
        'content' => 'required' ,
        'category_id' => 'required',
        

        ]);

       
        

         $feature = $request->feature;

         $feature_new_name = time().$feature->getClientOriginalExtension();

         $feature->move('uploads/posts/', $feature_new_name);

         $post = Post::create([

            'title' => $request->title,
            'content' => $request->content,
            'feature' => 'uploads/posts/'.$feature_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)
                     ]); 

            $post->tags()->attach($request->tags);
            $post->save();


         Session::flash('success', 'Post created successfully');

        // // $post = new Post;
        // // $post->title = $request->title;
        // // $post->content = $request->content;

        // // $post->save();
        return redirect()->route('posts');

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $post = Post::find($id);
        // 

        return view('admin.posts.edit')->with('post',$post)->with('categories', Category::all())->with('tags', Tag::all());
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

       

        $this->validate($request,[

            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'

       ]);

         $post = Post::find($id);

        if($request->hasFile('feature')){

            $feature = $request->feature;
            $feature_new_name = time().$feature->getClientOriginalName();

            $feature->move('uploads/posts', $feature_new_name );

            $post->feature = 'uploads/posts/'.$feature_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();
        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post updated successfully' );

        return redirect()->route('posts');



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

        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'Post has trashed successfully');

        return redirect()->back();
    }

     public function trashed()
    {
        //

        $posts = Post::onlyTrashed()->get();
      

        // Session::flash('success', 'Post has trashed successfully');

       
        return view('admin.posts.trashed')->with('posts',$posts);
    }
 public function kill($id){

    $post = Post::withTrashed()->where('id',$id)->first();
    $post->forceDelete();

    Session::flash('success', 'Post deleted permanently');


    return redirect()->back();


 }

 public function restore($id){

    $post = Post::withTrashed()->where('id', $id)->first();

    $post->restore();

    Session::flash('success', 'Post restored successfully');

    return redirect()->route('posts');
 }
}
  