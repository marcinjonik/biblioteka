@extends('layouts.home_admin')

@section('content')
<section class="masthead page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edytujesz Książke - {{ $book->id }} - {{ $book->name }}</h2>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id='tabela_dodaj'>
                <form action="{{ route('books.update', ['id' => $book->id])}}" method="POST" id="addBook" name="addBook">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputName">Nazwa</label>
                        <input value="{{ $book->name }}" type="text" class="form-control" id="inputName" name="inputName" placeholder="Nazwa" required="required" data-validation-required-message="Wprowadź nazwe.">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputAuthorID">Autor</label>
                        <select id="inputAuthorID" name="inputAuthorID" class="form-control">
                            <option selected>Wybierz..</option>
                            @foreach (\App\Models\Author::all() as $item)
                                <option value={{$item->id}}>{{$item->first_name}} {{$item->last_name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputCategoryID">Kategoria</label>
                        <select id="inputCategoryID" name="inputCategoryID" class="form-control">
                            <option selected>Wybierz..</option>
                            @foreach (\App\Models\Category::all() as $item)
                                <option value={{$item->id}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                      <label for="inputAvailability">Dostępność</label>
                        <select id="inputAvailability" name="inputAvailability" class="form-control">
                          <option selected>Wybierz..</option>
                          <option >Tak</option>
                          <option>Nie</option>
                        </select>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
