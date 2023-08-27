
////////////////////////////// 
document.addEventListener('DOMContentLoaded',function(){  
    constr_list();
});

function constr_list() {
    let trash_icon = document.getElementsByClassName('fa fa-trash');

    for (i = 0; i < trash_icon.length; i++) {
        trash_icon[i].onclick = function() {
            let selec_admin = this.parentElement.parentElement.children[1];
            document.getElementById("del_admin").value = selec_admin.innerHTML;
            document.getElementById("id01").style.display = 'block';
        }
    }
    
}
////////////////////////////////
function agregar() {
    window.location.href = "add_admin.php";
}

