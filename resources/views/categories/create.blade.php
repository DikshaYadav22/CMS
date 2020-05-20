@extends ('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="text-uppercase font-weight-bold">categories</h2>
        </div>
        <div class="card-body">
            <h5 class="text-uppercase">{{isset($category)?'Update New Category':'Add New Category'}}</h5>
                <form action="{{isset($category)?route('categories.update', $category->id):route('categories.store')}}" method="post">
                @csrf
                @if(isset($category))
                @method('PUT')
                @endif
                <label for="name">Name</label>
                <input type="text" name="name" value="{{isset($category)?$category->name:''}}" class="form-control">
                <div class="mt-2">
                    <button class="btn btn-info" type="submit">{{isset($category)?'Update':'Add'}}</button>
                </div>

               
               
            </form>
        </div>
    </div>
@endsection

