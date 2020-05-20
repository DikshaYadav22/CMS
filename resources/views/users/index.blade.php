@extends ('layouts.app')
@section('content')

<div class="card card-default">
    <div class="card-header">Users</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td></td>

                
                </tr>
            </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td> <img src="{{asset('/storage/'. auth()->user()->image)}}" style="height:40px; width:40px; border-radius:50%" alt=""></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td><a href="{{route('users.edit-profile')}}" class="btn btn-info">Edit</a></td>
                    @if(!$user->isAdmin())
                        <form action="{{route('users.make-admin',$user->id)}}" method="POST">
                        @csrf
                            <td><button type="submit" class="btn btn-sm btn-success">Make Admin</button></td>
                        </form>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection 