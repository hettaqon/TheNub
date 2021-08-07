@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card p-3">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">

                        <div class="font-weight-bold mr-5">
                            <a href="/profile/{{$post->user->id}}">
                                <span class="text-dark">{{ $post->user->name }}</span>
                            </a>
                        </div>
                        @can('update', $post)
                    <a href="/post/{{ $post->id }}/edit">
                        <button class="btn btn-success btn-sm">Edit Post</button>
                    </a>
                    @endcan
                    @can('destroy', $post)
                    <form action="/post/{{$post->id}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    @endcan
                
                </div>
                <h1>{{ $post->title }}</h1>
                <p>{{$post->body}}</p>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
