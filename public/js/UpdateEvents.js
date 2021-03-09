$(document).ready(function() {
  $(".nav-tabs").on("click", "a", function (e) {
    e.preventDefault();
   if (!$(this).hasClass('add-contact')) {
       $(this).tab('show');
   }
  })
  .on("click", "span", function () {
      var anchor = $(this).siblings('a');
      $(anchor.attr('href')).remove();
      $(this).parent().remove();
      $(".nav-tabs li").children('a').first().click();
  });

  $('.add-contact').click(function (e) {
      e.preventDefault();
      var id = $(".nav-tabs").children().length; //think about it ;)
      var tabId = 'bloque_' + id;
      var htmlBl =   '<div id="bloque_'+ id +'" class="container tab-pane active panel_bloque"><div class="col-md-12 padding-left-0" id="nombre_bloque">&nbsp;<input type="text" class="form-control inputsFormsSelect asig_nomblo" name="nameBlock' + id + '"style="height: calc(1.5rem);"  placeholder="Escribir nombre del bloque" required><div class="help-block with-errors"></div></div><div class="col-md-12  center-up-2" id="dur"><div class="row"><div class="col-md-7 padding-left-0"><div class="form-group row"><label for="fechaIni" class="col-sm-2 col-form-label" id="label_d">Duración</label><div class="col-sm-3 padding-Without-up-10"><input type="text" name="duracion1' + id + '" class="form-control inputsForms resp_in" id="Datetimepicker3" name="fechaIni" placeholder="" required><div class="help-block with-errors"></div></div><div class="col-sm-3 padding-Without-up-10"><input type="text" name="duracion2' + id + '"  class="form-control inputsForms data_dur" id="Datetimepicker3" name="fechaFin" placeholder="" required> <div class="help-block with-errors"></div></div><div class="col-md-4 HoursDiv"><label class="col-sm-2 col-form-label" id="label">Horas:</label><input type="number" min="0" class="form-control inputsForms HoursInputs hora_in" id="" name="Hours' + id + '"  placeholder="" data-toggle="tooltip" data-placement="right"></div></div></div></div></div><div class="col-md-12 padding-left-0"> <div class="table  table-responsive-sm table-hover addMember " id="Tab' + id + '"  ondrop="dropMember(event)" ondragover="allowDropMember(event)"></div></div></div>>';

      $(this).closest('li').before('<li class="nav-item" id="Head_' + id + '" draggable="true" ondragstart="drag(event)"><a class="nav-link" id="Head_' + id + '" draggable="true" ondragstart="drag(event)" data-toggle="tab" href="#bloque_' + id + '">Bloque ' + id + ' </a></li>');
      $('.tab-content').append( htmlBl);
     $('.nav-tabs li:nth-child(' + id + ') a').click();
     var num = parseFloat($('#NumBlocks').val());
     num+=1;
     $('#NumBlocks').val(num);
     AddDataPickerToSelect2();
     addEventsInInputsHours();
  });

  $( "#Name" ).keyup(function() {
    ListMembersLayout();
  });
  $( "#cedula" ).keyup(function() {
    ListMembersLayout();
  });
  AddEventsAll();

  $(document).ajaxComplete(function(){
    AddFunctionToSelects();
  });

  RecalculateNumAsist();

  addEventsInInputsHours();



});




function addEventsInInputsHours()
{
  $('[data-toggle="tooltip"]').each(function(){
    $(this).tooltip({title: "Número horas totales (opcional)"});
  });
}



/*
function RecalculateNumAsist()
{
  var id_evento = $("#id_evento").val();

  GetContentAjax('NumAsist', '../../RecalculateNumAsist,%20'+id_evento);

}
*/

function RecalculateNumAsist()
{

  $('#NumAsist').html($('.asistTable table tbody tr').length);
}



function AddDataPickerToSelect()
{
  $("input").each(function(){
    if($(this).attr('id')=='Datetimepicker2'){
      $(this).datetimepicker({
        footer: true,
        modal: true,
        width: '100%',
        format: 'yyyy-mm-dd HH:MM',
        datepicker: { minDate: $('.FechaInicial').val()+' 00:00', maxDate: $('.FechaFinal').val()+' 00:00'},
        timepicker: {format: 'HH.MM'}


			});
      $('.input-group-append').html('');
      $('.gj-icon').html('');

    }
  });
}


