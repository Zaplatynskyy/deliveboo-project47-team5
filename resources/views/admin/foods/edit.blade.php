@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('foods.update', $food->id) }}" method="POST" enctype="multipart/form-data" id="add_food_form" onsubmit="return validationFormFood()">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nome *</label>
                                <input value="{{ old('name') ?? $food->name }}" type="text"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Insert the name" name="name" required>
                                {{-- error js --}}
                                <div id="food_input_name" class="error_js d-none"></div>
                                {{-- error laravel --}}
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ingredients">Ingredienti</label>
                                <textarea class="form-control @error('ingredients') is-invalid @enderror" id="ingredients"
                                    rows="3" name="ingredients"
                                    placeholder="Inserisci gli ingredienti">{{ old('ingredients') ?? $food->ingredients }}</textarea>
                                @error('ingredients')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Prezzo *</label>

                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror"
                                    name="price" value="{{ old('price') ?? $food->price }}" step="0.1" min="0.90"
                                    max="999.90" placeholder="Inserisci il prezzo" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                {{-- error js --}}
                                <div id="food_input_price" class="error_js d-none"></div>
                                {{-- error laravel --}}
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="types">Tipologie *</label>
                                <select id="types" class="custom-select @error('type_id') is-invalid @enderror"
                                    name="type_id" required>
                                    <option value="">Seleziona le Tipologie</option>
                                    @foreach ($types as $type)
                                        <option {{ old('type_id', $food->type_id) == $type->id ? 'selected' : '' }}
                                            value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                {{-- error js --}}
                                <div id="food_input_type" class="error_js d-none"></div>
                                {{-- error laravel --}}
                                @error('type_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                @if ($food->image)
                                    <img src="{{ asset("storage/{$food->image}") }}" alt="{{ $food->title }}"
                                        class="w-25 mb-3 my_image">
                                @else
                                    <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                                @endif
                                <label class="d-block" for="inputGroupFile02"
                                    aria-describedby="inputGroupFileAddon02">Scegli immagine *</label>
                                <input type="file" id="inputGroupFile02" name="image"
                                    class="@error('image') is-invalid @enderror" onchange="previewUpload(event)">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                @foreach ($tags as $tag)
                                    <div class="form-check form-check-inline">
                                        @if (old('tags'))
                                            <input class="form-check-input" type="checkbox" id="{{ $tag->slug }}"
                                                value="{{ $tag->id }}" name="tags[]"
                                                @if (in_array($tag->id, old('tags', []))) checked @endif>>
                                        @else
                                            <input class="form-check-input" type="checkbox" id="{{ $tag->slug }}"
                                                value="{{ $tag->id }}" name="tags[]"
                                                @if ($food->tags->contains($tag)) checked @endif>
                                        @endif
                                        <label class="form-check-label"
                                            for="{{ $tag->slug }}">{{ $tag->name }}</label>
                                    </div>
                                @endforeach
                                @error('tags')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group form-check">
                                @php
                                    $visible = old('visible') ?? $food->visible;
                                @endphp
                                <input {{ $visible ? 'checked' : '' }} type="checkbox"
                                    class="form-check-input @error('visible') is-invalid @enderror" id="visible"
                                    name="visible">
                                <label class="form-check-label" for="visible">Visibile</label>
                                @error('visible')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btnP">Modifica</button>
                            <button type="button" class="btn btn-danger ml-1"><a class="text-white"
                                    href="{{ route('foods.index') }}">Torna al Menù</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
