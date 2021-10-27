@extends('layouts.home_admin')

@section('content')
<section class="masthead page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Wypożyczenie - {{ $borrow->id }}</h2>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id='tabela_dodaj'>
                <form action="{{ route('borrows.update', ['id' => $borrow->id])}}" method="POST" id="editBorrow" name="editBorrow">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputBorrowID">ID wypożyczenia</label>
                        <input value="{{ $borrow->id }}" type="text" class="form-control" id="inputBorrowID" name="inputBorrowID" placeholder="ID wypożyczenia" required="required" data-validation-required-message="Wprowadź ID wypożyczenia.">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputBorrowDate">Data wypożyczenia</label>
                        <input value="{{ $borrow->borrow_date }}" type="date" class="form-control" id="inputBorrowDate" name="inputBorrowDate" placeholder="Data wypożyczenia" required="required" data-validation-required-message="Wprowadź date">
                      </div>
                      <div class="form-group col-md-6">
                      <label for="inputReturnDate">Data zwrotu</label>
                        <input value="{{ $borrow->return_date }}" type="date" class="form-control" id="inputReturnDate" name="inputReturnDate" placeholder="Data zwrotu" required="required" data-validation-required-message="Wprowadź date">
                      </div>
                    </div><br/>
                    <button type="submit" class="btn btn-primary">Zatwierdz zwrot</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
