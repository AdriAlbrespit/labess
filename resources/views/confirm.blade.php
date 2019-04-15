@extends('template')
  
@section('contenu')
    <br>
    <div class="container">
        <center>
        <div class="row card text-white bg-dark">
            <h4 class="card-header">Message envoyé !</h4>
            <div class="card-body">
                <p class="card-text">Merci !
                <br>Votre message a bien été transmis.</br>
                Vous recevrez une réponse rapidement :).</p>
            </div>
        </div>
        <a href="../public"><button type="submit" class="btn btn-primary">Retour à l'accueil</button></a>
        </center>
    </div>
@endsection