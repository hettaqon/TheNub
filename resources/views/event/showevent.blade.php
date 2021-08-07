@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <!--Sisi Kiri-->
        <div class="col-lg-2 col-sm-3">
          <div class="container" style="margin-top:35px;">
  
            <h2 class="font-weight-light text-center text-lg-center mt-4 mb-0">{{ $group->name }}</h2>
            <hr class="mt-2 mb-5">
  
            <div class="row">
              <div class="col">
                
                <div class="list-group" id="groupPhoto">
                  <a href="/group/post/create" class="list-group-item list-group-item-action">Create Post</a>
                  <a href="/group" class="list-group-item list-group-item-action">Group</a>
                  <a href="/event" class="list-group-item list-group-item-action">Event</a>
                  <a href="/marketplace" class="list-group-item list-group-item-action">Marketplace</a>
                </div>
  
                <br>
              
              </div>
            </div>
  
          </div>
        </div>
  
        <!--Sisi Kanan-->
        <div class="col-lg-10 col-sm-9">
          <div class="card p-3">
            @foreach ($posts as $post)
            <div class="row justify-content-center">
                <div class="col-3 ">
                    <a href="/post/{{ $post->id }}">
                        <img src="/storage/{{ $post->image }}" class="gambar">
                    </a>
                </div>
            </div>

            <div class="row pt-2 pb-4 text-center">
                <div class="col">
                    <div>
                        <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{$post->user->id}}">
                                <span class="text-dark">{{ $post->user->name }}</span>
                            </a>
                        </span>
                        </p><p>{{$post->title}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            
            <div class="row">
                <div class="justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
                
        </div>
      </div>
</div>
@endsection
