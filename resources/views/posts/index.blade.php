@extends ('layouts.app')
@section('content')
<div class="d-flex justify-content and mb-2">
    <a href="{{route('posts.create')}}" class="btn btn-success">Add Posts</a>
</div>
<div class="card card-default">
    <div class="card-header">Posts</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Title</td>
                    <td>Categories</td>
                     <td>Tags</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
        <tbody>
        @if(isset($posts))
            @foreach($posts as $post)
                <tr>
                    <td><img src="{{ asset('storage/' .$post->image) }}" width="100" alt=""></td>
                    <td>{{$post->title}}</td>
                    <td>
                        <a href="{{ route('categories.edit', $post->category->id) }}">
                            {{$post->category->name}}
                            
                        </a>
                          
                        </td>
                        
                        <td>  
                            @foreach($post->tags as $tag)
                                {{$tag->name}},
                            @endforeach

                        </td>
                        

                    <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-info float-right">Edit</a></td>
                    <td>
                        <form action="{{route('posts.destroy', $post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                            Delete 
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @elseif(isset($trashed))
            
            @foreach($trashed as $item)
                    <tr>
                        <td><img src="{{ asset('storage/' .$item->image) }}" width="100" height="50" alt=""></td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->title}}</td>
                        <td>
                            <form action="{{route('posts.destroy', $item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                Delete 
                                </button>

                            </form>
                        </td>
                        <td><a href="{{ route('restore', $item->id) }}" class="btn btn-success">Restore</a></td>
                    </tr>
                @endforeach
        @endif
        </tbody>
    </table>
    </div>
</div>
@endsection 