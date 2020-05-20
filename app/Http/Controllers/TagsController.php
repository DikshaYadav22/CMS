<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreateTagsRequest;
use App\Tag;

class TagsController extends Controller
{
    
    public function index()
    {
        return view('tags.index')->with('tags', Tag::all());
    }

   
    public function create()
    {
      return view('tags.create');  
    }

    
    public function store(Request $request)
    {
        if(Tag::all()->count()>0)
        {
            session()->flash('warning', 'Tag already exists, please create new one');
            return redirect()->back();  
        }
        Tag::create([
            'name'=>$request->name
        ]);
        session()->flash('message', 'Tags created successfully');
        return redirect(route('tags.index'));
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(Tag $tag)
    {
        
        return view('tags.create')->with('tag', $tag);
    }

    
    public function update(Request $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name
        ]);
        session()->flash('message', 'Tags updated successfully');
        return redirect(route('tags.index'));
    }

   
    public function destroy(Tag $tag)
    {
        if($tag->posts->count()>0)
        {
            session()->flash('warning', "Tags can't be deleted as post exists");
            return redirect()->back();
        }
        $tag->delete();
        session()->flash('warning', 'Tag deleted');
        return redirect(route('tags.index'));
    }
}
