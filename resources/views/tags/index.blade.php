@extends('layouts.app')
@section('content')
<div class="d-flex justify-content and mb-2">
        <a href="{{ route('tags.create') }}" class="btn btn-success">Add Tags</a>
    </div>
    <div class="card card-default">

        <div class="card-header">
            <h4 class="text-uppercase">Tags</h4>
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
            @if($tags->count() !== 0)
                <table class="table table-bordered">
                    
                    <tr>
                        <td>Tags Name</td>
                        <td>Posts Count</td>
                        <td colspan="2"></td>
                    </tr>
                <tr>
                @foreach($tags as $tag)
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->posts->count()}}</td>
                    <td><a href="{{route('tags.edit', $tag->id)}}" class="btn btn-primary">Edit</a></td>
                    
                    <td>
                    <form action="{{route('tags.destroy', $tag->id)}}" method="post">
                    @csrf
                    @method('Delete')
                            <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </td>
                </tr>
                @endforeach
                </table>
            @else
                <h3>No tags available..</h3>
            @endif
            
        </div>
    </div>
@endsection