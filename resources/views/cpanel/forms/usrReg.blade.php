
<div class="form-group">
    {!!Form::label('nombre','Nombre:')!!}
    {!!Form::text('name',null,['class'=>'form-control', 'required'=> ''])!!}
    <div class="alert alert-danger col-xs-12" id="nameValidation" style="display: none">
    </div>
</div>
<div class="form-group">
    {!!Form::label('email','Correo:')!!}
    {!!Form::text('email',null,['class'=>'form-control', 'required'=> ''])!!}
    <div class="alert alert-danger col-xs-12" id="emailValidation" style="display: none">
    </div>
</div>
<div class="form-group">
    {!!Form::label('birthday','Fecha Nacimiento:')!!}
    {!!Form::text('birthday',null,['class'=>'form-control', 'required'=> ''])!!}
    <div class="alert alert-danger col-xs-12" id="dateValidation" style="display: none">
    </div>
</div>
<div class="form-group">
    {{-- <label for="zone" class="col-md-4 control-label">Zona</label>

    <div class="col-md-6">
        <select class="form-control" onchange="set_country(this,country,city_state), checkZone();" size="1" id="zone" name="zone">
            <option value="" selected="selected">SELECCIONE ZONA</option>
            <option value=""></option>
            <script type="text/javascript">
                setRegions();
            </script>
        </select>
    </div> --}}
    <div class="alert alert-danger col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2" id="zoneValidation" style="display: none;
    margin-top: 10px;">
</div>

{{-- 
    {!!Form::label('zone','Zona:')!!}
    {!!Form::text('zone',null,['class'=>'form-control','required'=> ''])!!} --}}
    <div class="alert alert-danger col-xs-12" id="zoneValidation" style="display: none">
    </div>
</div>
<div class="form-group">
    {!!Form::label('country','País:')!!}
    {!!Form::text('country',null,['class'=>'form-control','required'=> ''])!!}
    <div class="alert alert-danger col-xs-12" id="countryValidation" style="display: none">
    </div>
</div>
<div class="form-group">
    {!!Form::label('region','Región:')!!}
    {!!Form::text('region',null,['class'=>'form-control','required'=> ''])!!}
    <div class="alert alert-danger col-xs-12" id="regionValidation" style="display: none">
    </div>
</div>
<div class="form-group">
    {!!Form::label('city','Ciudad:')!!}
    {!!Form::text('city',null,['class'=>'form-control','required'=> ''])!!}
    <div class="alert alert-danger col-xs-12" id="cityValidation" style="display: none">
    </div>
</div>