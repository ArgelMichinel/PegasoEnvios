<h2>Eliminar lista</h2>

<div class="presentacion"  id="presentacion">
    
    <div class="container-fluid" id="screem-lista">
        <div><p>Eliminar lista</p></div>
        
            <div>
                <label for="list">Selecciona la lista:</label>
                <select name="list" id="listsel1">
                    <?php
                        for ($i=0; $i < count($listas); $i++) {
                            echo ('<option value="'. $listas[$i]['id_list'] . '">' . $listas[$i]['name'] . '</option>' . PHP_EOL);
                        }
                    ?>
                </select>
            </div>
            <div>
                <button class="btn" onclick="document.getElementById('id01').style.display='block'; document.getElementById('listsel2').value = document.getElementById('listsel1').value" style="width: 70%;" id='botondel'>Eliminar</button>
            </div>
                
            <div id="id01" class="modal">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              <div class="modal-content">
                <div class="container">
                  <h1>Eliminar lista</h1>
                  <p style="font-size: 25px; color: black;">Esta acción no puede ser deshecha. ¿Está suguro de que desea borrar la lista?</p>
                  
                    <form action="" method="post">
                        <input type="text" name="list" id="listsel2" style="display: none;">
                        <div class="clearfix">
                            <button type="button" class="btn3 cancelbtn" onclick="document.getElementById('id01').style.display='none'" style="background-color: #484242;">Cancelar</button>
                            <button type="submit" class="btn3 deletebtn">Eliminar</button>
                        </div> 
                    </form>
                </div>
                </div>
            </div>
               
        
    </div>
  
</div>
