<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoriesController extends Controller
{
   
    public function index()
    {
        return view('categories.index')->with('categories', Category::all());
        
    }


    public function create()
    {
        return view('categories.create');
    }

    
    public function store(Request $request)
    {
       
         $this->validate($request,[
            'name' => 'required|unique:categories'
         ]);

          Category::create([
              'name' =>$request->name
          ]);
          session()->flash('success', 'Successfully created.');
         return redirect(route('categories.index'));

    }


    public function show($id)
    {
        //
    }

   
    public function edit(Category $category)
    {
       return view('categories.create')->with('category', $category);
        
    }

    
    public function update(Request $request, Category $category)
    {
        $category->update([
            'name'=>$request->name
        
        ]);
        return redirect(route('categories.index'));
    }

    
    public function destroy($id)
    {
            $category = Category::withTrashed()->findOrFail($id);
            if($category->posts->count()>0)
            {
                session()->flash('warning', 'cant be deleted due to post exists in category');
                return redirect()->back();
            }
    
            elseif($category->trashed()){
                    $category->forceDelete();
                }
                else{
                    $category->delete();
                }
            session()->flash('message', 'Record is deleted');
            return redirect()->back();

    }

    public function trashed()
        {
            $trashed = Category::onlyTrashed()->get();

            return view('categories.index')->with('categories', $trashed); 
        }

}
