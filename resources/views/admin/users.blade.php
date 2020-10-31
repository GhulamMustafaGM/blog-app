@extends('layouts.admin')

@section('title') Admin Users @endsection

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header bg-light">
                Admin Users
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Posts</th>
                            <th>Comments</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                            <td>{{ $user->id }}</td>
                            <td class="text-nowrap"> {{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->posts->count() }}</td>
                            <td>{{ $user->comments->count() }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }} </td>
                            <td>{{ \Carbon\Carbon::parse($user->updated_at)->diffForHumans() }} </td>
                                <td>
                                <form method="POST" id="deleteUser-{{ $user->id }}" action="#">@csrf</form>
                                <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteUser-{{ $user->id }}').submit()">x</button>
                                </td>
                            </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection