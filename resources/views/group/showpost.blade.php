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
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{$post->user->id}}">
                                <span class="text-dark">{{ $post->user->name }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <p>{{$post->body}}</p>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
