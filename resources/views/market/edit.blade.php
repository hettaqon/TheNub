@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="card p-4">
        <form action="/marketplace/{{ $post->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit Product</h1>
                </div>
                <div class="form-group row">
                    <label for="product" class="col-md-4 col-form-label">Nama Barang</label>
                    
                        <input id="product" type="text" class="form-control @error('product') is-invalid @enderror" name="product" value="{{ old('product') }}" required autocomplete="product" autofocus>

                        @if($errors->has('product'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('product') }}</strong>
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
                    <label for="price" class="col-md-4 col-form-label">Harga</label>
                    
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                        @if($errors->has('price'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('price') }}</strong>
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
                    <button class="btn btn-primary">Edit Product</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
