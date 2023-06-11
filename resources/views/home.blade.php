@extends('layouts.main')
@section('title', 'eMaha - Home')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Selamat Datang, {{ Auth::user()->nama ?? '' }}</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, earum.</p>
        </div>
    </div>
@endsection