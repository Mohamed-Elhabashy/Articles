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
    <form  method="post" action="{{Route('DMail.SubmitSendMail')}}">
        @csrf
        <div class="form-group mb-3">    
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group mb-3">    
            <label>Body</label>
            <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection