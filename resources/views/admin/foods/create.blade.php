@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('foods.store') }}" id="add_food_form" method="POST" onsubmit="return validationFormFood()" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input value="{{ old('name') }}" type="text"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Inserisci il nome" name="name" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ingredients">Ingredienti</label>
                                <textarea class="form-control @error('ingredients') is-invalid @enderror" id="ingredients"
                                    rows="3" name="ingredients"
                                    placeholder="Inserisci gli ingredienti">{{ old('ingredients') }}</textarea>
                                @error('ingredients')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Prezzo</label>

                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror"
                                    name="price" value="{{ old('price') }}" step="0.1" min="0.90" max="999.90" placeholder="Inserisci il prezzo" required>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="types">Tipologie</label>
                                <select id="types" class="custom-select @error('type_id') is-invalid @enderror"
                                    name="type_id" required>
                                    <option value="">Seleziona le Tipologie</option>
                                    @foreach ($types as $type)
                                        <option {{ old('type_id') == $type->id ? 'selected' : '' }}
                                            value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <img src="" alt="" class="w-25 mb-3 my_image">
                                <label class="d-block" for="inputGroupFile02"
                                    aria-describedby="inputGroupFileAddon02">Scegli immagine</label>
                                <input type="file" id="inputGroupFile02" name="image"
                                    class="@error('image') is-invalid @enderror" onchange="previewUpload(event)" required>
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                @foreach ($tags as $tag)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="{{$tag->slug}}"
                                            value="{{$tag->id}}" name="tags[]" @if (in_array($tag->id, old('tags', []))) checked @endif>
                                        <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                                    </div>
                                @endforeach
                                @error('tags')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group form-check">
                                <input {{ old('visible') ? 'checked' : '' }} type="checkbox"
                                    class="form-check-input @error('visible') is-invalid @enderror" id="visible"
                                    name="visible">
                                <label class="form-check-label" for="visible">Visibile</label>
                                @error('visible')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btnP">Crea</button>
                            <button type="button" class="btn btn-danger ml-1"><a class="text-white"
                                    href="{{ route('foods.index') }}">Torna alla lista</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
