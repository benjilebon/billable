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
                            <td><span class="badge badge-warning">Relance {{ \App\Facture::find($dossier->facture_id)->getRelance() }}</span><a class="btn btn-primary" href="{{ route('facture.close', [$dossier->facture_id]) }}">Valider le paiement</a></td>
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
    <br><br>
    <div class="bottom section-padding" style="padding: 60px 0; background-color: black;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="copyright" style="color: #e5e5e5;font-weight: 600;">
                            <p style="margin-bottom: 0;line-height: 50px;font-size: 16px;font-weight: 400;">© <span style="color: #d1caca;">2019</span> Billable Tous droits réservés.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
@endsection
