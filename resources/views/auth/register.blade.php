@extends('layouts.log')

@section('content')
<link href='assets/vendor/parsleyjs/src/parsley.css' rel='stylesheet' />
<script type="text/javascript" src="js/city_state.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="assets/vendor/parsleyjs/dist/parsley.min.js"></script>
<script type="text/javascript" src="assets/vendor/parsleyjs/dist/i18n/es.js"></script>
<style>
body {
      font-family: 'Roboto', sans-serif !important;
    }
</style>
<div class="container">
    <div class="row">
    <div class="col-md-8 col-md-offset-2" style="margin-left: 0">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de Usuario</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" data-parsley-validate="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required="">

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required="">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required="">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="">

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zone" class="col-md-4 control-label">Zona</label>

                            <div class="col-md-8">
                                <select onchange="set_country(this,country,city_state)" size="1" name="zone" required="">
                                    <option value="" selected="selected">SELECCIONE ZONA</option>
                                    <option value=""></option>
                                    <script type="text/javascript">
                                        setRegions();
                                    </script>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country" class="col-md-4 control-label">País</label>

                            <div class="col-md-6">
                                <select name="country" size="1" disabled="disabled" onchange="set_city_state(this,city_state, city)" required=""></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city_state" class="col-md-4 control-label">Región</label>

                            <div class="col-md-6">
                                <select name="city_state" size="1" disabled="disabled" onchange="set_city(country, this, city)" required=""></select>
                            </div>
                        </div>
                        <div class="form-group" id="cityGroup" style= "display:none">
                            <label for="city" class="col-md-4 control-label">Ciudad</label>

                            <div class="col-md-6">
                                <select name="city" size="1" disabled="disabled" onchange="print_citys( city_state,this)"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birthday" class="col-md-4 control-label">Fecha Nacimiento</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" name="birthday" required=""/>
                            </div>
                        </div>
                        <div class="form-group" style="display: none;">

                            <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control" name="tipo" value="externo">
                            </div>
                        </div>


                        <div id="txtregion"></div>
                        <div id="txtplacename"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" value="validate">
                                    <i class="fa fa-btn fa-user"></i> Registrar
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
