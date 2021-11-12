@extends('Admin.inc.Layout')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h6>Article / Edit</h6>    
    </div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @include('admin.inc.errors')
    <form  method="post" action="{{route('DArticle.update')}}" enctype="multipart/form-data">
        @csrf
        <input hidden name="id" value="{{$article->id}}">
        <div class="form-group mb-3">    
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{$article->title}}">
        </div>
        <div class="form-group mb-3">      
            <label>Category</label>
            <select class="form-control mt-2" name="category_id">
                <option value=""></option>  
                @foreach($categories as $cat)
                    <option value={{$cat->id}} @if($cat->id == $article->category->id) selected @endif>{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">    
            <label>Content</label>
            <textarea name="content" class="form-control" cols="30" rows="10">{{$article->content}}</textarea>
        </div>
        <img src="{{asset('Uploads/'.$article->img)}}" height="100px" class="my-5">
        <div class="form-group mb-3">    
            <label>image</label>
            <input type="file" name="img" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection