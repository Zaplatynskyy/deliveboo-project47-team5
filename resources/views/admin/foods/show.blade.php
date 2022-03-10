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
                            <p class="my-4">{{$food->description}}</p>
                            <p class="my-4">{{$food->price}} Euro</p>
                            <span
                                class="badge {{ $food->visible ? 'badge-success' : 'badge-secondary' }}">{{ $food->visible ? 'Visible' : 'Not visible' }}</span>
                            @if ($food->type)
                                <span class="badge badge-info">{{ $food->type->name }}</span>
                            @endif
                            @if (count($food->filters) > 0)
                                <h5 class="mt-3">Filters:</h5>
                                @foreach ($food->filters as $filter)
                                    <span class="badge badge-primary">{{ $filter->name }}</span>
                                @endforeach
                            @endif
                        </div>
                        <div class="buttons mt-4">
                            <button type="button" class="btn btn-warning"><a class="text-white"
                                    href="{{ route('foods.edit', $food->id) }}">Edit</a></button>
                            <button type="button" class="btn btn-danger btnP" data-toggle="modal"
                                data-target="#exampleModal">Delete</button>
                            <button type="button" class="btn btn-primary"><a class="text-white"
                                    href="{{ route('foods.index') }}">Back to the list</a></button>
                            {{-- Modal --}}
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-uppercase" id="exampleModalLabel">Attention! ❌</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this food?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary btnP"
                                                data-dismiss="modal">Close</button>
                                            <form action="{{ route('foods.destroy', $food->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger toastClicker btnP">Delete</button>
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