////////////////////////////// 
document.addEventListener('DOMContentLoaded',function(){  
    create_icons();
});

function create_icons() {
    let cadete_icon = document.getElementsByClassName('fa fa-pencil-square-o');

    for (i = 0; i < cadete_icon.length; i++) {
        cadete_icon[i].onclick = function() {
            let selec_cadete = this.parentElement.nextElementSibling.innerHTML;
            document.getElementById("field_cadete").value = selec_cadete;
            document.getElementById("cadete_edit").click();
        }
    }
    
}
