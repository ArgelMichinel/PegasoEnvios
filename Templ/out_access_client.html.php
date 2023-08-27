    <h2>Bienvenido</h2>
    <div class="formu">
      <form action="" method="post" class="container-reg">
        <h1>Login</h1>
        
        <label for="login[user]"><b>email</b></label>
        <input type="text" placeholder="Introduzca el email" name="login[user]" required>

        <label for="login[password]"><b>Contraseña</b></label>
        <input type="password" placeholder="Introduzca su contraseña" name="login[password]" required>

        <button type="submit" class="btn">Ingresar</button>
        <a href="curl.php" id="registro">Registrarse como cliente</a>
      </form>
        
        <input type="password" id="errores" name="errores" value="<?=isset($num_errores)? $num_errores : 0;?>" style="display: none;">
        
        
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
