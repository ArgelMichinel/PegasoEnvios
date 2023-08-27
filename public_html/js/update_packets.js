var mat_list = [];
var mat_logistica = [];
var num_datos = -1;
var num_datos_logis = -1;
var mat_select=[];

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
function constr_list_update() {
    let tr_table = document.getElementById('data_table').children;
    let id_ship;
    let id_sender;
    let check_td;
    let num_check=0;
    var conta=0;

    for (i=0; i < tr_table.length; i++) {
        check_td = tr_table[i].children[0].children[0];
        if (check_td.checked == true){
            num_check += 1;
            id_ship = tr_table[i].children[1].innerText;
            id_sender = tr_table[i].children[4].innerText;
            mat_select.push([id_ship,id_sender]);
          }
        
    }

    conta=0;
    num_datos = num_check;
    let itera;
    itera = setInterval(function (){
        //console.log (conta);
        request_data(mat_select[conta][1], mat_select[conta][0]);
        conta += 1;
        if (conta>(num_datos-1)) {
            clearInterval(itera);
        } 
    },112);
    
}
/////////////////////////////
function constr_list_logis() {
    let tr_table = document.getElementById('data_table').children;
    let id_ship;
    let check_td;
    let num_check=0;

    for (i=0; i < tr_table.length; i++) {
        check_td = tr_table[i].children[0].children[0];
        if (check_td.checked == true){
            num_check += 1;
            id_ship = tr_table[i].children[1].innerText;
            mat_logistica.push(id_ship);
          }
        
    }
    document.getElementById('values_list').value = JSON.stringify(  mat_logistica );
    document.getElementById('submit_list').click();
    
}
/////////////////////////////////
function request_data(sender_id, shipnum) {

    var Ajax;

    Ajax=new XMLHttpRequest();

    Ajax.onreadystatechange = function() {
        let ship_dat;
        
        if (Ajax.readyState==4 && Ajax.status==200) {

            ship_dat = JSON.parse( decodeURIComponent( Ajax.responseText) );
            mat_list.push(ship_dat);
            if (mat_list.length === num_datos) {
                submit_array();
            }
        }

    }

    Ajax.open("GET","./info_shipping.php?sender_id="+sender_id+"&shipnum="+shipnum,true);

    Ajax.send();

}
/////////////////////////////////////
function submit_array() {

    var Ajax;

    Ajax=new XMLHttpRequest();

    Ajax.onreadystatechange = function() {
        
        if (Ajax.readyState==4 && Ajax.status==200) {

            //ship_dat = JSON.parse( decodeURIComponent( Ajax.responseText) );
            let text = document.createTextNode(Ajax.responseText);
            //let respu = document.createElement("div"); 
            let mensaje = document.createElement("h2"); 
            mensaje.appendChild(text);
            let list = document.getElementById("main");
            list.innerHTML = '';
            list.className = "respuesta";
            list.appendChild(mensaje);
            //list.appendChild(respu);
            
        }

    }

    let packete = JSON.stringify(  mat_list );
    //console.log(packete);
    Ajax.open("POST","./save_shipping-u.php",true);
    Ajax.setRequestHeader("Content-Type","application/json");
    Ajax.send( packete );

}