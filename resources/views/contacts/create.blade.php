@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <center><b>Formulaire de contact</b></center>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('contacts.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Nom et prénom :</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="price">Numéro de téléphone :</label>
              <input type="text" class="form-control" name="tel"/>
          </div>
          <div class="form-group">
              <label for="quantity">Adresse mail :</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="quantity">Message :</label>
              <textarea type="text" class="form-control" name="message"></textarea>
          </div>
          <center><button type="submit" class="btn btn-primary">Envoyer</button></center>
      </form>
  </div>
</div>
@endsection