<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostsRequest;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Post;
use App\Tag;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyCategoryCount')->only(['create', 'store']);
    }


    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

   
    public function store(CreatePostsRequest $request)
    {
        
       // upload image to storage
        $image = $request->image->store('posts');
        // created posts
             $post = Post::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'content'=> $request-> content,
                'image'=> $image,
                'category_id'=> $request->category,
                'published_at'=>$request->published_at,
                'user_id' =>auth()->user()->id
                 
            ]);
        
            if($request->tags)
                {
                    $post->tags()->attach($request->tags); 
                }
            //flash message
            session()->flash('message', 'Post Created Successfully');
            //redirect user
            return redirect(route('posts.index'));
        }

        
    public function show($id)
    {
        //
    }

    
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags',Tag::all());
       
    }

    
    public function update(Request $request, Post $post)
    {   
        $data = $request->only(['title','description','published_at', 'content']);
        
        //check if any new image
        if($request->hasFile('image')){
            //upload it
            $image = $request->image->store('posts');
            // delete the old one
            $post->deleteImage();
            $data['image'] = $image;
        }
            if($request->tags)
            {
                $post->tags()->sync($request->tags);
            }
              
            $post->update($data);
            session()->flash('message', 'Record has been updated');
            return redirect(route('posts.index'));
    }

   
    public function destroy($id)
    {
         $post = Post::withTrashed()->findOrFail($id);
                   if($post->trashed()){
                    $post->deleteImage();
                    
                    $post->forcedelete();
                   
            }else{
                $post->delete();
            }
            session()->flash('message', 'Record is trashed');
            return redirect()->back();
    }

    public function trashed()
    {
     $trashed = Post::onlyTrashed()->get(); 
     return view('posts.index')->with('trashed', $trashed); 
        // session()->flash('message', 'Record trashed successfully');
        
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        session()->flash('message', 'Record is successfully restored');
        return redirect(route('trashed-posts'));
    }
}
