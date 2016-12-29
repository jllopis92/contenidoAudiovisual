{{-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script> --}}

@if (!Auth::guest())
	@if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador") || (Auth::user()->id == $user->id))
		@extends('layouts.controlPanel')
		@section('content')
        <script type="text/javascript" src="/js/city_state.js"></script>
        <div class="col-sm-10 col-sm-offset-1" style="overflow: hidden; 
    background-color: #f8f8f8;
    border-color: #e7e7e7;">
			{!!Form::model($user,['route'=>['user.update',$user->id],'method'=>'PUT'])!!}
				<h3 class="orangeAndBoldText" style="margin-bottom: 30px;">Editar Perfil</h3>
                <div class="col-xs-12">
    				<div class="form-group col-xs-12 col-md-6">
                        {!!Form::label('name','Nombre:')!!}
                        {!!Form::text('name',null,['class'=>'form-control', 'required'=> ''])!!}
                        <div class="alert alert-danger col-xs-12" id="nameValidation" style="display: none">
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-md-6">
                        {!!Form::label('email','Correo:')!!}
                        {!!Form::text('email',null,['class'=>'form-control', 'required'=> ''])!!}
                        <div class="alert alert-danger col-xs-12" id="emailValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group col-xs-12 col-md-6">
                        {!!Form::label('birthday','Fecha Nacimiento:')!!}
                        {!!Form::text('birthday',null,['class'=>'form-control', 'required'=> ''])!!}
                        <div class="alert alert-danger col-xs-12" id="dateValidation" style="display: none">
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-md-6">
                        <label for="zone" class="col-md-4 control-label">Zona</label>
                            <select class="form-control" onchange="set_country(this,country,city_state), checkZone();" name="zone">
                                <option value="">SELECCIONE ZONA</option>
                                <script>
                                    var zoneEdit = '{!!$user->zone!!}';
                                    setRegionsInEdit(zoneEdit);
                                </script>
                            </select>
                        <div class="alert alert-danger col-xs-12" id="zoneValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group col-xs-12 col-md-6">
                        <label for="country" class="col-md-4 control-label">País</label>
                            <select name="country" class="form-control" onchange="set_city_state(this,city_state, city)" required="">
                                <option value="">SELECCIONE PAÍS</option>
                                <script>
                                    var countryEdit = '{!!$user->country!!}';
                                    setCountriesInEdit(zoneEdit, countryEdit);
                                </script>
                            </select>
                        <div class="alert alert-danger col-xs-12" id="countryValidation" style="display: none">
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-md-6">
                        <label for="city_state" class="col-md-4 control-label">Región</label>
                            <select name="city_state" class="form-control" onchange="set_city(country, this, city)" required="">
                                <option value="">SELECCIONE REGIÓN/ESTADO</option>
                                <script>
                                    var regionEdit = '{!!$user->region!!}';
                                    setCityStateInEdit(zoneEdit, countryEdit, regionEdit);
                                </script>
                            </select>
                        <div class="alert alert-danger col-xs-12" id="regionValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group col-xs-12 col-md-6">
                        <label for="city" class="col-md-4 control-label">Ciudad</label>
                            <select name="city" class="form-control" onchange="print_citys(city_state,this)">
                                <option value="">SELECCIONE CIUDAD</option>
                                <script>
                                    var cityEdit = '{!!$user->city!!}';
                                    setCityInEdit(zoneEdit, countryEdit, regionEdit, cityEdit);
                                </script>
                            </select>
                        <div class="alert alert-danger col-xs-12" id="cityValidation" style="display: none">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
    			    {!!Form::submit('Actualizar',['class'=>'btn btn-primary orangeButton sendButton'])!!}
                </div>
			{!!Form::close()!!}
        </div>
		@stop

        @section('page-style-files')
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
        @stop

        @section('page-js-files')
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
        
        @stop

        @section('page-js-script')

        <script>
            var j = jQuery.noConflict();
            j.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                weekHeader: 'Sm',
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            j.datepicker.setDefaults(j.datepicker.regional['es']);
            j(function () {
                j("#birthday").datepicker()
                .on("input change", function (e) {
                checkBirthday();
                });
            });
           
        </script>

         <script type="text/javascript">
            var j = jQuery.noConflict();
            var validName = 1;
            var validEmail = 1;
            var validBirthday = 1;
            var validZone = 1;
            var validCountry = 1;
            var validRegion = 1;
            var validCity = 1;
            
            j('#name').on('input',function(e){
                checkName();
            });
            j('#email').on('input',function(e){
                checkEmail();
            });
            /*checkZone();
            checkCountry();
            checkRegion();
            checkCity();*/
           
            /*j('#zone').change(function(){
                alert("cambio zona");
                checkZone();
            });
*/
            function checkForm() {
                if(validName == 0 || validEmail == 0 || validBirthday == 0 || validZone == 0 || validCountry == 0 || validRegion == 0 || validCity == 0){
                    j(".sendButton").attr('class', 'btn btn-primary orangeButton disabled sendButton');
                }
                if(validName == 1 && validEmail == 1 && validBirthday == 1 && validZone == 1 && validCountry == 1 && validRegion == 1 && validCity == 1){
                    j(".sendButton").attr('class', 'btn btn-primary orangeButton active sendButton');
                }               
            }
            function checkName(){
                var name = j('#name').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\ \Ñ\ñ\u00C0-\u017F]+$/;
                if(name.length == 0){
                    document.getElementById("nameValidation").style.display = "inline";
                    document.getElementById("nameValidation").innerHTML = 'Campo Obligatorio';
                    validName = 0;
                    checkForm();
                }else if (!BLIDRegExpression.test(name)) {
                    document.getElementById("nameValidation").style.display = "inline";
                    document.getElementById("nameValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    validName = 0;
                    checkForm();
                }else{
                    document.getElementById("nameValidation").style.display = "none";
                    validName = 1;
                    checkForm();
                }
            }
            function checkEmail(){
                var email = j('#email').val();
                var BLIDRegExpression = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(email.length == 0){
                    document.getElementById("emailValidation").style.display = "inline";
                    document.getElementById("emailValidation").innerHTML = 'Campo Obligatorio';
                    validEmail = 0;
                    checkForm();
                }else if (!BLIDRegExpression.test(email)) {
                    document.getElementById("emailValidation").style.display = "inline";
                    document.getElementById("emailValidation").innerHTML = 'Formato no Válido. Ej:ejemplo'+'@'+'ejemplo.cl';
                    validEmail = 0;
                    checkForm();
                }else{
                    document.getElementById("emailValidation").style.display = "none";
                    validEmail = 1;
                    checkForm();
                }
            }
            function checkBirthday(){
                var birthday = j('#birthday').val();
                var BLIDRegExpression = /^[0-9\-]+$/;
                if(birthday.length == 0){
                    validBirthday = 0;
                }else if (!BLIDRegExpression.test(birthday)) {
                    document.getElementById("dateValidation").style.display = "inline";
                    document.getElementById("dateValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                    validBirthday = 0;
                }else{
                    document.getElementById("dateValidation").style.display = "none";
                    validBirthday = 1;
                }
                checkForm();
            }
            function checkZone(){
                var zone = j('#zone').val();
                if(zone == ""){
                    document.getElementById("zoneValidation").style.display = "inline";
                    document.getElementById("zoneValidation").innerHTML = 'Campo Obligatorio';
                    validZone = 0;
                    checkForm();
                }else{
                    document.getElementById("zoneValidation").style.display = "none";
                    validZone = 1;
                    checkForm();
                }
            }
            function checkCountry(){
                var country = j('#country').val();
                if(country == ""){
                    document.getElementById("countryValidation").style.display = "inline";
                    document.getElementById("countryValidation").innerHTML = 'Campo Obligatorio';
                    validCountry = 0;
                    checkForm();
                }else{
                    document.getElementById("countryValidation").style.display = "none";
                    validCountry = 1;
                    checkForm();
                }
            }
            function checkRegion(){
                var region = j('#city_state').val();
                if(region == ""){
                    document.getElementById("regionValidation").style.display = "inline";
                    document.getElementById("regionValidation").innerHTML = 'Campo Obligatorio';
                    validRegion = 0;
                    checkForm();
                }else{
                    document.getElementById("regionValidation").style.display = "none";
                    validRegion = 1;
                    checkForm();
                }
            }
            function checkCity(){
                var city = j('#city').val();
                if(city == ""){
                    document.getElementById("cityValidation").style.display = "inline";
                    document.getElementById("cityValidation").innerHTML = 'Campo Obligatorio';
                    validCity = 0;
                    checkForm();
                }else{
                    document.getElementById("cityValidation").style.display = "none";
                    validCity = 1;
                    checkForm();
                }
            }

    </script>
        @stop
	@else
		<script type="text/javascript">
		    window.location = "/";//here double curly bracket
		</script>
	@endif
@else
	<script type="text/javascript">
		window.location = "/";//here double curly bracket
	</script>
@endif
