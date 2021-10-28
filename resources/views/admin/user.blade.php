@extends('layouts.home_admin')

@section('content')
<section class="masthead page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Lista Użytkowników</h2>
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
                    <th scope="col">E-mail</th>
                    <th scope="col">Czy Admin</th>
                    <th scope="col">Akcje</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($user as $row)
                    <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>@if ($row->usertype == "admin")
                            &#10003;
                        @endif
                        @if ($row->usertype == "")
                             &#10007;
                        @endif
                        </td>
                        <td>
                        @if ($row->usertype == "admin")
                            <a href="{{ route('users.edit', ['id' => $row->id,'usertype' => 'admin']) }}" class="btn btn-danger">Usuń role administratora</a>
                        @endif
                        @if ($row->usertype == "")
                            <a href="{{ route('users.edit', ['id' => $row->id,'usertype' => 'user']) }}" class="btn btn-success">Nadaj role administratora</a>
                        @endif
                        </td>
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
