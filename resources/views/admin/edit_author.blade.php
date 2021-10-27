@extends('layouts.home_admin')

@section('content')
<section class="masthead page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edytujesz Autora - {{ $author->id }} - {{ $author->first_name }}{{ $author->last_name }}</h2>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id='tabela_dodaj'>
                <form action="{{ route('authors.update', ['id' => $author->id])}}" method="POST" id="addAuthor" name="addAuthor">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputFirstName">Imie</label>
                        <input value="{{ $author->first_name }}" type="text" class="form-control" id="inputFirstName" name="inputFirstName" placeholder="Imie" required="required" data-validation-required-message="Wprowadź imie.">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputLastName">Nazwisko</label>
                        <input value="{{ $author->last_name }}" type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="Nazwisko" required="required" data-validation-required-message="Wprowadź nazwisko.">
                      </div>
                    </div><br/>
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
