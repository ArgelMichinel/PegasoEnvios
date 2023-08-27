    <h2>Registrar nuevo usuario</h2>
    <div class="formu">
      <form action="" method="post" class="container-reg">
        <h1>Nuevo usuario</h1>
        
        <label for="new_user[email]"><b>email</b></label>
        <input type="text" placeholder="Introduzca el email" name="new_user[email]" value="<?=$registro['email'] ?? ''?>" required>

        <label for="new_user[password]"><b>Contraseña</b></label>
        <input type="password" placeholder="Introduzca su contraseña" name="new_user[password]" required>
          
        <input type="password" name="new_user[user_id]" value="<?=$datos["user_id"]?>" style="display: none;">
        <input type="password" name="new_user[access_tok]" value="<?=$datos["access_token"]?>" style="display: none;">
        <input type="password" name="new_user[refresh_tok]" value="<?=$datos["refresh_token"]?>" style="display: none;">

        <button type="submit" class="btn">Registrar</button>
      </form>
        
        <input type="password" id="errores" name="errores" value="<?=$num_errores?>" style="display: none;">
        
        
        <div id="id01" class="modal">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          <div class="modal-content">
            <div class="container">
              <h1>Errores</h1>
                
                <?php
                for ($i = 0; $i < count($errores); $i++) {
                    echo '<p style="font-size: 25px; color: red;">- ' . $errores[$i] . '</p>';
                }  
                ?>
    
              <div class="clearfix">
                <button type="button" class="btn3 cancelbtn" onclick="document.getElementById('id01').style.display='none'" style="background-color: #484242;">Aceptar</button>
              </div>
            </div>
            </div>
        </div>
        
    </div>
