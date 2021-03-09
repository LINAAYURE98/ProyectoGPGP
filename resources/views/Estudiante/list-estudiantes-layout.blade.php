@extends('layout.Temporal')
@section('content')
 <div class="col-sm-12">
     <div class="white-box">
        <h3 class="box-title">ESTUDIANTE</h3>
          <div class="table-responsive">
             <table class="table">
             <thead>
              <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Codigo Estudiantil</th>
                <th class="border-top-0">Nombres</th>
                <th class="border-top-0">Correo Personal</th>
                <th class="border-top-0">Correo Institucional</th>
                <th class="border-top-0">Cedula</th>
              </tr>
            </thead>
            <tbody class="table_mayuscula">
              @if($estudiantes!=null && $estudiante->count()>0)
                @foreach($estudiantes as $estudiante)
                <tr class="pointer" id="{{$estudiante->codigo_auto_estudiante}}">
                  <td class="searchTd">{{$estudiante->codigo_auto_estudiante}}</td>
                  <td class="searchTd">{{$estudiante->codigo_estudiante}}</td>
                  <td class="searchTd">{{$estudiante->nombre_estudiante}}</td>
                  <td class="searchTd">{{$estudiante->cedula_estudiante}}</td>
                  <td class="searchTd">{{$estudiante->correo_personal_estudiante}}</td>
                  <td class="searchTd">{{$estudiante->correo_institucional_estudiante}}</td>
                  <td class="btn-table">
                    <div id="toolbar-options-a{{$loop->index+1}}" class="hidden">
                      <a  title="Editar Cliente" href=""><img src="{{asset('img/ICONO EDITAR.png')}}" width="18" alt=""></a>
                    </div>
                 </td>
                </tr>
              @endforeach
            @else
            <tr>
              <td colspan="5">No se encontraron datos</td>
            </tr>

            @endif
            </tbody>
        </table>
    </div>
  </div>
</div>
     @if($estudiantes!=null)
          @if($estudiantes->links()!=null)
            {{$estudiantes->links()}}
          @endif
        @endif
        <script>
          $(document).ready(function() {
              $(".pagination .page-item .page-link ").each(function(){
                if($(this).attr('rel')!='next' && $(this).attr('rel')!='prev'){
                  $(this).attr('onclick','ListStudentsPage('+$(this).html()+', "")');
                  $(this).attr('href','javascript:void(0)');
                }
                else{
                  $(this).attr('onclick','ListStudentsPage("", "'+$(this).attr('href')+'")');
                  $(this).attr('href','javascript:void(0)');
                }
              });
          });
        </script>
@endsection
