@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="card p-4">
        <form action="/group/post" enctype="multipart/form-data" method="POST">
        @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Add New Post</h1>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">Judul</label>
                        
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
    
                            @if($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group row">
                        <label for="body" class="col-md-4 col-form-label">Deskripsi</label>
                        
                            <input id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required autocomplete="body" autofocus>
    
                            @if($errors->has('body'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    @if($errors->has('image'))
                            <strong>{{ $errors->first('image') }}</strong>
                    @endif
                    </div>
    
                    <div class="row pt-4 justify-content-center">
                        <button class="btn btn-primary">Add New Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
