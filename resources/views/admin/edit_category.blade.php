@extends('layouts.home_admin')

@section('content')
<section class="masthead page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edytujesz Kategorie - {{ $category->id }} - {{ $category->name }}</h2>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id='tabela_dodaj'>
                <form action="{{ route('categories.update', ['id' => $category->id])}}" method="POST" id="addCategory" name="addCategory">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputName">Nazwa</label>
                        <input value="{{ $category->name }}" type="text" class="form-control" id="inputName" name="inputName" placeholder="Nazwa" required="required" data-validation-required-message="Wprowadź nazwe.">
                    </div><br/>
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
