
<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="line-height:0.5;">FACTURE</h1>
            <h3>N°:{{ $devis->id }}</h3><br>
            <p style="line-height:0.5;">PO : 0516245</p>
            <p style="line-height:0.5;">Date : {{ $facture->created_at }}</p>
        </div>
        <div class="col text-center">
            <img src="https://fakeimg.pl/100x100/">
        </div>
    </div><br>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-8">
            <p style="line-height:0.5;">CLIENT : {{ $data['clientname'] }}</p>
            <p style="line-height:0.5;">Contact : {{ $data['contact'] }}</p>
            <p style="line-height:0.5;">Projet : {{ $data['projectname'] }}</p>
        </div>
    </div><br>
    <div class="row">
        <div class="col-4">
            <p class="para">{{ $data['corporate'] }}</p><br>
            <p class="para">{{ $data['address'] }}</p>
            <p class="para">{{ $data['postalcode'] }} - {{ $data['city'] }} FRANCE</p><br>
            <p class="para">Tél : {{ $data['phone'] }}</p>
            <p class="para">Mobile : {{ $data['phone'] }}</p><br>
            <p class="para">Mail : {{ $data['email'] }}</p><br> 
            <p class="para">Dénomination juridique</p>
            <p class="para">RCS {{ $data['rcs'] }} - {{ $data['city'] }}</p>
            <p class="para">TVA INTRA : {{ $data['intracommunitytva'] }}</p><br>
            <p class="para">{{ $data['corporate'] }}.fr</p><br>
            <small>Le délai de paiement de cette Facture est de, un (1) mois, à compter de sa date d'édition.</small> 
        </div>
        <div class="col-8">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="border:1px solid black;">Designation</th>
            <th scope="col" style="border:1px solid black;">Montant</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row" style="border:1px solid black; height: 350px;">
                Désignation de la/ Les prestations réalisées<br>
                - {{ $devis->productname }} <br>
                - ....... <br>
                - ...... <br>
                - ....... <br>
                - ...... <br>
                - ....... <br>
            </th>
            <td style="border:1px solid black;">{{ $devis->pu }} €</td>
          </tr>
          <tr>
            <th scope="row" style="border:1px solid black;">Hors taxes</th>
            <td style="border:1px solid black;">{{ $devis->getTotalHT() }} €</td>
          </tr>
          <tr>
            <th scope="row" style="border:1px solid black;">TVA ({{$devis->tva}})</th>
            <td style="border:1px solid black;">{{$devis->getTotalTTC()}} €</td>
          </tr>
          <tr style="background-color:#e9ecef;">
            <th scope="row" style="border-bottom:1px solid black; border-left:1px solid black;">Total TTC</th>
            <td style="border:1px solid black;">{{$devis->getTotalTTC()}}€</td>
          </tr>
        </tbody>
      </table>
    </div>
</div><br><br>
      <p style="float:right; font-weight:bold;">Signature.............................................</p>
      <div style="padding:120px;"></div> 
      
      <hr>
      <small style="line-height:normal;">Toute somme qui n’aura pas été réglée par le Client dans les délais mentionnés ci-dessus et ce, à compter de la date de facturation;
        portera intérêt de retard au taux de dix pourcent (10%) par jour de retard conformément à l'article L. 441-6 du Code de commerce</small>     
    </div>                
<style>
    p {
        font-size:18px;
    }

    .para {
        font-size:12px;
    }
</style>  