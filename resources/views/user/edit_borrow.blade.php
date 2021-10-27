@extends('layouts.home_admin')

@section('content')
<section class="masthead page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Wypożyczenie - {{ $book->id }} - {{ $book->name }}</h2>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id='tabela_dodaj'>
                <form action="{{ route('user.borrows.update', ['id' => $book->id])}}" method="POST" id="editBorrow" name="editBorrow">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="card" style="margin-left: auto; margin-right: auto; width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Wypożyczenie</h5>
                          <p class="card-text">Czy napewno chcesz wypożyczyć - {{ $book->name }}?</p>
                          <input value="{{Auth::user()->id}}" type="hidden" id="inputUserID" name="inputUserID" required="required">
                          <button type="submit" class="btn btn-primary">Zatwierdź</button>
                          <a href="{{route('user.borrow')}}" class="btn btn-secondary" data-dismiss="modal">Anuluj</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
