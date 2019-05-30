@extends('layouts.app')

@section('content')
    Bienvenue sur votre espace !

    <br>


    @if (!empty($dossiers))

    <h3>Vos comptes clients</h3>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Raison sociale</th>
                <th scope="col">Client</th>
                <th scope="col">Adresse</th>
                <th scope="col">Date</th>
                <th scope="col">Devis</th>
                <th scope="col">Facture</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dossiers as $dossier)
                <tr>
                    <th scope="col">{{ $dossier->id }}</th>
                    <td>{{ $dossier->corporate }}</td>
                    <td>{{ $dossier->name }}</td>
                    <td>{{ $dossier->address }}</td>
                    <td>{{ $dossier->created_at }}</td>
                    <td><a class="btn btn-primary" href="{{ url('/storage/devis/devis-'.\Auth::user()->id.'.pdf') }}">Devis (PDF)</a></td>
                    <td><a href="">Terminer le projet et éditer une facture</a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @else

    <p>Vous n'avez aucun dossier en cours</p>

    @endif
    
@endsection