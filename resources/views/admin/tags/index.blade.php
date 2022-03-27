@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h3 class="card-header">Lista dei tag</h3>
                    <div class="card-header">
                        <form class="d-flex" action="{{ route('tags.store') }}" method="POST" id="add_tag_form" onsubmit="return validationFormTag()">
                            <button type="submit" class="my_btn btn btn-success mr-2 btnP">Crea nuovo</button>
                            <div>
                                @csrf
                                <input value="@if (old('formType') == 'create') {{ old('name') }} @endif" type="text"
                                    class="form-control @if (old('formType') == 'create') is-invalid @endif" id="name"
                                    placeholder="Inserisci il tag *" name="name" required>
                                <input type="hidden" name="formType" value="create">
                            </div>

                            {{-- error js --}}
                            <div id="tag_input_name" class="error_js d-none"></div>
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
                        @foreach ($tags as $key => $tag)
                            <div class="card-body my_item mb-3">
                                <h4>Tag #{{ $key + 1 }}</h4>

                                <div class="row_info">
                                    <div class="label d-flex justify-content-between">
                                        <span>Nome</span>
                                        <div>Slug</div>
                                    </div>
                                    <div class="my_txt name d-flex justify-content-between">
                                        <span>
                                            <div
                                                class="name {{ old('formType') == 'edit' && old('oldName') == $tag->name ? 'd-none' : '' }}">
                                                {{ $tag->name }}</div>
                                            <div
                                                class="name-input {{ old('formType') == 'edit' && old('oldName') == $tag->name ? '' : 'd-none' }}">
                                                <form class="d-inline-block edit-form"
                                                    action="{{ route('tags.update', $tag) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input
                                                        value="{{ old('oldName') == $tag->name ? old('name') : $tag->name }}"
                                                        type="text"
                                                        class="form-control @if (old('formType') == 'edit' && old('oldName') == $tag->name) is-invalid my_validation @endif"
                                                        id="name" placeholder="Insert the name" name="name"
                                                        data-old-name="{{ $tag->name }}">
                                                    <input type="hidden" name="formType" value="edit">
                                                    <input type="hidden" name="oldName"
                                                        value="{{ $tag->name }}">
                                                    @if (old('formType') == 'edit' && old('oldName') == $tag->name)
                                                        @error('name')
                                                            <div
                                                                class="alert alert-danger mb-0 py-0 px-4 d-flex align-items-center">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    @endif
                                                </form>
                                            </div>
                                        </span>
                                        <div class="my_txt slug">{{ $tag->slug }}</div>
                                    </div>
                                </div>
                                
                                <div class="buttons d-flex justify-content-between mt-4">
                                    <div class="edit-buttons d-inline-block">
                                        <button type="button"
                                            class="my_btn btn btn-warning btnP text-black toggleForm {{ old('oldName') == $tag->name ? 'd-none' : '' }}">Modifica</button>
                                        <button type="button"
                                            class="my_btn btn btn-warning btnP text-black submitForm {{ old('oldName') == $tag->name ? 'failed-validation' : 'd-none' }} ">Conferma</button>
                                    </div>
                                    <button type="submit" class="my_btn btn btn-danger btnToggle btnP"
                                        data-toggle="modal" data-target="#exampleModal"
                                        data-slug="{{ $tag->id }}">Elimina</button>
                                </div>
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
                                        Sei sicuro di voler eliminare questo tag?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary btnP my_btn"
                                            data-dismiss="modal">Chiudi</button>
                                        <form action="" method="POST" class="my_form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="btn btn-danger toastClicker delete-tag btnP my_btn"
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
                                    Tag eliminato con successo! 🗑
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
