@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit profile</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}" id="registration_form"
                            onsubmit="return validationForm()" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nome ristorante</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name"
                                        autofocus>

                                {{-- error js --}}
                                <div id="user_input_name" class="error_js d-none"></div>
                                {{-- error laravel --}}
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Indirizzo</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') ?? $user->address }}" required>

                                    {{-- error js --}}
                                    <div id="user_input_address" class="error_js d-none"></div>
                                    {{-- error laravel --}}
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="p_iva" class="col-md-4 col-form-label text-md-right">Partita iva</label>

                                <div class="col-md-6">
                                    <input id="p_iva" type="text"
                                        class="form-control @error('p_iva') is-invalid @enderror" name="p_iva"
                                        value="{{ old('p_iva') ?? $user->p_iva }}" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />

                                    {{-- error js --}}
                                    <div id="user_input_piva" class="error_js d-none"></div>
                                    {{-- error laravel --}}
                                    @error('p_iva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telephone" class="col-md-4 col-form-label text-md-right">Telefono</label>

                                <div class="col-md-6">
                                    <input id="telephone" type="text"
                                        class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                        value="{{ old('telephone') ?? $user->telephone }}" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />

                                    {{-- error js --}}
                                    <div id="user_input_telephone" class="error_js d-none"></div>
                                    {{-- error laravel --}}
                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="shipping" class="col-md-4 col-form-label text-md-right">Costi consegna</label>

                                <div class="col-md-6">
                                    <input id="shipping" type="number"
                                        class="form-control @error('shipping') is-invalid @enderror" name="shipping"
                                        value="{{ old('shipping') ?? $user->shipping }}" step="0.10" min="0.90"
                                        max="99.90" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />

                                    {{-- error js --}}
                                    <div id="user_input_shipping" class="error_js d-none"></div>
                                    {{-- error laravel --}}
                                    @error('shipping')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="min_price" class="col-md-4 col-form-label text-md-right">Ordine minimo</label>

                                <div class="col-md-6">
                                    <input id="min_price" type="number"
                                        class="form-control @error('min_price') is-invalid @enderror" name="min_price"
                                        value="{{ old('min_price') ?? $user->min_price }}" step="0.1" min="0.90"
                                        max="99.90" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />

                                    {{-- error js --}}
                                    <div id="user_input_min_price" class="error_js d-none"></div>
                                    {{-- error laravel --}}
                                    @error('min_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 text-center">
                                <img src="{{ asset("storage/{$user->image}") }}" alt="{{ $user->name }}"
                                    class="w-25 mb-3 my_image">
                                <label class="d-block" for="inputGroupFile02"
                                    aria-describedby="inputGroupFileAddon02">Scegli immagine</label>
                                <input type="file" id="inputGroupFile02" name="image"
                                    class="@error('image') is-invalid @enderror" onchange="previewUpload(event)">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group row justify-content-center px-5">
                                @foreach ($categories as $category)
                                    <div class="form-check form-check-inline">
                                        @if (old('categories'))
                                            <input class="form-check-input" type="checkbox" id="{{ $category->slug }}"
                                                value="{{ $category->id }}" name="categories[]"
                                                @if (in_array($category->id, old('categories', []))) checked @endif>
                                        @else
                                            <input class="form-check-input" type="checkbox" id="{{ $category->slug }}"
                                                value="{{ $category->id }}" name="categories[]"
                                                @if ($user->categories->contains($category)) checked @endif>
                                        @endif
                                        <label class="form-check-label"
                                            for="{{ $category->slug }}">{{ $category->name }}</label>
                                    </div>
                                @endforeach

                                {{-- error js --}}
                                <div id="user_input_categories" class="error_js d-none"></div>
                                {{-- error laravel --}}
                                @error('categories')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="registration_submit">
                                        Modifica
                                    </button>
                                    <button type="button" class="btn btn-danger" >
                                        <a href="{{route('home')}}" class="text-decoration-none text-white">Torna alla home</a>
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
