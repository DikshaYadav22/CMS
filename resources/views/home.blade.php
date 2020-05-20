@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header d-flex">
                <div class="">
                    <img src="{{asset('/storage/'. auth()->user()->image)}}" style="height:40px; width:40px; border-radius:50%" alt="">
                </div>
                <div class="font-weight-bold my-2 ml-2">{{auth()->user()->name}}</div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome home  !!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
