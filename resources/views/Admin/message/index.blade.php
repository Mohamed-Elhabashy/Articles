@extends('Admin.inc.Layout')

@section('content')
        <div class="d-flex justify-content-between mb-3">
            <h6>Messages</h6>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $m)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$m->name}}</td>
                    <td>{{$m->email}}</td>
                    <td>{{$m->subject}}</td>
                    <td>{{$m->message}}</td>
                    <td>
                        <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" href="{{Route('DMessage.delete',$m->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection