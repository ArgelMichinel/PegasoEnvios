var Mat_provincia= ["-","Capital Federal","Buenos Aires"];
var meto_direc;
var ciudades_1= ["(Seleccione una ciudad)","Ciudad Autónoma de BA"];
var ciudades_2= ["(Seleccione una ciudad)","Acassuso","Adrogué","Aldo Bonzi","Avellaneda","Banfield",
                "Burzaco","Beccar","Benavídez","Berazategui","Bernal","Billinghurst","Bosques",
                "Boulogne Sur Mer","Caseros","Castelar","Churruca","Ciudad de Florencio Varela",
                "Ciudad Jardín Lomas del Palomar","Ciudadela","Claypole","Crucecita","Dock Sud","Don Bosco",
                "Don Torcuato","El Libertador","El Palomar","El Pato","El Talar","Estanislao Severo Zeballos",
                "Ezpeleta","General Pacheco","Gerli","Glew","Gobernador Julio A Costa","Haedo","Hudson",
                "Hurlingham","Ingeniero Budge","Ingeniero Juan Allan","Ituzaingó","José Ingenieros",
                "José León Suárez","José Mármol","Juan María Gutiérrez","La Capilla","La Tablada","Lanús",
                "Llavallol","Lomas de Zamora","Lomas del Mirador","Loma Hermosa","Longchamps",
                "Malvinas Argentinas (Almirante Brown)","Martín Coronado","Martínez","Monte Chingolo","Morón",
                "Once de Septiembre","Pablo Podestá","Plátanos","Pereyra","Piñeyro","Rafael Calzada",
                "Ramos Mejía","Ranelagh","Remedios de Escalada (Lanús)","Remedios de Escalada (San Martín)",
                "Ricardo Rojas","Sáenz Peña","San Andrés","San Fernando",
                "San Francisco de Asís (Almirante Brown)","San Francisco Solano","San Isidro",
                "San José (Almirante Brown)","San José (Lomas de Zamora)","San Justo","San Martín",
                "Santos Lugares","Sarandí","Sourigues","Tapiales","Temperley","Tigre","Troncos del Talar",
                "Turdera","Valentín Alsina","Vicente López","Victoria","Villa Adelina","Villa Albertina",
                "Villa Ayacucho","Villa Ballester","Villa Bosch","Villa Brown","Villa Celina",
                "Villa Centenario","Villa Chacabuco","Villa Domínico","Villa España","Villa Fiorito",
                "Villa La Florida","Villa Luzuriaga","Villa Lynch","Villa Madero","Villa Maipú",
                "Villa Raffo","Villa San Luis","Villa Santa Rosa","Villa Sarmiento","Villa Tesei",
                "Villa Udaondo","Villa Vatteone","Virreyes","Wilde"];

var ciudades_1_value= ["-","Ciudad+Autonoma+de+Buenos+Aires"];
var ciudades_2_value= ["-","Acassuso","Adrogue","Aldo+Bonzi","Avellaneda","Banfield",
                "Burzaco","Beccar","Benavidez","Berazategui","Bernal","Billinghurst","Bosques",
                "Boulogne+Sur+Mer","Caseros","Castelar","Churruca","Ciudad+de+Florencio+Varela",
                "Ciudad+Jardin+Lomas+del+Palomar","Ciudadela","Claypole","Crucecita","Dock+Sud","Don+Bosco",
                "Don+Torcuato","El+Libertador","El+Palomar","El+Pato","El+Talar","Estanislao+Severo+Zeballos",
                "Ezpeleta","General+Pacheco","Gerli","Glew","Gobernador+Julio+A+Costa","Haedo","Hudson",
                "Hurlingham","Ingeniero+Budge","Ingeniero+Juan+Allan","Ituzaingo","Jose+Ingenieros",
                "Jose+Leon+Suarez","Jose+Marmol","Juan+Maria+Gutierrez","La+Capilla","La+Tablada","Lanus",
                "Llavallol","Lomas+de+Zamora","Lomas+del+Mirador","Loma+Hermosa","Longchamps",
                "Malvinas+Argentinas,Almirante+Brown","Martin+Coronado","Martinez","Monte+Chingolo","Moron",
                "Once+de+Septiembre","Pablo+Podesta","Platanos","Pereyra","Pineyro","Rafael+Calzada",
                "Ramos+Mejia","Ranelagh","Remedios+de+Escalada,Lanus","Remedios+de+Escalada,San+Martin",
                "Ricardo+Rojas","Saenz+Pena","San+Andres","San+Fernando",
                "San+Francisco+de+Asis,Almirante+Brown","San+Francisco+Solano","San+Isidro",
                "San+Jose,Almirante+Brown","San+Jose,Lomas+de+Zamora","San+Justo","San+Martin",
                "Santos+Lugares","Sarandi","Sourigues","Tapiales","Temperley","Tigre","Troncos+del+Talar",
                "Turdera","Valentin+Alsina","Vicente+Lopez","Victoria","Villa+Adelina","Villa+Albertina",
                "Villa+Ayacucho","Villa+Ballester","Villa+Bosch","Villa+Brown","Villa+Celina",
                "Villa+Centenario","Villa+Chacabuco","Villa+Dominico","Villa+Espana","Villa+Fiorito",
                "Villa+La+Florida","Villa+Luzuriaga","Villa+Lynch","Villa+Madero","Villa+Maipu",
                "Villa+Raffo","Villa San+Luis","Villa+Santa+Rosa","Villa+Sarmiento","Villa+Tesei",
                "Villa+Udaondo","Villa+Vatteone","Virreyes","Wilde"];

