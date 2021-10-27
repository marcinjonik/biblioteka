@extends('layouts.home_user')

@section('content')
<section class="masthead page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Panel Użytkownika</h2>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="list-group">
                <a class="list-group-item list-group-item-action active">Panel</a>
                <a href="{{ route('user.books') }}" class="list-group-item list-group-item-action">Lista Książek</a>
                <a href="{{ route('user.borrows', ['id' => Auth::user()->id]) }}" class="list-group-item list-group-item-action">Lista Wypożyczeń</a>
                <a href="{{ route('user.borrow') }}" class="list-group-item list-group-item-action">Wypożycz Książke</a>
              </div>
        </div>
    </div>
</div>
</section>
@endsection
