@extends('Admin.inc.Layout')

@section('content')
        <div class="d-flex justify-content-between mb-3">
            <h6>Categories</h6>
            <a class="btn btn-sm btn-primary" href="{{Route('DCategory.create')}}">Add new</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$cat->name}}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{Route('DCategory.edit',$cat->id)}}">Edit</a>
                        <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" href="{{Route('DCategory.delete',$cat->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection