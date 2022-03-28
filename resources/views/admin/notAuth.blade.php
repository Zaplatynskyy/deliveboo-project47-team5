@extends('layouts.app')

@section('content')
    <div class="container page_not_auth">
        <div class="not_auth">
            <img src="{{asset('/storage/uploads/not-auth.png')}}" alt="">
        </div>

        <button type="button" class="btn btn-danger mb-5"><a class="text-white"
            href="{{ url()->previous() }}">Indietro</a></button>
    </div>
@endsection