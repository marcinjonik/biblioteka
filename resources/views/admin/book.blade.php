@extends('layouts.home_admin')

@section('content')
<section class="masthead page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Książki</h2>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Kategoria</th>
                    <th scope="col">Dostępność</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($ksiazki as $row)
                    <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->first_name}} {{$row->last_name}}</td>
                        <td>{{$row->category_name}}</td>
                        <td>
                        @if ($row->availability == "1")
                            &#10003;
                        @endif
                        @if ($row->availability == "0")
                             &#10007;
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
</section>
@endsection