var todasCiudades = [
    [],
    ciudades_1,
    ciudades_2
  ];

var todasCiudades_value = [
    [],
    ciudades_1_value,
    ciudades_2_value
  ];

var respu; 

function cambia_ciudad(){ 
    //tomo el valor del select del pais elegido 
    var provincia; 
    provincia = document.getElementById('provincia').selectedIndex;
    //miro a ver si el pais está definido 
    if (provincia != 0) { 
       //si estaba definido, entonces coloco las opciones de la provincia correspondiente. 
       //selecciono el array de provincia adecuado 
       mis_ciudades=todasCiudades[provincia];
       mis_ciudades_value=todasCiudades_value[provincia];
       //calculo el numero de provincias 
       num_ciudades = mis_ciudades.length;
       //para cada provincia del array, la introduzco en el select
       $('#ciudad').empty(); 
       for(i=0;i<num_ciudades;i++){ 
        $('#ciudad').append('<option value="' + mis_ciudades_value[i] + '">' + mis_ciudades[i] + '</option>');   
        /*
            $('#ciudad').options[i].value=mis_ciudades[i] 
            $('#ciudad').options[i].text=mis_ciudades[i] */
       }	
    }else{ 
       //si no había provincia seleccionada, elimino las provincias del select 
       $('#ciudad').length = 1 
       //coloco un guión en la única opción que he dejado 
       $('#ciudad').empty(); 
       $('#ciudad').append('<option value="0">-</option>');  
    } 
}

function addOption(i) {
    optionText = 'Premium';
    optionValue = 'premium';

    $('#select1').append(`<option value="${optionValue}">
                               ${optionText}
                          </option>`);
}
////////////////////////////////////////////////////
function siguiente_vende() {
    //(let  element = document.getElementById('escritorio');
    if (($('#client').selectedIndex != 0) && ($('#order').value != '') && ($('#product').value != '')) {
        document.getElementById('escritorio').classList.add('animate__fadeOutLeft'); 
        document.getElementById('escritorio2').classList.remove('animate__fadeOutRight');
        $("#escritorio").one( 'animationend', function() { 
            document.getElementById('escritorio').style.display = 'none';
            document.getElementById('escritorio2').classList.add('animate__fadeInRight');
            document.getElementById('escritorio2').style.display = 'block';
         } );
    }

}
/////////////////////////////////////////////////////////////////////
function atras_destina() {
    document.getElementById('escritorio2').classList.remove('animate__fadeInRight');
    document.getElementById('escritorio2').classList.add('animate__fadeOutRight'); 
    $("#escritorio2").one( 'animationend', function() { 
        document.getElementById('escritorio2').style.display = 'none';
        document.getElementById('escritorio').classList.remove('animate__fadeOutLeft');
        document.getElementById('escritorio').classList.add('animate__fadeInLeft'); 
        document.getElementById('escritorio').style.display = 'block';
     } );
}

