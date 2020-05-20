@extends('layouts.app')

@section('content') 
    <div class="d-flex justify-content and mb-2">
        <a href="{{ route('categories.create') }}" class="btn btn-success">Add Categories</a>
    </div>
    <div class="card card-default">

        <div class="card-header">
            <h4 class="text-uppercase">categories</h4>
        </div>
        <div class="card-body">
            @if($errors->any())
             <div class="alert alert-danger">
                 <ul class="list-group">
                     @foreach($errors->all() as $error)
                        <li class="list-group-item text-danger">
                            {{$error}}
                        </li>
                     @endforeach
                     
                  </ul>
             </div>
             @endif
            
            <table class="table table-bordered">
                
                <tr>
                    <td>Category Name</td>
                    <td>Posts Count</td>
                    <td colspan="2"></td>
                </tr>
                @if(isset($categories))
               <tr>
               @foreach($categories as $category)
                   <td>{{$category->name}}</td>
                   <td>{{$category->posts->count()}}</td>
                   <td><a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary">Edit</a></td>
                   
                   <td>
                   <form action="{{route('categories.destroy', $category->id)}}" method="post">
                   @csrf
                   @method('Delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
                   </form>
                   </td>
                   
               </tr>
               @endforeach
               
               @elseif(isset($trashed))
               <tr>
               @foreach($trashed as $category)
                   <td>{{$category->name}}</td>
                   <td>{{$category->posts->count()}}</td>
                   @if($category->has('trashed'))
                   <td><a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary">Edit</a></td>
                   
                   <td>
                   @endif
                   
                   <form action="{{route('categories.destroy', $category->id)}}" method="post">
                   @csrf
                   @method('Delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
                   </form>
                   </td>
             

               </tr>
               @endforeach
               @endif

            </table>
            
        </div>
    </div>
@endsection