@extends('layout')

@section('content')



<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <center><b>Répondre</b></center>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
      <form method="post" action="{{ action('MessageController@store') }}">
              @csrf
          <div class="form-group">
              <label for="quantity">Message :</label>
              <textarea type="text" class="form-control" name="message"></textarea>
          </div>
         <div align="rigth"> <button type="submit" class="btn btn-primary pull-right">Envoyer</button</div>
          <div align="left"><a href="{{ action('HomeController@index') }}"><button type="submit" class="btn btn-success pull-left">Retour</button></a><div>
      </form>
      
  </div>
</div>
@endsection