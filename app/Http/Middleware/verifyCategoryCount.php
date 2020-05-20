<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;
use App\Tag;

class verifyCategoryCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Category::all()->count()==0)
        {
            session()->flash('warning', 'In order to create posts, kindly create categories');
            return redirect(route('categories.create'));
        }   
        return $next($request);
    }
        
}
    
