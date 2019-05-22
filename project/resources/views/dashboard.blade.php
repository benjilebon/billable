@extends('layouts.app')

@section('content')
    Bienvenue sur votre espace !
    <a href="{{ route('devis.create') }}" class="btn btn-primary">Créer un devis</a>

    <br>


    @if (!empty($devis))

    <h3>Vos devis en attente de validation :</h3>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Raison sociale</th>
                <th scope="col">Client</th>
                <th scope="col">Adresse</th>
                <th scope="col">Date</th>
                <th scope="col">Montant HT</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($devis as $devis)
                <tr>
                    <th scope="col">{{ $devis->id }}</th>
                    <td>{{ $devis->corporate }}</td>
                    <td>{{ $devis->name }}</td>
                    <td>{{ $devis->address }}</td>
                    <td>{{ $devis->created_at }}</td>
                    <td>{{ \App\Devis::find($devis->id)->getTotalHT() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @else

    <p>Vous n'avez aucun devis en attente de validation</p>

    @endif
    
@endsection