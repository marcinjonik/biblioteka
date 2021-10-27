@extends('layouts.home_admin')

@section('content')
<section class="masthead page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Kategorie</h2>
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
                    <th scope="col">Nazwa</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($category as $row)
                    <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>

            <div id='tabela_dodaj'>
                <form action="{{ route('categories.add')}}" method="POST" id="addCategory" name="addCategory">
                    {{ csrf_field() }}
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputName">Nazwa</label>
                        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Nazwa" required="required" data-validation-required-message="Wprowadź nazwe.">
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
                            <th scope="col">Nazwa</th>
                            <th scope="col">Akcje</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $row)
                            <tr>
                                <th scope="row">{{$row->id}}</th>
                                <td>{{$row->name}}</td>
                                <td><a href="{{ route('categories.edit', ['id' => $row->id]) }}" class="btn btn-success">Edytuj</a>
                                <a href="{{ route('categories.delete', ['id' => $row->id]) }}" class="btn btn-danger">Usuń</a></td>
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
