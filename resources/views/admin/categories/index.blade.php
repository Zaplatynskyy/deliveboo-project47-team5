@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header">Lista delle categorie</h3>
                        <div class="card-header">
                            <form class="d-flex" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data"
                                id="add_category_form" onsubmit="return validationFormCategory()">
                                <button type="submit" class="my_btn btn btn-success mr-2 btnP">Crea nuova</button>
                                <div>
                                    @csrf
                                    <input value="@if (old('formType') == 'create') {{ old('name') }} @endif" type="text"
                                        class="form-control @if (old('formType') == 'create') is-invalid @endif" id="name"
                                        placeholder="Inserisci la categoria*" name="name">
                                    <input type="hidden" name="formType" value="create">
                                </div>
                                {{-- error js --}}
                                <div id="category_input_name" class="error_js d-none"></div>
                                {{-- error laravel --}}

                                @if (old('formType') == 'create')
                                    @error('name')
                                        <div class="alert alert-danger ml-2 mb-0 py-0 px-4 d-flex align-items-center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                @endif
                            </form>
                        </div>
                        <div class="posts mt-3">

                            @foreach ($categories as $key => $category)
                                <div class="card-body my_item mb-3">
                                    <form class="d-inline-block edit-form" enctype="multipart/form-data"
                                        action="{{ route('categories.update', $category) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div>

                                            <h4>Categoria #{{ $key + 1 }}</h4>

                                            <div class="row">
                                                <div class="col-12 col-lg-6">
                                                    <div class="row_info">
                                                        <div class="label">Nome</div>
                                                        <div class="my_txt name_order">
                                                            <span>
                                                                <div
                                                                    class="name {{ old('formType') == 'edit' && old('oldName') == $category->name ? 'd-none' : '' }}">
                                                                    {{ $category->name }}</div>
                                                                <div
                                                                    class="name-input {{ old('formType') == 'edit' && old('oldName') == $category->name ? '' : 'd-none' }}">
            
                                                                    <input
                                                                        value="{{ old('oldName') == $category->name ? old('name') : $category->name }}"
                                                                        type="text"
                                                                        class="form-control @if (old('formType') == 'edit' && old('oldName') == $category->name) is-invalid my_validation @endif"
                                                                        id="name" placeholder="Insert the name" name="name"
                                                                        data-old-name="{{ $category->name }}">
                                                                    <input type="hidden" name="formType" value="edit">
                                                                    <input type="hidden" name="oldName"
                                                                        value="{{ $category->name }}">
                                                                    @if (old('formType') == 'edit' && old('oldName') == $category->name)
                                                                        @error('name')
                                                                            <div
                                                                                class="alert alert-danger mb-0 py-0 px-4 d-flex align-items-center">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    @endif
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </div>
            
                                                    <div class="row_info">
                                                        <div class="label">Slug</div>
                                                        <div class="my_txt address">{{ $category->slug }}</div>
                                                    </div>
                                                </div>
        
                                                <div class="col-12 col-lg-6">
                                                    <div class="row_info text-lg-right">
                                                        <div class="label_img">
                                                            <span>Immagine</span>
                                                        </div>
                                                        <div class="my_txt py-2 d-flex justify-content-between">
                                                            <span>
                                                                <img class="w-50 my_image rounded"
                                                                    src="{{ asset("storage/{$category->image}") }}"
                                                                    alt="{{ $category->name }}">
                                                                <label class="edit-img d-none mt-2">
                                                                    <input type="file" id="inputGroupFile02" name="image"
                                                                        class="@if (old('formType') == 'edit' && old('oldName') == $category->name) is-invalid my_validation @endif"
                                                                        onchange="previewUploadCategory(event, @json($key))">
                                                                </label>
                                                                @if (old('formType') == 'edit' && old('oldName') == $category->name)
                                                                    @error('image')
                                                                        <div
                                                                            class="alert alert-danger mb-0 py-0 px-4 d-flex align-items-center">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="buttons d-flex justify-content-between align-items-center mt-3">
                                                <div class="edit-buttons d-inline-block">
                                                    <button type="button"
                                                        class="my_btn btn btn-warning btnP text-black toggleForm {{ old('oldName') == $category->name ? 'd-none' : '' }}">Modifica</button>
                                                    <button type="button"
                                                        class="my_btn btn btn-warning btnP text-white submitForm {{ old('oldName') == $category->name ? 'failed-validation' : 'd-none' }} ">Conferma</button>
                                                </div>
                                                <button type="button" class="my_btn btn btn-danger btnToggle btnP"
                                                    data-toggle="modal" data-target="#exampleModal"
                                                    data-slug="{{ $category->id }}">Elimina</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-uppercase" id="exampleModalLabel">Attenzione! ❌</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Sei sicuro di voler eliminare questa categoria?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary btnP"
                                                data-dismiss="modal">Chiudi</button>
                                            <form action="" method="POST" class="my_form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-danger toastClicker delete-category btnP"
                                                    data-dismiss="modal">Conferma</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Toast -->
                            <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 9999; right: 0; top: 60px;">
                                <div id="liveToast" class="toast hide" role="alert" aria-live="assertive"
                                    aria-atomic="true" data-delay="2000">
                                    <div class="toast-body">
                                        Categoria eliminata con successo! 🗑
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