function AddDataPickerToSelect2()
{
  $("input").each(function(){
    if($(this).attr('id')=='Datetimepicker3'){
      $(this).datetimepicker({
        footer: true,
        modal: true,
        width: '100%',
        format: 'yyyy-mm-dd HH:MM',
        datepicker: { minDate: $('.FechaInicial').val()+' 00:00', maxDate: $('.FechaFinal').val()+' 00:00'},
        timepicker: {format: 'HH.MM'}


			});
      $('.input-group-append').html('');
      $('.gj-icon').html('');

    }
  });
}


function ResetDataPickerToSelect2()
{

  $("input").each(function(){
    if($(this).attr('id')=='Datetimepicker2'){
      $(this).val(' ');
      var datetimepicker = $(this).datetimepicker({
        footer: true,
        modal: true,
        width: '100%',
        format: 'yyyy-mm-dd HH:MM',
        datepicker: { minDate: $('.FechaInicial').val()+' 00:00', maxDate: $('.FechaFinal').val()+' 00:00'},
        timepicker: {format: 'HH.MM'}


			});
      datetimepicker.destroy();
    }
    if($(this).attr('id')=='Datetimepicker3'){
      $(this).val(' ');
      var datetimepicker = $(this).datetimepicker({
        footer: true,
        modal: true,
        width: '100%',
        format: 'yyyy-mm-dd HH:MM',
        datepicker: { minDate: $('.FechaInicial').val()+' 00:00', maxDate: $('.FechaFinal').val()+' 00:00'},
        timepicker: {format: 'HH.MM'}


			});
      datetimepicker.destroy();
    }
  });
}



function AddEventsAll(){

  var $BoxAsist = $('#BoxAsist').hide();
  var $datetimepicker = $('.FechaInicial').datepicker({
    footer: true,
    modal: true,
    width: '100%',
    format: 'yyyy-mm-dd',
    open: function (e) {
             $('.FechaFinal').prop( "disabled", true);
             $('.FechaFinal').prop( "value", ' ');
         }
  });
  var $datetimepicker2 = $('#FechaFinal');
  var $count = 1;


  $('.input-group-append').html('');
  $('.gj-icon').html('');
    $datetimepicker.change(function() {
      if($(this).val()!=''){
        var dates = new Date($(this).val());
        if($count>1){
          $('.FechaFinal').val(' ');
          $BoxAsist.slideUp();
        }

        $('.FechaFinal').datepicker({
          footer: true,
          modal: true,
          width: '100%',
          format: 'yyyy-mm-dd',
          minDate: dates
        });
        $count +=1;
        $('.FechaFinal').prop( "disabled", false);
        $('.input-group-append').html('');
        $('.gj-icon').html('');
      }
      else{
        $BoxAsist.slideUp();
        $('.FechaFinal').prop( "disabled", true);
      }

    });

    if($datetimepicker2.val()!=''){
      $BoxAsist.slideDown();
      $('.FechaFinal').prop( "disabled", false);
      AddDataPickerToSelect();
      AddDataPickerToSelect2();
    }


    $datetimepicker2.change(function() {
      if($(this).val()!=''){
        $BoxAsist.slideDown();
        ResetDataPickerToSelect2();
        AddDataPickerToSelect();
        AddDataPickerToSelect2();
      }
      else{
        $BoxAsist.slideUp();
        ResetDataPickerToSelect2();
        AddDataPickerToSelect();
        AddDataPickerToSelect2();
      }

    });
    $(document).ajaxComplete(function(){
      AddFunctionToTrs2('../../ShowMember');
    });


}


function ListMembersLayout(){
  var put = $(".put-method").html();
  $(".put-method").remove();
  GetContentAjaxByForm('Table', 'formSearchUsers', '../../ListMembersLayout');
  $(document).ajaxComplete(function(){
    $("#formSearchUsers").append('<div class="put-method" style="display:none;">'+put+'</div>');
  });


}

function functionName(ev) {
  ev.preventDefault();
}


function allowDrop(ev) {
  ev.preventDefault();

}

function dragLeave(ev) {
  ev.preventDefault();
  $(".addMember").addClass("dropMember");
}

function allowDropMember(ev) {
  ev.preventDefault();
  $(".addMember").addClass("dropMember");
}

function allow(ev) {
  ev.preventDefault();

}



function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);

}


function drag2(ev) {
  ev.dataTransfer.setData("text", ev.target.id);

}


function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}


