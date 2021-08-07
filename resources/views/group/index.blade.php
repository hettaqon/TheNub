@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <!--Sisi Kiri-->
        <div class="col-lg-2 col-sm-3">
          <div class="container" style="margin-top:35px;">
  
            <h2 class="font-weight-light text-center text-lg-center mt-4 mb-0">Explore</h2>
            <hr class="mt-2 mb-5">
  
            <div class="row">
              <div class="col">
                
                <div class="list-group" id="groupPhoto">
                  <a href="/post/create" class="list-group-item list-group-item-action">Create Post</a>
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
            <a href="/group/create"><button class="btn btn-primary col">Create Group</button></a>
          <div class="card p-3">
            <div class="row pt-3">            
                @foreach ($groups as $mg)
                <div class="col-2 pb-4">
                    <a href="/group/{{$mg->id}}">
                        <img src="/storage/{{$mg->image}}" class="gambar3">
                    </a>
                </div>
                <div class="col-4">
                    <a href="/group/{{$mg->id}}">
                    <p><b>{{$mg->name}}</b></p></a>
                    <p>{{$mg->short_description}}</p>
                
                </div>
                @endforeach
            </div>

                
                <div class="row">
                    <div class="justify-content-center">
                        {{ $groups->links() }}
                    </div>
                </div>
        </div>
      </div>
</div>
@endsection
