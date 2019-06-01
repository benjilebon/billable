@extends('layouts.app')

@section('content')
    Bienvenue sur votre espace !

    <br>


    @if (!empty($dossiers))

    <h3>Vos dossiers clients</h3>

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
                <th scope="col">Paiement</th>
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
                    <td><a class="btn btn-primary" href="{{ url($dossier->devis) }}">Devis (PDF)</a></td>
                    @if ($dossier->facture != null)
                        <td><a class="btn btn-primary" href="{{ url($dossier->facture) }}">Facture (PDF)</a></td>
                        @if (\App\Facture::find($dossier->facture_id)->status != 5)
                        <td><span class="badge badge-warning">{{ \App\Facture::find($dossier->facture_id)->getNumberOfRelances() }} Relance {{ \App\Facture::find($dossier->facture_id)->getRelance() }}</span><a class="btn btn-primary" href="{{ route('facture.close', [$dossier->facture_id]) }}">Valider le paiement</a></td>
                        @else 
                            <td><span class="badge badge-info">Paiement validé</span></td>
                        @endif
                    @else
                        <td><a href="{{ route('facture.generate', [$dossier->id]) }}">Terminer le projet et éditer une facture</a> </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    @else

    <p>Vous n'avez aucun dossier en cours</p>

    @endif     
@endsection
