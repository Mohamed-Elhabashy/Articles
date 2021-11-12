@extends('Admin.inc.Layout')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h6>Article / Add New</h6>
    </div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @include('Admin.inc.errors')
    <form  method="post" action="{{Route('DArticle.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">    
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group mb-3">      
            <label>Category</label>
            <select class="form-control mt-2" name="category_id">
                <option value=""></option>  
                @foreach($categories as $cat)
                    <option value={{$cat->id}}>{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">    
            <label>Content</label>
            <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group mb-3">    
            <label>image</label>
            <input type="file" name="img" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection