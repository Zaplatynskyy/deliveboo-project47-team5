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
                        <div class="user">
                            @if ($user->image)
                                <img src="{{ asset("storage/{$user->image}") }}" alt="{{ $user->name }}"
                                    class="w-25">
                            @endif
                            <p class="my-4"><span class="my_bold">Email:</span> {{ $user->email }}</p>
                            <p class="my-4"><span class="my_bold">Indirizzo:</span> {{ $user->address }}</p>
                            <p class="my-4"><span class="my_bold">Telefono:</span> {{ $user->telephone }}</p>
                            <p class="my-4"><span class="my_bold">Partita iva:</span> {{ $user->p_iva }}</p>
                            @if ($user->shipping)
                                <p class="my-4"><span class="my_bold">Costi di consegna:</span> {{ $user->shipping }}€</p>
                            @else
                                <p class="my-4"><span class="my_bold">Costi di consegna:</span> 0€</p>
                            @endif
                            @if ($user->min_price)
                                <p class="my-4"><span class="my_bold">Ordine minimo:</span> {{ $user->min_price }}€</p>
                            @else
                                <p class="my-4"><span class="my_bold">Ordine minimo:</span> 0€</p>
                            @endif
                            {{-- @if ($user->type)
                                <span class="badge badge-info">{{ $user->type->name }}</span>
                            @endif --}}
                            {{-- @if (count($user->tags) > 0)
                                <h5 class="mt-3">Tags:</h5>
                                @foreach ($user->tags as $tag)
                                    <span class="badge badge-primary">{{ $tag->name }}</span>
                                @endforeach
                            @endif --}}
                        </div>
                        <div class="buttons mt-4 d-flex">
                            <button type="button" class="btn btn-danger"><a class="text-white"
                                    href="{{ route('home') }}">Back to home</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
