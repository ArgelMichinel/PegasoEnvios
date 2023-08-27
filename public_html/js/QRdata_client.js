function prepare_QRdata(content) {
  let myObj = JSON.parse(content);
  let shipnum;
  let repeti;
    
  repeti = false;
  shipnum = myObj.id;

  for (i = 0; i < mat_ship.length; i++) {
    if (shipnum == mat_ship[i][0][0]) {
      repeti = true;
      audiomalo.play();
    }
  }

  if (repeti == false) {
    audio.play();
    request_data(shipnum);
  }
}

function prepare_data_man () {
    let shipnum = document.getElementById("shipnum").value;
    let repeti;
      
    repeti = false;
      
    for (i = 0; i < mat_ship.length; i++) {
      if (shipnum == mat_ship[i][0][0]) {
        repeti = true;
        audiomalo.play();
      }
    }
  
    if (repeti == false) {
      audio.play();
      request_data(shipnum);
    }
    document.getElementById("shipnum").value = "";
}

var mat_ship = [];
var ind = 0;
var delet = [];
var num_pack = 0;
document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("num_pack").innerHTML = num_pack;
});

function request_data(shipnum) {

    var Ajax;

    Ajax=new XMLHttpRequest();

    Ajax.onreadystatechange = function() {
        let ship_dat;
        
        if (Ajax.readyState==4 && Ajax.status==200) {

            ship_dat = JSON.parse( decodeURIComponent( Ajax.responseText) );
            if (ship_dat[1][3] != null) {
              mat_ship.push(ship_dat);
              print_page(ship_dat);
            }
            
        }

    }

    Ajax.open("GET","./client_shipping.php?shipnum="+shipnum,true);

    Ajax.send();

}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");

function print_page(ship_dat) {
    
  let tr = document.createElement("tr");
  let td1 = document.createElement("td");
  let td2 = document.createElement("td");
  let inputValue = ship_dat[0][0];
  let td_text = document.createTextNode(inputValue);
  td1.appendChild(td_text);
  inputValue = ship_dat[1][0] + ' ' + ship_dat[1][1] + ', ' + ship_dat[1][4] + ', ' + ship_dat[1][5] + ', CP ' + ship_dat[1][3] + ', ' + ship_dat[1][6];
  td_text = document.createTextNode(inputValue);
  td2.appendChild(td_text);
  tr.appendChild(td1);
  tr.appendChild(td2);
  let td3 = document.createElement("td");
  let td4 = document.createElement("td");
  let txt = document.createTextNode("\u00D7");
  td3.className = "close center aligned";
  td3.appendChild(txt);
  txt = document.createTextNode(ind);
  td4.appendChild(txt);
    ind += 1;
  td4.style.display = "none";
  tr.appendChild(td3);
  tr.appendChild(td4);
  document.getElementById("my_ship_in").appendChild(tr);
  //document.getElementById("myUL").lastChild.appendChild(th1);

  print_marker(ship_dat);

  if (ship_dat[1][3] != null) {
      sumar_conta();
  }


  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      let sel = this.nextElementSibling.innerHTML;
        delet.push(sel);
      let div = this.parentElement;
      div.style.display = "none";
      restar_conta();
    }
  }
}

function print_marker(ship_dat) {

  L.marker([  ship_dat[1][7]  ,   ship_dat[1][8]   ], {icon: PegasoMarker}).addTo(map);
}

function del_array() {
    delet.sort(function(a, b) {
      return b - a;
    });
    
    for (i = 0; i < delet.length; i++) {
        mat_ship.splice(delet[i],1);
    }
}

function submit_array() {

  del_array();
  scanner.stop();
  let packete = JSON.stringify(  mat_ship );
  let enviado = document.getElementById("packete");
  enviado.value = packete;

  var Ajax;

  Ajax=new XMLHttpRequest();

  Ajax.onreadystatechange = function() {
      
      if (Ajax.readyState==4 && Ajax.status==200) {

        if (Ajax.responseText == 'Exito') {

          document.getElementById("enviar").click();

        } else {

          //ship_dat = JSON.parse( decodeURIComponent( Ajax.responseText) );
          let text = document.createTextNode(Ajax.responseText);
          //let respu = document.createElement("div"); 
          let mensaje = document.createElement("h2"); 
          mensaje.appendChild(text);
          let list = document.getElementById("principal");
          list.innerHTML = '';
          list.className = "respuesta";
          list.appendChild(mensaje);
          //list.appendChild(respu);
          
        }
          
      }

  }

  console.log(packete);
  Ajax.open("POST","./save_shipping_client.php",true);
  Ajax.setRequestHeader("Content-Type","application/json");
  Ajax.send( packete );
}

function sumar_conta() {
  num_pack += 1;
  document.getElementById("num_pack").innerHTML = num_pack;
}
function restar_conta() {
  num_pack -= 1;
  document.getElementById("num_pack").innerHTML = num_pack;
}