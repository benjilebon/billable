@extends('layouts.app')

@section('content')
<div style="background-color:black; margin-top:-20px;">
    <h2 class="text-center" style="padding:25px; color:white;">Mon tableau de bord</h2>
    <div class="container">
    <div class="row">
        <div class="col-4">
          <a><div class="inforide" style="box-shadow: 1px 51px 208px -27px rgba(0,0,0,0.43); border-radius:8px; margin:15px;">
            <div class="row" style="border-radius:8px;">
              <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone" style="background-color:#6CC785;">
              </div>
              <div class="col-lg-9 col-md-8 col-sm-8 col-8 text-center" style="padding:10px; background-color:white;">
                  <h4>Devis</h4>
                  <h2>00</h2>
              </div>
            </div>
          </div></a>
        </div>  
      
        <div class="col-4">
          <div class="inforide" style="box-shadow: 1px 51px 208px -27px rgba(0,0,0,0.43); border-radius:8px; margin:15px;">
            <div class="row" style="border-radius:8px;">
              <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone" style="background-color:#9A75FE;">
              </div>
              <div class="col-lg-9 col-md-8 col-sm-8 col-8 text-center" style="padding:10px; background-color:white;">
                  <h4>Dossiers</h4>
                  <h2>00</h2>
              </div>
            </div>
          </div>
        </div>  
  
        <div class="col-4">
          <div class="inforide" style="box-shadow: 1px 51px 208px -27px rgba(0,0,0,0.43); border-radius:8px; margin:15px;">
            <div class="row" style="border-radius:8px;">
              <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone" style="background-color:#4EBCE5;">
              </div>
              <div class="col-lg-9 col-md-8 col-sm-8 col-8 text-center" style="padding:10px; background-color:white;">
                  <h4>Clients</h4>
                  <h2>00</h2>
              </div>
            </div>
          </div>
        </div>
      </div> <br><br> 
      
    </div> 
</div>    

<div class="container"> 
  
<!------------------ DEVIS EN ATTENTE  ----------------------------->
    <p style="background-color: #6CC785; padding:5px; color:white; margin-top:50px;" class="text-center">DEVIS</p>
  
        @if (!empty($devis))

        <table class="table" style="margin-top:-15px;">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Raison sociale</th>
                    <th scope="col">Client</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Date</th>
                    <th scope="col">Montant HT</th>
                    <th scope="col">Devis signé ?</th>
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
                        {{ Form::open() }}
                        @if($devis->is_validated == 0)
                            {{ Form::hidden('devisId', $devis->id, ['id' => 'valide']) }}
                            <td><a href="{{ route('devis.validate', [$devis->id]) }}"><button type="submit" class="btn btn-primary" value="1">Valider</button></a></td>
                            {{ Form::close() }}
                        @else
                            <td>Signé</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

        @else

        <p>Vous n'avez aucun devis en attente de validation</p>

        @endif
<!------------------ DOSSIER OUVERT ----------------------------->
        <div style="border:1px solid grey; margin:50Px;"></div>
        <p style="background-color: rgb(154, 117, 254); padding:5px; color:white; margin-top:50px;" class="text-center">DOSSIERS</p>

        <table class="table" style="margin-top:-15px;">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Raison sociale</th>
                    <th scope="col">Client</th>
                    <th scope="col">Adresse</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <th scope="col">...</th>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                        <td><input type="button" class="btn btn-primary" value="Voir"></td>
                    </tr>
            </tbody>
        </table>

<!------------------ CLIENTS ----------------------------->
<div style="border:1px solid grey; margin:50Px;"></div>
      <p style="background-color: #4EBCE5; padding:5px; color:white; margin-top:50px;" class="text-center">CLIENTS</p>

        <table class="table" style="margin-top:-15px;">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Entreprise</th>
                    <th scope="col">Adresse</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <th scope="col">...</th>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                        <td><input type="button" class="btn btn-primary" value="Voir"></td>
                    </tr>
            </tbody>
        </table>
      </div>
</div>
<style>
  .devisCol {
    background-color: rgb(108, 199, 133); color:white;
  }
</style>   
@endsection