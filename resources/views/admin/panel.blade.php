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
                <a href="{{ route('admin.borrows') }}" class="list-group-item list-group-item-action">Lista Wypożyczeń</a>
                <a href="{{ route('admin.books') }}" class="list-group-item list-group-item-action">Książki</a>
                <a href="{{ route('admin.authors') }}" class="list-group-item list-group-item-action">Autorzy</a>
                <a href="{{ route('admin.categories') }}" class="list-group-item list-group-item-action">Kategorie</a>
              </div>
        </div>
    </div>
</div>
</section>
@endsection
