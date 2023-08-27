
function select_list() {
    let activar = document.getElementById('screem-lista');
    let desactivar = document.getElementById('principal');

    desactivar.style.display = "none";
    activar.style.display = "block";
}

function select_scanner() {
    let activar = document.getElementById('screem-scanner');
    let desactivar = document.getElementById('presentacion');

    desactivar.style.display = "none";
    activar.style.display = "block";
    activate_scanner();
}


////////////////////////////// Funciones correspondientes al escaner
var ind = 0;
var mat_ship = [];
var delet = [];
var num_pack = 0;
document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("num_pack").innerHTML = num_pack;
});

function activate_scanner() {
        let scanner;
        let cameras=[];
        let audio = document.getElementById("audio_scan");

        if( (navigator.userAgent.match(/Android/i)) || (navigator.userAgent.match(/webOS/i)) || (navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/BlackBerry/i)) || (navigator.userAgent.match(/IEMobile/i)) ) {

            scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });
            scanner.addListener('scan', function (content) {
                prepare_QRdata(content);
                audio.play();
                //alert(content);
            });

        } else {

            scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
            scanner.addListener('scan', function (content) {
                prepare_QRdata(content);
                audio.play();
                //alert(content);
            });

        }

        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
              scanner.start(cameras[0]);
            } else {
                  console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });


        document.addEventListener('visibilitychange', function(cameras) {
          if (!document.hidden) {
            scanner.start(cameras[0]);
          } else {
           scanner.stop();
          }
        });
}

function prepare_QRdata(content) {
  let myObj = JSON.parse(content);
  let shipnum;
  let repeti;
    
    repeti = false;
    shipnum = myObj.id;
    
    for (i = 0; i < mat_ship.length; i++) {
      if (shipnum == mat_ship[i]) {
        repeti = true;
      }
    }

    if (repeti == false) {
      print_page(shipnum);
    }
}

function prepare_data_man() {
  let shipnum = document.getElementById('shipnum').value;
  let repeti;
    
  repeti = false;
    
  for (i = 0; i < mat_ship.length; i++) {
    if (shipnum == mat_ship[i]) {
      repeti = true;
    }
  }

  if (repeti == false) {
    print_page(shipnum);
  }

  document.getElementById('shipnum').value = '';
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");

function print_page(shipnum) {
  mat_ship.push (shipnum);
    
  let tr = document.createElement("tr");
  let td1 = document.createElement("td");
  let inputValue = shipnum;
  let td_text = document.createTextNode(inputValue);
  td1.appendChild(td_text);
  tr.appendChild(td1);
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
  
  sumar_conta();

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


function del_array() {
    delet.sort(function(a, b) {
      return b - a;
    });
    
    for (i = 0; i < delet.length; i++) {
        mat_ship.splice(delet[i],1);
    }
}

function submit_array() {
  if (document.getElementById('cadete_dummy').value != "") { 
    del_array();
    
    let json_ship = JSON.stringify(mat_ship);
    
    document.getElementById('cadete_scann').value = document.getElementById('cadete_dummy').value;
    document.getElementById('values_scann').value = json_ship;
    
    document.getElementById('submit_scann').click();
  }
}

function sumar_conta() {
  num_pack += 1;
  document.getElementById("num_pack").innerHTML = num_pack;
}
function restar_conta() {
  num_pack -= 1;
  document.getElementById("num_pack").innerHTML = num_pack;
}