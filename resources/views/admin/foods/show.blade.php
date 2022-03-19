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
                        <div class="food">
                            @if ($food->image)
                                <img src="{{ asset("storage/{$food->image}") }}" alt="{{ $food->name }}"
                                    class="w-25">
                            @endif
                            <p class="my-4"><span class="my_bold">Ingredienti:</span> {{$food->ingredients}}</p>
                            <p class="my-4"><span class="my_bold">Prezzo:</span> {{$food->price}}€</p>
                            <span
                                class="badge {{ $food->visible ? 'badge-success' : 'badge-secondary' }}">{{ $food->visible ? 'Visible' : 'Not visible' }}</span>
                            @if ($food->type)
                                <span class="badge badge-info text-white">{{ $food->type->name }}</span>
                            @endif
                            @if (count($food->tags) > 0)
                                <h5 class="mt-3">Tags:</h5>
                                @foreach ($food->tags as $tag)
                                    <span class="badge badge-primary">{{ $tag->name }}</span>
                                @endforeach
                            @endif
                        </div>
                        <div class="buttons mt-4">
                            <button type="button" class="btn btn-warning"><a class="text-white"
                                    href="{{ route('foods.edit', $food->id) }}">Modifica</a></button>
                            <button type="button" class="my_btn btn btn-danger btnP" data-toggle="modal"
                                data-target="#exampleModal">Elimina</button>
                            <button type="button" class="btn btn-primary"><a class="text-white"
                                    href="{{ route('foods.index') }}">Torna alla lista</a></button>
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