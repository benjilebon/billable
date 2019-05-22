@extends('layouts.app')

@section('content')
    Bienvenue sur votre espace !
    <a href="{{ route('devis.create') }}" class="btn btn-primary">Créer un devis</a>
@endsection