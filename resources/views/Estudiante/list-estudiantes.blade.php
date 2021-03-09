@extends('layout.app')
@section('content')

<script>
  $(document).ready(function() {
    ListStudents();
    $("#codigo_estudiante").keyup(function() {
      ListStudents();
    });

    $("#nombre_estudiante").keyup(function() {
      ListStudents();
    });
    $("#cedula_estudiante").keyup(function() {
      ListStudents();
    });

  });

</script>
<div class="page-wrapper">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">GESTIONAR ESTUDIANTE</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ml-auto">
                      
                    </ol>
                    <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank"
                        class="btn btn-danger  d-none d-md-block pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">AGREGAR</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid"> 
    <form class="formSearch" id="formSearchEstudiante" method="post">
      @csrf
      <div class="row">
      <div class="col-md-3 center-up-3 padding-left-0 responsive_filter res_fil1_us">
          <div class="search">
            <span class="iconLogin"></span>
            <input type="text" name="codigo_estudiante" id="codigo_estudiante" class="form-control InputSearch filter_usu1" placeholder="Filtrar por Codigo...">
          </div>
        </div>
        <div class="col-md-3 center-up-3 padding-left-0 responsive_filter res_fil1_us">
          <div class="search">
            <span class="iconLogin"></span>
            <input type="text" name="nombre_estudiante" id="nombre_estudiante" class="form-control InputSearch filter_usu1" placeholder="Filtrar por Nombre...">
          </div>
        </div>
        <div class="col-md-3 center-up-3 padding-left-0 responsive_filter res_fil1_us">
          <div class="search">
            <span class="iconLogin"></span>
            <input type="text" name="cedula_estudiante" id="cedula_estudiante" class="form-control InputSearch filter_usu1" placeholder="Filtrar por Cedula...">
          </div>
        </div>
      </div>
    </form>
  </div>
  <div id="Table">
       
  </div>
</div>
@endsection
