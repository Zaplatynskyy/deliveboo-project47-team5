@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2 class="m-0">Menù</h2>
                    </div>
                    <div class="card-body">
                        <div class="new-food">
                            <button type="button" class="my_btn btn btn-success mb-3"><a class="text-white"
                                    href="{{ route('foods.create') }}">Crea nuovo</a></button>
                        </div>
                        <div class="foods row row-cols-1 row-cols-lg-2">
                            @foreach ($foods as $key => $food)
                                <div class="my_item col mb-3">
                                    <div class="food-card flex-wrap">
                                        <div class="left">
                                            <div class="top">
                                                <div class="name">
                                                    {{ $food->name }}
                                                </div>
                                                <div class="ingredients">
                                                    {{ $food->ingredients }}
                                                </div>
                                            </div>
                                            <div class="bottom">
                                                <div class="price">{{ $food->price }}€</div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="image">
                                                <img src="{{ asset("storage/{$food->image}") }}"
                                                    alt="{{ $food->name }}" />
                                            </div>
                                        </div>
                                        <div class="buttons d-flex justify-content-between w-100">
                                            <button type="button" class="view btn btn-info mt-1"><a class="text-white"
                                                    href="{{ route('foods.show', $food->id) }}">Visualizza</a></button>
                                            <div class="right w-50 d-flex justify-content-end">
                                                <button type="button" class="btn btn-warning mt-1"><a class="text-white"
                                                        href="{{ route('foods.edit', $food->id) }}">Modifica</a></button>
                                                <button type="button" class="my_btn btn btn-danger mt-1 ml-1 btnToggle btnP"
                                                    data-toggle="modal" data-target="#exampleModal"
                                                    data-slug="{{ $food->id }}">Elimina</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
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
                                            <button type="button" class="btn btn-primary btnP my_btn"
                                                data-dismiss="modal">Chiudi</button>
                                            <form action="" method="POST" class="my_form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger toastClicker my_button btnP my_btn"
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
