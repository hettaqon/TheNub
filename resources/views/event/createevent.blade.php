@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="card p-4">
        <form action="/event" enctype="multipart/form-data" method="POST">
        @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Add New Group</h1>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Nama Group</label>
                        
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                            @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">Deskripsi</label>
                        
                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>
    
                            @if($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group row">
                        <label for="short_description" class="col-md-4 col-form-label">Deskripsi Pendek</label>
                        
                            <input id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror" name="short_description" value="{{ old('short_description') }}" required autocomplete="short_description" autofocus>
    
                            @if($errors->has('short_description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('short_description') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group row">
                        <label for="url" class="col-md-4 col-form-label">URL</label>
                        
                            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required autocomplete="url" autofocus>
    
                            @if($errors->has('url'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('url') }}</strong>
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
                        <button class="btn btn-primary">Add New Group</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
