


<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="line-height:0.5;">Devis</h1>
            <h3>{{ $devis->id }}</h3><br>
            <p style="line-height:0.5;">Nom client: {{ $devis->name }}</p>
            <p style="line-height:0.5;">Email client: {{ $devis->email }}</p>
            <p style="line-height:0.5;">Nom du projet: {{ $devis->project_name }}</p>
            <p style="line-height:0.5;">Adresse du client: {{ $devis->address }}</p>
        </div>
        <div class="col text-center">
            <img src="https://fakeimg.pl/100x100/">
        </div>
    </div><br>
    <small style="float:right;">Seuf précision, tous les prix affichés sont hors taxe</small>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Designation de la prestation</th>
            <th scope="col">pu</th>
            <th scope="col">quantity </th>
            <th scope="col">Montant</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row" style="border:1px solid black;">............</th>
            <td style="border:1px solid black;">€</td>
            <td style="border:1px solid black;">1</td>
            <td style="border:1px solid black;">€</td>
          </tr>
          <tr>
            <th scope="row" style="border:1px solid black;">Total Hors taxes</th>
            <td style="border:1px solid black;"></td>
            <td style="border:1px solid black;"></td>
            <td style="border:1px solid black;">TODO</td>
          </tr>
          <tr>
            <th scope="row" style="border:1px solid black;">TVA (20%)</th>
            <td style="border:1px solid black;"></td>
            <td style="border:1px solid black;"></td>
            <td style="border:1px solid black;">{{ $devis->tva }}</td>
          </tr>
          <tr style="background-color:#e9ecef;">
            <th scope="row" style="border-bottom:1px solid black; border-left:1px solid black;">Net à payer TTC</th>
            <td style="border-bottom:1px solid black;"></td>
            <td style="border-bottom:1px solid black;"></td>
            <td style="border:1px solid black;">TODO</td>
          </tr>
        </tbody>
      </table><br><br>
      <p>Bon pour accord. Acceptation de la proposition tarifaire ainsi que des conditions de vente jointes et du
        règlement.</p>
      <p style="font-weight:bold;">Fait à ........................................................ Le ...............................................</p>
      <p style="float:right; font-weight:bold;">Signature + Cachet</p>
      <div style="padding:120px;"></div> 
      
      <div style="border: 1px dashed black; padding:20px;">
          <p style="line-height:0.5; font-weight:bold;">Nom de la société: {{ $devis->corporate }}</p>
          <p style="line-height:0.5;">Adresse du client: {{ $devis->address }}</p>
          <p style="line-height:0.5;">Code postal: {{ $devis->postal_code }}</p>
          <p style="line-height:0.5;">RCS</p><br>
          <div class="row">
          <div class="col">
                <p style="line-height:0.5;">Cordonnées Bancaires</p>
                <p style="line-height:0.5;">IBAN : TODO</p>
          </div> 
          <div class="col">
                <p style="line-height:0.5;">Tél :TODO</p>
                <p style="line-height:0.5;">Mobile :TODO</p>
                <p style="line-height:0.5;">Mail : {{ $devis->email }}</p>
          </div>
        </div>   
      </div><br><br>
      <div style="line-height:normal;">Conditions de règlement : TODO PAYMENT CONDITION ?</div>
      <small style="line-height:normal;">Pour toute commande dont le montant s’élève à plus de trois milles euros hors taxe, un acompte de 30% ( trentes pourcents) est
            facturé. 50% (cinquantes pourcents) pourront être facturés au cours du projet, répartis sur un certain nombre de jalons.
            10% (dix pourcents) lors de la livraison. 10% (dix pourcents) après recette /validation."</small>     
    </div>                


