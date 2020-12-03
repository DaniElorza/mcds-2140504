@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>
                <i class="fa fa-pen"></i>
                Editar Categorías
            </h1>
            <hr>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">
                            <i class="fa fa-clipboard-list"></i>
                            Escritorio
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">
                            <i class="fa fa-list-alt"></i>
                            Módulo Categorías
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-pen"></i>
                        Editar Categorías
                    </li>
                </ol>
            </nav>

            <!-- @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                @endforeach
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif -->

            <form method="POST" action="{{ url('categories/'.$category->id) }}" enctype=
                "multipart/form-data">
                @csrf

                @method('PUT')
                <input type="hidden" name="id" value="{{ $category->id }}">

                <div class="form-group">
                    <input id="name" type="text" class="form-control @error('name')
                    is-invalid @enderror" name="name" value="{{ old('name', $category->name) }}" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea id="description" type="text" rows="3" class="form-control @error('description')
                        is-invalid @enderror" name="description">{{ old('description', $category->description) }}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="text-center my-3">
                        <img src="{{ asset($category->image) }}" class="img-thumbnail"
                            id="preview" width="120px">
                    </div>
                    <div class="custom-file">
                        <input type="file" id="image" class="custom-file-input @error('image')
                            is-invalid @enderror" id="image" name="image" accept="image/*">
                        <label class="custom-file-label" for="customFile">
                            <i class="fa fa-upload"></i>
                            Imagen
                        </label>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-larapp btn-block text-uppercase">
                        Editar
                        <i class="fa fa-pen"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection


