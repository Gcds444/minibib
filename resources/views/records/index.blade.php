@extends('laravel-usp-theme::master')

@section('title') Sistema USP @endsection

@section('content')

<form method="get" action="/records">
<div class="row">
    <div class=" col-sm input-group">
    <input type="text" class="form-control" name="busca" value="{{ Request()->busca }}">
    <span class="input-group-btn">
        <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
    </span>
    </div>
</div>
</form>
</br>

{{ $records->appends(request()->query())->links() }}

<div class="card">
  <div class="card-body">
    <table class="table text-break text-justify bg-light">
      <thead class="thead ">
        @foreach($records as $record)
        <tr class="table alert alert-dark">
          <th scope="col" ><div class="text-uppercase">{{$record->titulo }}</div></th>
          <th scope="col" ><div style="width: 18rem;" class="text-center font-weight-bold">Ações:</div></th>
        </tr>
      </thead>
      <tbody>
      <tr>
        <td><div class="font-weight-bold">Autores:</div>{{$record->autores }}</td>
        <td><div class="text-center">
          <form class="row-sm" method="POST" action="/records/{{$record->id}}">
          <a class="row-sm btn-lg" href="/records/{{$record->id}}/edit"><i class="far fa-edit"></i></a>
          <a class="row-sm btn-lg" href="/records/{{$record->id}}"><i class="fas fa-external-link-alt"></i></a>
            @csrf
            @method('delete')
            <button type="submit" class=" btn btn-outline-primary btn-sm" onclick="return confirm('Tem certeza que deseja apagar?');"><i class="fas fa-trash-alt"></i></button>
            <a class="btn btn-primary" href="{{ route('instance.create',
            $record->id) }}">Cadastrar Tombo</a>
          </form>
          </div>
        </td>
        </td>
      </tr>
      <tr>
        <td ><div class="font-weight-bold">Localização:</div> {{ $record->localizacao }}</td>
        <td ><div class="font-weight-bold">Ano de Publicação:</div> {{ $record->ano }}</td>
      </tr>
      <tr>
        <td><div class="font-weight-bold">Categoria:</div>{{ $record->tipo }}</td>
        <td><div class="font-weight-bold">ISBN:</div> {{ $record->isbn }}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>


@endsection('content')
