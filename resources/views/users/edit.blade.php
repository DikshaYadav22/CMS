@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">

                <div class="card-header d-flex">
                <div>
                    <img src="{{asset('/storage/'. auth()->user()->image)}}" style="height:40px; width:40px; border-radius:50%" alt="">
                </div>
                <div class="font-weight-bold my-2 ml-2">{{auth()->user()->name}}</div>
                </div>
                    
                <div class="card-body">
                   <form action="{{route('users.update-profile')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{auth()->user()->name}}">
                        </div>

                        <div class="form-group">
                            <label for="about">About Me</label>
                            <textarea name="about" id="about" cols="30" rows="10" class="form-control" value="{{auth()->user()->about}}"></textarea>
                        </div>

                        <button class="btn btn-success" type="submit">Update Profile</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
