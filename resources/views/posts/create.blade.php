@extends('layouts.app')

@section('content')
<div class="card card-header">
   <h2 class="text-center font-weight-bold text-uppercase">Add Posts</h2>
</div>
<div class="card card-body">
  
   <form action="{{isset($post)?route('posts.update', $post->id):route('posts.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      @if(isset($post))
      @method('PUT')
      @endif
      
      <div class="form-group">
         
         <label for="exampleInputEmail1">Title</label>
         <input type="text" class="form-control" name="title" value={{isset($post)?$post->title:''}} > 
      </div>
      <div class="form-group">
         <label for="description">Description</label>
         <input type="text" class="form-control" name="description" value={{isset($post)?$post->description:''}}>
      </div>

      <div class="form-group">
         <label for="content">Content</label>
         <input id="content" type="hidden" name="content" value={{isset($post)?$post->content:''}}>
         <trix-editor input="content"></trix-editor>
      </div>
      @if(isset($post))
         <div class="form-group">
            <img src="{{ asset('storage/' .$post->image) }}" alt="" style="width:100px;height:200px;">
         </div>
      @endif
      <div class="form-group">
         <label for="image">Image</label>
         <input type="file" class="form-control" name="image">
      </div>

      <div class="form-group">
         <label for="category">Category</label>
         <select name="category" id="category" class="form-control">
            @foreach($categories as $category)
            <option value="{{$category->id}}"
            @if(isset($post))
                  @if($category->id == $post->category_id)
                     selected
                  @endif
               @endif
            >
                {{$category->name}}
            </option>
            @endforeach
         </select>
            
      </div>

     @if($tags->count()>0)
     <div class="form-group">
      <label for="tag">Tags</label>
      <select name="tags[]" id="tags-selector" class="form-control" multiple="multiple">
      @foreach($tags as $tag)
            <option value="{{ $tag->id }}" 
               @if(isset($post))
                  @if($post->hasTag($tag->id))
                  selected
                  @endif
               @endif
               >
               {{$tag->name}}
               
            </option>

      @endforeach
      </select>
      
     </div>
     @endif
      <div class="form-group">
         <label for="date">Published At:</label>
         <input type="date" id="published_at" name="published_at" class="form-control">
      </div>
      
      <button class="btn btn-info" type="submit">{{isset($post)?'Update':'Add'}}</button>
   </form>
 </div>
 
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>

    flatpickr("#published_at", {
        enableTime: true,
        enableSecond: true
    })

   
</script>

<script>
     $(document).ready(function(){
        $('#tags-selector').select2();
    });
</script>

@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
@endsection