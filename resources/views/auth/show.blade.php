@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-uppercase mb-0">{{ $user->name }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="user row">
                            <div class="col-12 col-lg-5 d-flex align-items-center">
                                @if ($user->image)
                                    <img src="{{ asset("storage/{$user->image}") }}" alt="{{ $user->name }}"
                                        class="w-100">
                                @endif
                            </div>
                            <div class="col-12 col-lg-7">
                                @if (count($user->categories) > 0)
                                    <div class="row_info">
                                        <div class="label">Categoria attività</div>
                                        <div class="my_txt name_order">
                                            @foreach ($user->categories as $category)
                                                <span class="badge badge-primary">{{ $category->name }}</span>
                                            @endforeach  
                                        </div>
                                    </div>
                                @endif

                                <div class="row_info">
                                    <div class="label">Indirizzo</div>
                                    <div class="my_txt name_order">
                                        <span>{{ $user->address }}</span>
                                    </div>
                                </div>

                                <div class="row_info">
                                    <div class="label d-flex justify-content-between">
                                        <span>Ordine minimo</span>
                                        <span>Costi di consegna</span>
                                    </div>
                                    <div class="my_txt telephone_price d-flex justify-content-between">
                                        <span>
                                            @if ($user->shipping)
                                                <span>{{ $user->min_price }}€</span>
                                            @else
                                                <span>Nessun ordine minimo</span>
                                            @endif 
                                        </span>
                                        <span>
                                            @if ($user->shipping)
                                                <span>{{ $user->shipping }}€</span>
                                            @else
                                                <span>Nessun costo di consegna</span>
                                            @endif 
                                        </span>
                                    </div>
                                </div>

                                <div class="row_info">
                                    <div class="label d-flex justify-content-between">
                                        <span>Email</span>
                                        <span>Telefono</span>
                                    </div>
                                    <div class="my_txt telephone_price d-flex justify-content-between">
                                        <span>{{ $user->email }}</span>
                                        <span>{{ $user->telephone }}</span>
                                    </div>
                                </div>

                                <div class="row_info">
                                    <div class="label">Partita IVA</div>
                                    <div class="my_txt name_order">
                                        <span>{{ $user->p_iva }}</span>
                                        {{-- <span>{{ $order->cognome }}</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttons mt-4 d-flex">
                            <button type="button" class="btn btn-danger"><a class="text-white"
                                    href="{{ route('home') }}">Torna alla home</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
