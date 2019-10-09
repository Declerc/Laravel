@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('adh_pseudo') ? ' has-error' : '' }}">
                            <label for="adh_pseudo" class="col-md-4 control-label">adh_pseudo</label>

                            <div class="col-md-6">
                                <input id="adh_pseudo" type="text" class="form-control" name="adh_pseudo" value="{{ old('adh_pseudo') }}" required>

                                @if ($errors->has('adh_pseudo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adh_pseudo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('adh_numadherent') ? ' has-error' : '' }}">
                            <label for="adh_numadherent" class="col-md-4 control-label">adh_numadherent</label>

                            <div class="col-md-6">
                                <input id="adh_numadherent" type="text" class="form-control" name="adh_numadherent" value="{{ old('adh_numadherent') }}" required>

                                @if ($errors->has('adh_numadherent'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adh_numadherent') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('adh_civilite') ? ' has-error' : '' }}">
                            <label for="adh_civilite" class="col-md-4 control-label">adh_civilite</label>

                            <div class="col-md-6">
                               <!--  <input id="adh_civilite" type="text" class="form-control" name="adh_civilite" value="{{ old('adh_civilite') }}" required> -->

                                <select id="adh_civilite" class="form-control" name="adh_civilite" value="{{ old('adh_civilite') }}">
                                    <option value=""></option>
                                    <option value="M.">M.</option>
                                    <option value="Mme.">Mme.</option>
                                </select>                                

                                @if ($errors->has('adh_civilite'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adh_civilite') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('adh_mel') ? ' has-error' : '' }}">
                            <label for="adh_mel" class="col-md-4 control-label">mel</label>

                            <div class="col-md-6">
                                <input id="adh_mel" type="text" class="form-control" name="adh_mel" value="{{ old('adh_mel') }}" required>

                                @if ($errors->has('adh_mel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adh_mel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('adh_nom') ? ' has-error' : '' }}">
                            <label for="adh_nom" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="adh_nom" type="text" class="form-control" name="adh_nom" value="{{ old('adh_nom') }}" required>

                                @if ($errors->has('adh_nom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adh_nom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('adh_prenom') ? ' has-error' : '' }}">
                            <label for="adh_prenom" class="col-md-4 control-label">prenom</label>

                            <div class="col-md-6">
                                <input id="adh_prenom" type="text" class="form-control" name="adh_prenom" value="{{ old('adh_prenom') }}" required>

                                @if ($errors->has('adh_prenom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adh_prenom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('adh_telfixe') ? ' has-error' : '' }}">
                            <label for="adh_telfixe" class="col-md-4 control-label">Tel Fixe</label>

                            <div class="col-md-6">
                                <input id="adh_telfixe" type="text" class="form-control" name="adh_telfixe" value="{{ old('adh_telfixe') }}" required>

                                @if ($errors->has('adh_telfixe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adh_telfixe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('adh_telportable') ? ' has-error' : '' }}">
                            <label for="adh_telportable" class="col-md-4 control-label">Tel Portable</label>

                            <div class="col-md-6">
                                <input id="adh_telportable" type="text" class="form-control" name="adh_telportable" value="{{ old('adh_telportable') }}" required>

                                @if ($errors->has('adh_telportable'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adh_telportable') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('adh_motpasse') ? ' has-error' : '' }}">
                            <label for="adh_motpasse" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="adh_motpasse" type="password" class="form-control" name="adh_motpasse" required>

                                @if ($errors->has('adh_motpasse'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adh_motpasse') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="adh_motpasse-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="adh_motpasse-confirm" type="password" class="form-control" name="adh_motpasse_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
