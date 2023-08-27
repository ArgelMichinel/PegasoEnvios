var mat_list=[];

function activ_filter() {
    let filtros = document.getElementsByClassName('Checkbox-filter');
    let tr_dep_filtros = [];
    let termino;

    for (i=0; i < filtros.length; i++) {
        termino = filtros[i].parentElement.nextElementSibling;
        tr_dep_filtros.push(termino);
    }

    for (i=0; i < filtros.length; i++) {
    // If the checkbox is checked, display the output text
      if (filtros[i].checked == true){
        tr_dep_filtros[i].style.display = "block";
      } else {
        tr_dep_filtros[i].style.display = "none";
      }
    }
}
//////////////////////////////
function select_all() {
    let tr_table = document.getElementById('data_table').children;

    for (i=0; i < tr_table.length; i++) {
        tr_table[i].firstElementChild.firstElementChild.checked = document.getElementById('selection_check').checked;
        //tr_dep_filtros.push(termino);
    }
}
/////////////////////////////
function constr_list() {
    let tr_table = document.getElementById('data_table').children;
    let text_num;
    let check_td;

    for (i=0; i < tr_table.length; i++) {
        check_td = tr_table[i].children[0].children[0];
        if (check_td.checked == true){
            text_num = tr_table[i].children[1].innerText;
            mat_list.push(text_num);
          }
        
    }
    
    let json_list = JSON.stringify(mat_list);
    
    document.getElementById('values_list').value = json_list;
    
    document.getElementById('submit_list').click();
}

//////////////////////////////
function screen_mode() {
  let col_screen = document.getElementById('row_screen').children;

  if (col_screen[0].className === 'table_container col-sm-12 col-md-12') {
    let col_selector = document.getElementsByClassName('row_selector');
    col_selector[0].style.display = 'none'
    col_screen[0].className = 'table_container col-sm-6 col-md-6';
    col_screen[1].className = 'map_container col-sm-6 col-md-6';
  } else {
    let col_selector = document.getElementsByClassName('row_selector');
    col_selector[0].style.display = 'block';
    col_screen[0].className = 'table_container col-sm-12 col-md-12';
    col_screen[1].className = 'map_container col-sm-12 col-md-12';
  }
}