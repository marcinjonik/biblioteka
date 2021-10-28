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
        @if ($errors->any())
             <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                 </ul>
            </div>
        @endif

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
                    <th scope="col">Autor</th>
                    <th scope="col">Kategoria</th>
                    <th scope="col">Dostępność</th>
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

            <div id='tabela_dodaj'>
                <form action="{{ route('books.add')}}" method="POST" id="addBook" name="addBook">
                    {{ csrf_field() }}
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputName">Nazwa</label>
                        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Nazwa" required="required" data-validation-required-message="Wprowadź nazwe.">
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
                    </div><br/>
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                </form>
            </div>

                <div id='tabela_usun'>
                    <table class="table table-sm">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">usun</th>
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
                                @if ($row->availability == "1")
                                    &#10003;
                                @endif
                                @if ($row->availability == "0")
                                     &#10007;
                                @endif
                                </td>
                                <td><a href="{{ route('books.edit', ['id' => $row->id]) }}" class="btn btn-success">Edytuj</a>
                                    <a href="{{ route('books.delete', ['id' => $row->id]) }}" class="btn btn-danger">Usuń</a></td>
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
