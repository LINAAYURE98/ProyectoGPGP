@extends('layouts')
@section('content')
<script>
$(document).ready(function() {
			$("form").validator().on("submit", function(e){

			});


});
</script>
<div class="container-40 center-up-2">
	<form method="post" action="{{route('estudiantes.store')}}" autocomplete="off">
		{{csrf_field()}}
		   <div class="BoxForm-100">
				<div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
							<label for="codigo_estudiante">Codigo Estudiantil</label>
							<input type="text" class="form-control inputsFormsSelect" name="codigo_estudiante" id="codigo_estudiante"  placeholder="" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>
                    <div class="col-md-6">
                        <div class="form-group">
							<label for="nombre_estudiante">Nombre Estudiante</label>
							<input type="text" class="form-control inputsFormsSelect" name="nombre_estudiante" id="nombre_estudiante"  placeholder="" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>
				</div>
				<div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cedula_estudiante">Cedula</label>
                            <input type="text" class="form-control inputsFormsSelect" name="cedula_estudiante" id="cedula_estudiante"  placeholder="" required>
                            <div class="help-block with-errors"></div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="correo_personal_estudiante">Correo Personal</label>
                            <input type="email" class="form-control inputsFormsSelect" id="correo_personal_estudiante" name="correo_personal_estudiante" placeholder="" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
			    <div class="row">	
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="correo_institucional_estudiante">Correo Institucional</label>
                            <input type="email" class="form-control inputsFormsSelect" id="correo_institucional_estudiante" name="correo_institucional_estudiante" placeholder="" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password1">Contraseña</label>
                            <input type="password" class="form-control inputsFormsSelect" name="password1" id="password1" data-minlength="6" data-minlength-error="La contraseña debe tener mínimo 6 carácteres" aria-describedby="emailHelp" placeholder="" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>					
                <div class="row center-up-5">
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success">Registrar <img src="{{asset('img/CHECK BLANCO.png')}}" width="15" alt=""></button>

                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('estudiante') }}" class="btn btn-danger btn_responsive">Cancelar <img src="{{ asset('img/EQUIS BLANCA.png') }}" width="15" alt=""></a>
                    </div>
                </div>
				</div>
			</form>
		</div>

@endsection
