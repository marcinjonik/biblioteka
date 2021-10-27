@extends('layouts.home_user')

@section('content')
<section class="masthead page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Wypożycz książke</h2>
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
                        <th scope="col">Nazwa</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Kategoria</th>
                        <th scope="col">Dostępność</th>
                        <th scope="col">Akcje</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($book as $row)
                        <tr>
                            <th scope="row">{{$row->id}}</th>
                            <td>{{$row->name}}</td>
                            <td>{{$row->first_name}} {{$row->last_name}}</td>
                            <td>{{$row->category_name}}</td>
                            <td>
                                &#10003;
                            </td>
                            <td><a href="{{ route('user.borrows.edit', ['id' => $row->id]) }}" class="btn btn-success">Wypożycz książke</a></td>
                        </tr>
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
