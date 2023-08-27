function prepare_QRdata(content) {
  let myObj = JSON.parse(content);
  let sender_id;
  let shipnum;
    
    if (typeof myObj.sender_id !== 'undefined') {
        sender_id = myObj.sender_id;
        shipnum = myObj.id;
    } else {
        sender_id = 688403891;
        shipnum = myObj.id;
    }
    
    request_data(sender_id, shipnum);
}

function prepare_data_man () {
    let shipnum;
    shipnum = document.getElementById("shipnum").value;
    sender_id = document.getElementById("sender_id").value;
    request_data(sender_id, shipnum);
    document.getElementById("shipnum").value = "";
    document.getElementById("sender_id").value = "";
}

var mat_ship = [];
var ind = 0;
var delet = [];
var num_pack = 0;
document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("num_pack").innerHTML = num_pack;
});

function request_data(sender_id, shipnum) {

    mat_ship = [];
    var Ajax;

    Ajax=new XMLHttpRequest();

    Ajax.onreadystatechange = function() {
        let ship_dat;
        
        if (Ajax.readyState==4 && Ajax.status==200) {

            mat_ship = JSON.parse( decodeURIComponent( Ajax.responseText) );
            submit_array()
            
        }

    }

    Ajax.open("GET","./info_shipping.php?sender_id="+sender_id+"&shipnum="+shipnum,true);

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
  //let txt = document.createTextNode("\u00D7");
  td3.className = "close center aligned";
  //td3.appendChild(txt);
  txt = document.createTextNode(ind);
  td4.appendChild(txt);
    ind += 1;
  td4.style.display = "none";
  //tr.appendChild(td3);
  tr.appendChild(td4);
  document.getElementById("my_ship_in").appendChild(tr);
  //document.getElementById("myUL").lastChild.appendChild(th1);

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

function submit_array() {

    //del_array();
    //scanner.stop();
    var Ajax;

    Ajax=new XMLHttpRequest();

    Ajax.onreadystatechange = function() {
        
        if (Ajax.readyState==4 && Ajax.status==200) {

            if (Ajax.responseText == "Exito" ) {
                audio.play();
                print_page(mat_ship);
            } else {
                audiomalo.play();
            }
            
        }

    }

    let packete = JSON.stringify(  mat_ship );
    //console.log(packete);
    Ajax.open("POST","./save_shipping.php",true);
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