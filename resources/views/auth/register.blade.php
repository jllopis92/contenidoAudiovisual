@extends('layouts.loginAndRegister')

@section('content')
<script type="text/javascript" src="js/city_state.js"></script>

<div class="container">
    <div class="row">
    <div class="col-sm-8 col-sm-offset-2" style="margin-left: 0">
            <div class="panel panel-default">
                <div class="panel-heading orangeAndBoldText">Registro de Usuario</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" data-parsley-validate="">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="">
                            </div>
                            <div class="alert alert-danger col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2" id="nameValidation" style="display: none; margin-top: 10px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="">
                            </div>
                            <div class="alert alert-danger col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2" id="emailValidation" style="display: none;
                            margin-top: 10px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                            <div class="alert alert-danger col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2" id="passwordValidation" style="display: none;
                            margin-top: 10px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password_confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                            <div class="alert alert-danger col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2" id="confimPasswordValidation" style="display: none;
                            margin-top: 10px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zone" class="col-md-4 control-label">Zona</label>

                            <div class="col-md-6">
                                <select class="form-control" onchange="set_country(this,country,city_state), checkZone();" size="1" id="zone" name="zone">
                                    <option value="" selected="selected">SELECCIONE ZONA</option>
                                    <option value=""></option>
                                    <script type="text/javascript">
                                        setRegions();
                                    </script>
                                </select>
                            </div>
                            <div class="alert alert-danger col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2" id="zoneValidation" style="display: none;
                            margin-top: 10px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country" class="col-md-4 control-label">País</label>

                            <div class="col-md-6">
                                <select name="country" class="form-control" size="1" disabled="disabled" onchange="set_city_state(this,city_state, city)" required=""></select>
                            </div>
                            <div class="alert alert-danger col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2" id="countryValidation" style="display: none;
                            margin-top: 10px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city_state" class="col-md-4 control-label">Región</label>

                            <div class="col-md-6">
                                <select name="city_state" class="form-control" size="1" disabled="disabled" onchange="set_city(country, this, city)" required=""></select>
                            </div>
                            <div class="alert alert-danger col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2" id="regionValidation" style="display: none;
                            margin-top: 10px;">
                            </div>
                        </div>
                        <div class="form-group" id="cityGroup" style= "display:none">
                            <label for="city" class="col-md-4 control-label">Ciudad</label>

                            <div class="col-md-6">
                                <select name="city" class="form-control" value="null" size="1" disabled="disabled" onchange="print_citys( city_state,this)"></select>
                            </div>
                            <div class="alert alert-danger col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2" id="cityValidation" style="display: none;
                            margin-top: 10px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birthday" class="col-md-4 control-label">Fecha Nacimiento</label>

                            <div class="col-md-6">
                                <input id="birthday" class="form-control" type="date" name="birthday" required=""/>
                            </div>
                            <div class="alert alert-danger col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2" id="birthdayValidation" style="display: none;
                            margin-top: 10px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="isFromCine" class="col-md-4 control-label">¿Pertenece a la Escuela de Cine?</label>

                            <div class="col-md-6" style="margin-top: 15px">
                                <div class="col-xs-4">
                                    <input name="isFromCine" id="isFromCine" value= 1 type='radio'> Sí
                                </div>
                                <div class="col-xs-4">
                                    <input name="isFromCine" id="isFromCine" value= 0 checked="checked" type='radio'> No
                                </div>
                            </div>
                        </div>

                        <div id="selectRange" name="selectRange" class="form-group" style ="display: none;">
                            <label for="userRol" class="col-md-4 control-label">Rol en Escuela de Cine</label>

                            <div class="col-md-6">
                                <select class="form-control" name="userRol" id="userRol">
                                    <option value=" ">SELECCIONE ROL</option>
                                    <option value="alumno">Alumno</option>
                                    <option value="profesor">Profesor</option>
                                </select>
                            </div>
                            <div class="alert alert-danger col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2" id="rangeValidation" style="display: none; margin-top: 10px;">
                            </div>
                        </div>

                        <div id="selectYear" name="selectYear" class="form-group" style ="display: none;">
                            <label for="year" class="col-md-4 control-label">Año de Ingreso a Escuela de Cine</label>

                            <div class="col-md-6">
                                <select class="form-control" name="year" id="year">
                                    <option value=" ">SELECCIONE AÑO</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                </select>
                            </div>
                            <div class="alert alert-danger col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2" id="yearValidation" style="display: none; margin-top: 10px;">
                            </div>
                        </div>

                        <div class="form-group" style="display: none;">
                            <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control" name="tipo" value="externo">
                            </div>
                        </div>

                        <div class="form-group" style="display: none;">
                            <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control" name="tipo" value="externo">
                            </div>
                        </div>

                        {!! Recaptcha::render() !!}

                        <div id="txtregion" style="display: none;"></div>
                        <div id="txtplacename" style="display: none;"></div>

                        <div class="orangeAndBoldText" id="information" style="display: none; margin-top: 10px;">
                        </div>

                        <div class="form-group" style="margin-top: 10px;">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="sendButton" class="btn btn-primary disabled sendButton orangeButton" value="validate">
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
            j("#birthday").datepicker();
        });
    </script>

    <script type="text/javascript">
            var j = jQuery.noConflict();
            var validName = 0;
            var validEmail = 0;
            var validPassword = 0;
            var validPasswordConfirm = 0;
            var validZone = 0;
            var validCountry = 0;
            var validRegion = 0;
            var validCity = 0;
            var validRange = 1;
            var validYear = 1;
            

            j(document).on("change","input[type=radio]",function(){
                var isFromCine= j('[name="isFromCine"]:checked').val();
                if(isFromCine == 1){
                    document.getElementById("selectRange").style.display="inline";
                    document.getElementById("information").style.display = "inline";
                    document.getElementById("information").innerHTML = 'La petición de ser aceptado como miembro de la escuela de cine debe ser aprobada por el administrador, por el momento usted podra navegar como usuario externo.';
                    checkRange(isFromCine);
                }
                if(isFromCine == 0){
                    document.getElementById("selectRange").style.display="none";
                    document.getElementById("information").style.display = "none";
                    checkRange(isFromCine);
                }
            });

            j('#userRol').on('change',function(e){
                checkRange();
            });
            j('#year').on('change',function(e){
                checkYear();
            });
            
            j('#name').on('input',function(e){
                checkName();
            });
            j('#email').on('input',function(e){
                checkEmail();
                 j.post('../emailValid.php',{
                    email:j('#email').val(),

                },function(d){
                    if(d>0){
                        //alert('Respuesta:'+d);
                    }else{
                        if(d != ""){
                            document.getElementById("emailValidation").style.display = "inline";
                            document.getElementById("emailValidation").innerHTML = 'Este correo ya se encuentra registrado';
                            validEmail = 0;
                        }
                    }
                });
                j(this).attr("checked");
            });
            j('#password').on('input',function(e){
                checkPassword();
            });
            j('#password_confirm').on('input',function(e){
                checkConfimPassword();
            });
            /*j('#zone').change(function(){
                alert("cambio zona");
                checkZone();
            });
*/
            function checkForm() {
                if(validName == 0 || validEmail == 0 || validPassword == 0 || validPasswordConfirm == 0 || validRange == 0 || validYear == 0){
                    j(".sendButton").attr('class', 'btn btn-primary disabled sendButton orangeButton');
                }
                if(validName == 1 && validEmail == 1 && validPassword == 1 && validPasswordConfirm == 1 && validRange == 1 && validYear == 1){
                    j(".sendButton").attr('class', 'btn btn-primary active sendButton orangeButton');
                }          
            }
            function checkRange(){
                var isFromCine= j('[name="isFromCine"]:checked').val();
                var userRol = j('#userRol').val();
                if((userRol == "alumno") || (userRol == "profesor")){
                    document.getElementById("rangeValidation").style.display = "none";
                    validRange = 1;
                    checkForm();    
                }
                if(userRol == "alumno"){
                    document.getElementById("selectYear").style.display = "inline";
                    checkYear();
                }else{
                    document.getElementById("selectYear").style.display = "none";
                    validYear = 1;
                    checkForm();
                }


                if((isFromCine == 1) && (userRol == " ")){
                    document.getElementById("rangeValidation").style.display = "inline";
                    document.getElementById("rangeValidation").innerHTML = 'Debe Seleccionar un Rol';
                    validRange = 0;
                    checkForm();
                }else{
                    document.getElementById("rangeValidation").style.display = "none";
                    validRange = 1;
                    checkForm();
                }
            }
            function checkYear(){
                var year = j('#year').val();
                //alert("in zone" + zone);
                if(year == " "){
                    document.getElementById("yearValidation").style.display = "inline";
                    document.getElementById("yearValidation").innerHTML = 'Debe ingresar un año válido';
                    validYear = 0;
                    checkForm();
                }else{
                    document.getElementById("yearValidation").style.display = "none";
                    validYear = 1;
                    checkForm();
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
            function checkPassword(){
                var password = j('#password').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\Ñ\ñ]+$/;
                if(password.length <= 5){
                    document.getElementById("passwordValidation").style.display = "inline";
                    document.getElementById("passwordValidation").innerHTML = 'Minimo de 6 caracteres';
                    validPassword = 0;
                    checkForm();
                }else if(password.length >= 13){
                    document.getElementById("passwordValidation").style.display = "inline";
                    document.getElementById("passwordValidation").innerHTML = 'Máximo de 12 caracteres';
                    validPassword = 0;
                    checkForm();
                }else if (!BLIDRegExpression.test(password)) {
                    document.getElementById("passwordValidation").style.display = "inline";
                    document.getElementById("passwordValidation").innerHTML = 'Solo se permiten letras y numeros';
                    validPassword = 0;
                    checkForm();
                }else{
                    document.getElementById("passwordValidation").style.display = "none";
                    validPassword = 1;
                    checkForm();
                }
            }
            function checkConfimPassword(){
                var password_confirm = j('#password_confirm').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\Ñ\ñ]+$/;
                if(password_confirm.length == 0){
                    document.getElementById("confimPasswordValidation").style.display = "inline";
                    document.getElementById("confimPasswordValidation").innerHTML = 'Campo Obligatorio';
                    validPasswordConfirm = 0;
                    checkForm();
                }else if (password_confirm != (j('#password').val())) {
                    document.getElementById("confimPasswordValidation").style.display = "inline";
                    document.getElementById("confimPasswordValidation").innerHTML = 'Las contraseñas deben coincidir';
                    validPasswordConfirm = 0;
                    checkForm();
                }else{
                    document.getElementById("confimPasswordValidation").style.display = "none";
                    validPasswordConfirm = 1;
                    checkForm();
                }
            }
            function checkZone(){
                var zone = j('#zone').val();
                //alert("in zone" + zone);
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
                var password_confirm = j('#password_confirm').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\Ñ\ñ]+$/;
                if(password_confirm.length == 0){
                    document.getElementById("confimPasswordValidation").style.display = "inline";
                    document.getElementById("confimPasswordValidation").innerHTML = 'Campo Obligatorio';
                    validPasswordConfirm = 0;
                    checkForm();
                }else if (password_confirm != (j('#password').val())) {
                    document.getElementById("confimPasswordValidation").style.display = "inline";
                    document.getElementById("confimPasswordValidation").innerHTML = 'Las contraseñas deben coincidir';
                    validPasswordConfirm = 0;
                    checkForm();
                }else{
                    document.getElementById("confimPasswordValidation").style.display = "none";
                    validPasswordConfirm = 1;
                    checkForm();
                }
            }
            function checkRegion(){
                var password_confirm = j('#password_confirm').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\Ñ\ñ]+$/;
                if(password_confirm.length == 0){
                    document.getElementById("confimPasswordValidation").style.display = "inline";
                    document.getElementById("confimPasswordValidation").innerHTML = 'Campo Obligatorio';
                    validPasswordConfirm = 0;
                    checkForm();
                }else if (password_confirm != (j('#password').val())) {
                    document.getElementById("confimPasswordValidation").style.display = "inline";
                    document.getElementById("confimPasswordValidation").innerHTML = 'Las contraseñas deben coincidir';
                    validPasswordConfirm = 0;
                    checkForm();
                }else{
                    document.getElementById("confimPasswordValidation").style.display = "none";
                    validPasswordConfirm = 1;
                    checkForm();
                }
            }
            function checkCity(){
                var password_confirm = j('#password_confirm').val();
                var BLIDRegExpression = /^[a-zA-Z0-9\Ñ\ñ]+$/;
                if(password_confirm.length == 0){
                    document.getElementById("confimPasswordValidation").style.display = "inline";
                    document.getElementById("confimPasswordValidation").innerHTML = 'Campo Obligatorio';
                    validPasswordConfirm = 0;
                    checkForm();
                }else if (password_confirm != (j('#password').val())) {
                    document.getElementById("confimPasswordValidation").style.display = "inline";
                    document.getElementById("confimPasswordValidation").innerHTML = 'Las contraseñas deben coincidir';
                    validPasswordConfirm = 0;
                    checkForm();
                }else{
                    document.getElementById("confimPasswordValidation").style.display = "none";
                    validPasswordConfirm = 1;
                    checkForm();
                }
            }

    </script>
@stop