function siguiente_destina() {
    //(let  element = document.getElementById('escritorio');
    if (($('#destinatario').selectedIndex != 0) && ($('#documento').value != '') && ($('#telef').value != '')) {
        document.getElementById('escritorio2').classList.add('animate__fadeOutLeft'); 
        document.getElementById('escritorio3').classList.remove('animate__fadeOutRight');
        $('#escritorio2').one( 'animationend', function() { 
            document.getElementById('escritorio2').style.display = 'none';
            document.getElementById('escritorio2').classList.remove('animate__fadeInRight');
            document.getElementById('escritorio3').classList.add('animate__fadeInRight');
            document.getElementById('escritorio3').style.display = 'block';
         } );
    }

}
/////////////////////////////////////////////////////////////////////
function atras_compra() {
    document.getElementById('escritorio3').classList.remove('animate__fadeInRight');
    document.getElementById('escritorio3').classList.add('animate__fadeOutRight'); 
    $("#escritorio3").one( 'animationend', function() { 
        document.getElementById('escritorio3').style.display = 'none';
        document.getElementById('escritorio2').classList.remove('animate__fadeOutLeft');
        document.getElementById('escritorio2').classList.add('animate__fadeInLeft'); 
        document.getElementById('escritorio2').style.display = 'block';
     } );
}

function siguiente_compra() {
    //(let  element = document.getElementById('escritorio');
    if (($('#provincia').selectedIndex != 0) && ($('#ciudad').selectedIndex != 0) && ($('#calle').value != '') && ($('#altura').value != '') && ($('#Cpostal').value != '')) {
        document.getElementById('loader').style.display = 'flex';
        consulta_coord();
    }

}
/////////////////////////////////////////////////////////////////////
function atras_mapa() {
    document.getElementById('escritorio4').classList.remove('animate__fadeInRight');
    document.getElementById('escritorio4').classList.add('animate__fadeOutRight'); 
    $("#escritorio4").one( 'animationend', function() { 
        document.getElementById('escritorio4').style.display = 'none';
        document.getElementById('escritorio3').classList.remove('animate__fadeOutLeft');
        document.getElementById('escritorio3').classList.add('animate__fadeInLeft'); 
        document.getElementById('escritorio3').style.display = 'block';
     } );
}

function siguiente_mapa() {
    //(let  element = document.getElementById('escritorio');
    exporta_valores();
    
    document.getElementById('escritorio4').classList.add('animate__fadeOutLeft'); 
    document.getElementById('resumen').classList.remove('animate__fadeOutRight');
    $('#escritorio4').one( 'animationend', function() { 
        document.getElementById('escritorio4').style.display = 'none';
        document.getElementById('resumen').classList.add('animate__fadeInRight');
        document.getElementById('resumen').style.display = 'block';
        } );

}
/////////////////////////////////////////////////////////////////////

function consulta_coord() {
    var state;
    var q;
    var calle = document.getElementById('calle').value;
    calle = calle.replace(/ /g,"+");
    var street = document.getElementById('altura').value + '+' + calle;
    var city = document.getElementById('ciudad').value;
    var country = 'Argentina';
    var format='json';

    if ($('#provincia').selectedIndex == 1) {
        state= 'Capital+Federal';
    } else {
        state= 'Buenos+Aires';
    }

    q = 'street=' + street + '&city=' + city + '&state=' + state + '&country=' + country + '&format=' +format;

    var Ajax;

    Ajax=new XMLHttpRequest();

    Ajax.onreadystatechange = function() {
        let ship_dat;
        
        if (Ajax.readyState==4 && Ajax.status==200) {

            document.getElementById('loader').style.display = 'none'; 
            
            if (Ajax.responseText == '[]') {
                consulta_coord_alter();
                
            } else {
                respu = JSON.parse(Ajax.responseText);

                if (respu.length > 1) {
                    for (let i = 0; i < respu.length; i++) {
                        $('#select_ubicacion').append('<option value="' + i + '">' + respu[i].display_name + '</option>');
                    }
                    document.getElementById('select_ubicacion').style.display = 'block';
                } else {
                    document.getElementById('select_ubicacion').style.display = 'none';
                }

                document.getElementById('escritorio3').classList.add('animate__fadeOutLeft'); 
                document.getElementById('escritorio4').classList.remove('animate__fadeOutRight');
                $('#escritorio3').one( 'animationend', function() { 
                    document.getElementById('escritorio3').style.display = 'none';
                    document.getElementById('escritorio4').classList.add('animate__fadeInRight');
                    document.getElementById('escritorio4').style.display = 'block';
                } );
                $('#escritorio4').one( 'animationend', function() { 
                    inicio_map();
                } );
                
            }
            
        }

    }

    Ajax.open("GET","https://nominatim.openstreetmap.org/search.php?"+q,true);

    Ajax.send();
    
}
/////////////////////////////////////////////////////////////////////

