@extends('layouts.app')
@section('content') 
    <div class="card">
        <div class="card-header">
            <h3>{{isset($tag)?'Update Tag':'Add Tag'}}</h3>
        </div>
        <div class="card-body">
            <form action="{{isset($tag)?route('tags.update',$tag->id):route('tags.store')}}" method="POST">
                @csrf
                @if(isset($tag))
                @method('PUT')
                @endif
                <div class="form-group">
                    <label for="Name">Tag Name:</label>
                    <input type="text" name="name" class="form-control" value="{{isset($tag)?$tag->name:''}}">
                </div>
                <button type="submit" class="btn btn-info">{{isset($tag)?'Update':'Add'}}</button>
            </form>
        </div>
    </div>
@endsection