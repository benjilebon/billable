@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('facture.create', [$dossier->id]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="clientname" class="col-md-4 col-form-label text-md-right">{{ __("Nom du client") }}</label>

                            <div class="col-md-6">
                                <input id="clientname" type="text" class="form-control @error('clientname') is-invalid @enderror" name="clientname" value="{{ $devis->name }}" required autocomplete="clientname" autofocus>

                                @error('clientname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="clientaddress" class="col-md-4 col-form-label text-md-right">{{ __("Adresse du client") }}</label>

                            <div class="col-md-6">
                                <input id="clientaddress" type="text" class="form-control @error('clientaddress') is-invalid @enderror" name="clientaddress" value="{{ old('clientaddress') }}" required autocomplete="clientaddress" autofocus>

                                @error('clientaddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __("Contact (email)") }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ $devis->contact }}" required autocomplete="contact" autofocus>

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="projectname" class="col-md-4 col-form-label text-md-right">{{ __("Nom du projet") }}</label>

                            <div class="col-md-6">
                                <input id="projectname" type="text" class="form-control @error('projectname') is-invalid @enderror" name="projectname" value="{{ $devis->project_name }}" required autocomplete="projectname" autofocus>

                                @error('projectname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="corporate" class="col-md-4 col-form-label text-md-right">{{ __("Nom de la société") }}</label>

                            <div class="col-md-6">
                                <input id="corporate" type="text" class="form-control @error('corporate') is-invalid @enderror" name="corporate" value="{{ $devis->corporate }}" required autocomplete="corporate" autofocus>

                                @error('corporate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __("Adresse de la société") }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $devis->address }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postalcode" class="col-md-4 col-form-label text-md-right">{{ __("Code Postal") }}</label>

                            <div class="col-md-6">
                                <input id="postalcode" type="number" pattern="^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$" class="form-control @error('postalcode') is-invalid @enderror" name="postalcode" value="{{ $devis->postal_code }}" required autocomplete="postalcode" autofocus>
                                @error('postalcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __("Ville") }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $devis->city }}" required autocomplete="city" autofocus>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __("Ville") }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="numeric" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $devis->phone }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __("Email") }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $devis->email }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rcs" class="col-md-4 col-form-label text-md-right">{{ __("Ville") }}</label>

                            <div class="col-md-6">
                                <input id="rcs" type="text" class="form-control @error('rcs') is-invalid @enderror" name="rcs" value="{{ $devis->rcs }}" required autocomplete="rcs" autofocus>
                                @error('rcs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="intracommunitytva" class="col-md-4 col-form-label text-md-right">{{ __("Ville") }}</label>

                            <div class="col-md-6">
                                <input id="intracommunitytva" type="text" class="form-control @error('intracommunitytva') is-invalid @enderror" name="intracommunitytva" value="{{ $devis->intra_community_tva }}" required autocomplete="intracommunitytva" autofocus>
                                @error('intracommunitytva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
