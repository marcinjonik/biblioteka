@extends('layouts.home_admin')

@section('content')
<section class="masthead page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Lista wypożyczeń</h2>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id='tabela_lista'>
            <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa użytkownika</th>
                    <th scope="col">Nazwa książki</th>
                    <th scope="col">Data wypożyczenia</th>
                    <th scope="col">Data zwrotu</th>
                    <th scope="col">Akcje</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($borrow as $row)
                    <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->user_name}}</td>
                        <td>{{$row->book_name}}</td>
                        <td>{{$row->borrow_date}}</td>
                        <td>{{$row->return_date}}</td>
                        <td><a href="{{ route('borrows.edit', ['id' => $row->id]) }}" class="btn btn-success">Zatwierdz zwrot</a>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
