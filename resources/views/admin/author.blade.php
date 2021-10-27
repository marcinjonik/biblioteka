@extends('layouts.home_admin')

@section('content')
<section class="masthead page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Autorzy</h2>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <input id='lista' class="btn btn-primary" type="button" value="Lista">
            <input id='dodaj'class="btn btn-primary" type="button" value="Dodaj">
            <input id='usun' class="btn btn-primary" type="button" value="Usuń/Edytuj">

            <div id='tabela_lista'>
            <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imie</th>
                    <th scope="col">Nazwisko</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($author as $row)
                    <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->first_name}}</td>
                        <td>{{$row->last_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>

            <div id='tabela_dodaj'>
                <form action="{{ route('authors.add')}}" method="POST" id="addAuthor" name="addAuthor">
                    {{ csrf_field() }}
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputFirstName">Imie</label>
                        <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" placeholder="Imie" required="required" data-validation-required-message="Wprowadź imie.">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputLastName">Nazwisko</label>
                        <input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="Nazwisko" required="required" data-validation-required-message="Wprowadź nazwisko.">
                      </div>
                    </div><br/>
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                </form>
            </div>

                <div id='tabela_usun'>
                    <table class="table table-sm">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imie</th>
                            <th scope="col">Nazwisko</th>
                            <th scope="col">Akcje</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($author as $row)
                            <tr>
                                <th scope="row">{{$row->id}}</th>
                                <td>{{$row->first_name}}</td>
                                <td>{{$row->last_name}}</td>
                                <td><a href="{{ route('authors.edit', ['id' => $row->id]) }}" class="btn btn-success">Edytuj</a>
                                <a href="{{ route('authors.delete', ['id' => $row->id]) }}" class="btn btn-danger">Usuń</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
</section>

<script>
    $(document).ready(function(){
            $('#tabela_lista').show();
            $('#tabela_dodaj').hide();
            $('#tabela_usun').hide();
        $("#lista").click(function(){
            $('#tabela_lista').show();
            $('#tabela_dodaj').hide();
            $('#tabela_usun').hide();
        });
        $("#dodaj").click(function(){
            $('#tabela_dodaj').show();
            $('#tabela_lista').hide();
            $('#tabela_usun').hide();
        });
        $("#usun").click(function(){
            $('#tabela_usun').show();
            $('#tabela_dodaj').hide();
            $('#tabela_lista').hide();
        });
    });
</script>

@endsection
