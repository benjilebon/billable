@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Créer un devis') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('devis.store') }}">
                        @csrf
                        <h2>Informations sur le client</h2>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __("Nom du client") }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __("Contact du client (email)") }}</label>
                            <div class="col-md-6">
                                <input id="contact" type="email"  class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact" autofocus>
                                @error('contact')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="project_name" class="col-md-4 col-form-label text-md-right">{{ __('Nom du projet') }}</label>
    
                                <div class="col-md-6">
                                    <input id="project-name" type="text" class="form-control @error('project-name') is-invalid @enderror" name="project-name" value="{{ old('project-name') }}" required autocomplete="project-name" autofocus>
                                    
                                    @error('project_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <br>
                        <br>

                        <h2>Informations sur la société cliente</h2>

                        <div class="form-group row">
                            <label for="corporate" class="col-md-4 col-form-label text-md-right">{{ __("Nom de la société du client") }}</label>
                            
                            <div class="col-md-6">
                                <input id="corporate" type="text" class="form-control @error('corporate') is-invalid @enderror" name="corporate" value="{{ old('corporate') }}" required autocomplete="corporate" autofocus>

                                @error('corporate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __("Adresse") }}</label>
    
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
    
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __("Ville") }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postalcode" class="col-md-4 col-form-label text-md-right">{{ __("Code Postal") }}</label>

                            <div class="col-md-6">
                                <input id="postalcode" type="number" pattern="^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$" class="form-control @error('postalcode') is-invalid @enderror" name="postalcode" value="{{ old('postalcode') }}" required autocomplete="postalcode" autofocus>
                                @error('postalcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __("Email de la société") }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __("Téléphone de la société") }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="numeric"  class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rcs" class="col-md-4 col-form-label text-md-right">{{ __("RCS") }}</label>
                            <div class="col-md-6">
                                <input id="rcs" type="text"  class="form-control @error('rcs') is-invalid @enderror" name="rcs" value="{{ old('rcs') }}" required autocomplete="rcs" autofocus>
                                @error('rcs')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="intracommunitytva" class="col-md-4 col-form-label text-md-right">{{ __("N° TVA Intracommunautaire") }}</label>
                            <div class="col-md-6">
                                <input id="intracommunitytva" type="text"  class="form-control @error('intracommunitytva') is-invalid @enderror" name="intracommunitytva" value="{{ old('intracommunitytva') }}" required autocomplete="intracommunitytva" autofocus>
                                @error('intracommunitytva')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <br>
                        <br>

                        <h2>Informations sur le produit</h2>

                        <div class="form-group row">
                            <label for="productname" class="col-md-4 col-form-label text-md-right">{{ __("Nom du produit") }}</label>

                            <div class="col-md-6">
                                <input id="productname" type="text" class="form-control @error('productname') is-invalid @enderror" name="productname" value="{{ old('productname') }}" required autocomplete="productname" autofocus>

                                @error('productname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantité') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" pattern="^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pu" class="col-md-4 col-form-label text-md-right">{{ __('Prix Unitaire (€)') }}</label>

                            <div class="col-md-6">
                                <input id="pu" type="number" pattern="^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$" class="form-control @error('pu') is-invalid @enderror" name="pu" value="{{ old('pu') }}" required autocomplete="pu" autofocus>
                                @error('pu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tva" class="col-md-4 col-form-label text-md-right">{{ __('TVA (%)') }}</label>

                            <div class="col-md-6">
                                <input id="tva" type="number" step="0.01" pattern="^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$" class="form-control @error('tva') is-invalid @enderror" name="tva" value="{{ old('tva') }}" required autocomplete="tva" autofocus>
                                @error('tva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <br>

                        <div class="form-group row">
                                <label for="payment_conditions" class="col-md-4 col-form-label text-md-right">{{ __('Conditions de paiement') }}</label>
    
                                <div class="col-md-6">
                                    <select name="payment_conditions" id="payment_conditions">
                                        <option value="0">Acompte à la signature</option>
                                        <option value="1">Paiement comptant</option>
                                    </select>                                
                                    @error('payment_conditions')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Générer le devis') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