function consulta_coord_alter() {
    var state;
    var q;
    var calle = document.getElementById('calle').value;
    calle = calle.replace(/ /g,"+");
    var street = document.getElementById('altura').value + '%2C' + calle;
    var city = document.getElementById('ciudad').value;
    var format='json';

    if ($('#provincia').selectedIndex == 1) {
        state= 'Capital+Federal';
    } else {
        state= 'Buenos+Aires';
    }

    q = 'q=' + street + '%2C' + city + '&format=' +format;

    var Ajax;

    Ajax=new XMLHttpRequest();

    Ajax.onreadystatechange = function() {
        let ship_dat;
        
        if (Ajax.readyState==4 && Ajax.status==200) {

            document.getElementById('loader').style.display = 'none'; 
            
            if (Ajax.responseText == '[]') {
                alert('La dirección ingresada no ha producido ningún resultado. Intente nuevamente con otros parámetros.');
                
            } else {
                respu = JSON.parse(Ajax.responseText);

                if (respu.length > 1) {
                    for (let i = 0; i < respu.length; i++) {
                        $('#select_ubicacion').append('<option value="' + i + '">' + respu[i].display_name + '</option>');
                    }
                    document.getElementById('Selec_direccion').style.display = 'block';
                } else {
                    document.getElementById('select_ubicacion').style.display = 'none';
                }

                document.getElementById('escritorio3').classList.add('animate__fadeOutLeft'); 
                document.getElementById('escritorio4').classList.remove('animate__fadeOutRight');
                $('#escritorio3').one( 'animationend', function() { 
                    document.getElementById('escritorio3').style.display = 'none';
                    document.getElementById('escritorio4').classList.add('animate__fadeInRight');
                    document.getElementById('escritorio4').style.display = 'block';
                } );
                $('#escritorio4').one( 'animationend', function() { 
                    inicio_map();
                } );
                
            }
            
        }

    }

    Ajax.open("GET","https://nominatim.openstreetmap.org/search.php?"+q,true);

    Ajax.send();
    
}

//////////////////////////////

function select_ubicacion() {
    coord_lat = respu[document.getElementById('select_ubicacion').selectedIndex].lat;
    coord_lon = respu[document.getElementById('select_ubicacion').selectedIndex].lon;
    map.remove();

    crea_mapa();
}

/////////////////////////////

function exporta_valores (params) {
    var elem = document. getElementById("client");
    document.getElementById('client_text').value = elem.options[elem.selectedIndex].text;
    document.getElementById('client_value').value = elem.options[elem.selectedIndex].value;
    document.getElementById('order2').value = document.getElementById('order').value;
    document.getElementById('product2').value = document.getElementById('product').value;
    document.getElementById('destinatario2').value = document.getElementById('destinatario').value;
    document.getElementById('documento2').value = document.getElementById('documento').value;
    document.getElementById('telef2').value = document.getElementById('telef').value;
    document.getElementById('provincia2').value = Mat_provincia[document.getElementById('provincia').selectedIndex];
    document.getElementById('ciudad2').value = todasCiudades[document.getElementById('provincia').selectedIndex][document.getElementById('ciudad').selectedIndex];
    //document.getElementById('calle2').value = document.getElementById('calle').value;
    document.getElementById('altura2').value = document.getElementById('altura').value;
    document.getElementById('CPostal2').value = document.getElementById('CPostal').value;
    document.getElementById('comentario2').value = document.getElementById('comentario').value;

    if (respu.length<2) {
        document.getElementById('Latit').value = respu[0].lat;
        document.getElementById('Longit').value = respu[0].lon;
        document.getElementById('calle2').value = respu[0].display_name;
    } else {
        document.getElementById('Latit').value = respu[document.getElementById('select_ubicacion').selectedIndex].lat;
        document.getElementById('Longit').value = respu[document.getElementById('select_ubicacion').selectedIndex].lon;
        document.getElementById('calle2').value = respu[document.getElementById('select_ubicacion').selectedIndex].display_name; //document.getElementById('calle').value;
    }
}

/////////////////////////////