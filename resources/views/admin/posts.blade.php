@extends('layouts.admin')

@section('title') Admin Posts @endsection

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header bg-light">
            Admin Posts
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Comments</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td class="text-nowrap"> <a href="{{ route('singlePost', $post->id) }}"> {{ $post->title }}</td>
                                <td>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }} </td>
                                <td>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }} </td>
                                <td>{{ $post->comments->count() }}</td>
                                <td>
                                    <a href="{{ route('adminPostEdit', $post->id) }}" class="btn-warning">Edit</a>
                                    <form method ="POST" id="deletePost-{{ $post->id }}" action="{{ route('adminDeletePost', $post->id) }}">@csrf</form>
                                    <a href="#" onclick="document.getElementById('deletePost-{{ $post->id }}').submit()" class="btn-danger">Remove</a>
                                </td>
                            </tr>
                    @endforeach
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@foreach($posts as $post)
    <!-- Modal -->
    <div class="modal fade" id="deletePostModal-{{ $post->id }}" tabindex="-1" role ="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="myModalLable">You are about to delete {{ $post->title }}.</h5>    
        </div>
            <div class="modal-body">
                Are you sure?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No, keept it</button>
            <form method="POST" id="deletePost-{{ $post->id }}" action="{{ route('adminDeletePost', $post->id) }}">@csrf
            <button style="display: none;" type="button" class="btn btn-primary">yes, delete it</button>
            </form>
            </div>
            </div>
        </div>
    </div>
@endforeach

@endsection