function dropMember(ev) {
  ev.preventDefault();
  if(ev.target.id!='')
  {
    $("#"+ev.target.id).removeClass("dropMember");
    var htmlBl = $("#T"+ev.target.id).children().length;
    var data = ev.dataTransfer.getData("text");
    var html = document.getElementById(data);
    if(htmlBl>0){
      if(!IfExist('tr'+data+ev.target.id)){
        htmlBl +=1;
        document.getElementById('T'+ev.target.id).appendChild(document.getElementById(data));
        $('#'+data).attr('id', 'tr'+data+ev.target.id);
        $('#tr'+data+ev.target.id).unbind( "click" );
        $('#tr'+data+ev.target.id).append('<input type="hidden" name="member'+ev.target.id+'[]" style="display:none"  value="'+data+'">');
        $('#tr'+data+ev.target.id).addClass("member-list");
        $('#tr'+data+ev.target.id+' td .dropdown select').attr('name', 'tipoAsistente'+ev.target.id+htmlBl+'[]');
      }
      else{
        $('#Confirmation').modal('show');
      }

    }
    else{
      if(!IfExist('tr'+data+ev.target.id)){
        document.getElementById(ev.target.id).innerHTML = '<table  class="table  table-responsive-sm table-hover"><thead class="Thead-Asist"></thead><tbody id="T'+ev.target.id+'"></tbody></table>';
        document.getElementById('T'+ev.target.id).appendChild(document.getElementById(data));
        $('#'+data).attr('id', 'tr'+data+ev.target.id);
        $('#tr'+data+ev.target.id).unbind( "click" );
        $('#tr'+data+ev.target.id).append('<input type="hidden" name="member'+ev.target.id+'[]" style="display:none"  value="'+data+'">');
        $('#tr'+data+ev.target.id).addClass("member-list");
        $('#tr'+data+ev.target.id+' td .dropdown select').attr('name', 'tipoAsistente'+ev.target.id+'1[]');
      }
      else{
        $('#Confirmation').modal('show');
      }
    }

    ListMembersLayout();
    RecalculateNumAsist();

  }

}


function IfExist(id){
  if($('#'+id).length){
  	return true;
  }else{
  	return false;
  }
}



function deleteElement(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  if($('#'+data).hasClass('nav-item'))
  {
    $($('#'+data+' a').attr('href')).remove();
    $('#'+data).remove();
    var num = parseFloat($('#NumBlocks').val());
    num-=1;
    $('#NumBlocks').val(num);
    RecalculateBlocks();
  }
  else if($('#'+data).hasClass('nav-link'))
  {
    $('#ConfirmationEliminateBlock').modal('show');
    $('.ok-delete-block').attr('onclick', 'deleteBlock("'+data+'")');


  }
  else if($('#'+data).hasClass('member-list')){

    if(data.length>9)
    {
      $('#ConfirmationEliminate').modal('show');
      $('.ok-delete').attr('onclick', 'deleteMember("'+data+'")');

    }
    else {
      $('#'+data).remove();
    }

  }

  RecalculateNumAsist();

}



function deleteMember(id)
{
  id = id.toString();
  var pos = id.search("Tab");
  var res = id.substring(0,parseFloat(pos));
  var idMember = res.substring(2);
  var idBlock = id.substring(parseFloat(pos) + 3);
  var url = "../../DeleteMemberInEvent/"+idMember+"/"+idBlock;
  GetContentAjax2(url);
  $('#'+id).remove();
  $('#ConfirmationEliminate').modal('hide');

  RecalculateNumAsist();
}



function deleteBlock(id)
{
  id = id.toString();
  var pos = id.search("_");
  var idBlock = id.substring((parseFloat(pos)+1));
  var url = "../../DeleteBlockInEvent,%20"+idBlock;
  GetContentAjax2(url);
  $('#'+id).remove();
  $($('#'+id).attr('href')).remove();
  var num = parseFloat($('#NumBlocks').val());
  num-=1;
  $('#NumBlocks').val(num);
  RecalculateBlocks();
  $('#ConfirmationEliminateBlock').modal('hide');
  RecalculateNumAsist();
}


function AddFunctionToSelects(){
  $(".selectpicker").each(function(){
      $(this).selectpicker();
  });
}


function RecalculateBlocks(){
  var cont = 1;
  $(".nav-tabs li a").each(function(){
    if(!$(this).hasClass("add-contact")){
      $(this).html('Bloque '+cont);

      $(this).attr('href', '#bloque_'+cont);
      cont+=1;
    }

  });
  cont = 1;
  $(".tab-content .tab-pane").each(function(){
    $(this).attr('id', 'bloque_'+cont);
    cont+=1;

  });

  cont = 1;
  $(".addMember .tab-pane").each(function(){
    $(this).attr('id', 'bloque_'+cont);
    cont+=1;

  });

}
