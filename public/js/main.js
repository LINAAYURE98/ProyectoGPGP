function ListStudents(){
  GetContentAjaxByForm('Table', 'formSearchEstudiante', 'ListStudents');

}

function ListStudentsPage(count, url){
  if(url!=''){
    GetContentAjaxByForm('Table', 'formSearchEstudiante', url);
  }
  else{
    GetContentAjaxByForm('Table', 'formSearchEstudiante', 'ListStudents?page='+count);
  }

}











