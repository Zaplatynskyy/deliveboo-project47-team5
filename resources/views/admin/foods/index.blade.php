@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Menù</div>
                    <div class="card-body">
                        <div class="new-food">
                            <button type="button" class="btn btn-success mb-3"><a class="text-white"
                                    href="{{ route('foods.create') }}">Crea nuovo</a></button>
                        </div>
                        <div class="foods">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Prezzo</th>
                                        <th scope="col">Pubblicato</th>
                                        <th scope="col">Ingredienti</th>
                                        <th scope="col">Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($foods as $key => $food)
                                        <tr class="my_item">
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $food->name }}</td>
                                            <td>{{ $food->price }}€</td>
                                            <td>{{ $food->visible == 0 ? 'No' : 'Si' }}</td>
                                            <td>{{ $food->ingredients }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info mt-1"><a class="text-white"
                                                        href="{{ route('foods.show', $food->id) }}">Visualizza</a></button>
                                                <button type="button" class="btn btn-warning mt-1"><a class="text-white"
                                                        href="{{ route('foods.edit', $food->id) }}">Modifica</a></button>
                                                <button type="button" class="my_btn btn btn-danger mt-1 btnToggle btnP"
                                                    data-toggle="modal" data-target="#exampleModal"
                                                    data-slug="{{ $food->id }}">Elimina</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                                            Sei sicuro di voler eliminare questo piatto?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary btnP"
                                                data-dismiss="modal">Chiudi</button>
                                            <form action="" method="POST"
                                                class="my_form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger toastClicker my_button btnP"
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
                                        Piatto eliminato con successo! 🗑
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
