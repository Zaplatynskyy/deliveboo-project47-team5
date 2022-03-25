@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-uppercase mb-0">{{ $food->name }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="food row">
                            <div class="col-12 col-lg-5 col-xl-4 d-flex align-items-center">
                                @if ($food->image)
                                    <img src="{{ asset("storage/{$food->image}") }}" alt="{{ $food->name }}"
                                        class="w-100">
                                @endif
                            </div>

                            <div class="col-12 col-lg-7 col-xl-8">

                                <div class="row_info">
                                    <div class="label d-flex justify-content-between">
                                        <span>Tipologia</span>
                                        <span>Visibilità</span>
                                    </div>
                                    <div class="my_txt telephone_price d-flex justify-content-between">
                                        <span>
                                            @if ($food->type)
                                                <span class="badge badge-info text-white">{{ $food->type->name }}</span>
                                            @endif
                                        </span>
                                        <span>
                                            <span class="badge {{ $food->visible ? 'badge-success' : 'badge-secondary' }}">{{ $food->visible ? 'Visible' : 'Not visible' }}</span>
                                        </span>
                                    </div>
                                </div>
                                
                                @if (count($food->tags) > 0)
                                    <div class="col-12 col-lg-7">
                                        <div class="row_info">
                                            <div class="label">Tag associati</div>
                                            <div class="my_txt name_order">
                                                @foreach ($food->tags as $tag)
                                                    <span class="badge badge-primary">{{ $tag->name }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="row_info">
                                    <div class="label">Ingredienti</div>
                                    <div class="my_txt name_order">
                                        <span>{{$food->ingredients}}</span>
                                    </div>
                                </div>

                                <div class="row_info">
                                    <div class="label">Prezzo</div>
                                    <div class="my_txt name_order">
                                        <span>{{$food->price}}€</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="buttons mt-4">
                            <button type="button" class="btn btn-warning"><a class="text-black"
                                    href="{{ route('foods.edit', $food->id) }}">Modifica</a></button>
                            <button type="button" class="my_btn btn btn-danger btnP" data-toggle="modal"
                                data-target="#exampleModal">Elimina</button>
                            <button type="button" class="btn btn-primary"><a class="text-white"
                                    href="{{ route('foods.index') }}">Indietro</a></button>
                            {{-- Modal --}}
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
                                            Sei sicuro di voler eliminare questo piatto?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary btnP"
                                                data-dismiss="modal">Chiudi</button>
                                            <form action="{{ route('foods.destroy', $food->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger toastClicker btnP">Conferma</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection