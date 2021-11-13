@extends('Admin.inc.Layout')

@section('content')
        <div class="d-flex justify-content-between mb-3">
            <h6>Categories</h6>
            <a class="btn btn-sm btn-primary" href="{{Route('DMail.send')}}">Send Mail</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">body</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mails as $m)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$m->title}}</td>
                    <td>{{$m->body}}</td>
                    <td>
                        <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" href="{{Route('DMail.delete',$m->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection