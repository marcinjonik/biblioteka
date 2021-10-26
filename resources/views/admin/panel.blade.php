@extends('layouts.home_admin')

@section('content')
<section class="masthead page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Panel Administratora</h2>
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
                <a href="#" class="list-group-item list-group-item-action">Lista Wypożyczeń</a>
                <a href="{{ route('admin.books') }}" class="list-group-item list-group-item-action">Lista Książek</a>
                <a href="#" class="list-group-item list-group-item-action">Lista Autorów</a>
                <a href="#" class="list-group-item list-group-item-action">Lista Kategorii</a>
                <a href="#" class="list-group-item list-group-item-action">Dodawanie Książki</a>
                <a href="#" class="list-group-item list-group-item-action">Dodawanie Autora</a>
                <a href="#" class="list-group-item list-group-item-action">Dodawanie Kategorii</a>
                <a href="#" class="list-group-item list-group-item-action">Usuwanie Książki</a>
                <a href="#" class="list-group-item list-group-item-action">Usuwanie Autora</a>
                <a href="#" class="list-group-item list-group-item-action">Usuwanie Kategorii</a>
              </div>
        </div>
    </div>
</div>
</section>
@endsection
