    <h2>Registrar Cadete</h2>
    <div class="formu">
      <form action="" method="post" class="container-reg">
        <h1>Nuevo Cadete</h1>

        <label for="new_cadete[nombre]"><b>Nombre</b></label>
        <input type="text" placeholder="Introduzca el nombre" name="new_cadete[nombre]" value="<?=$cadete['nombre'] ?? ''?>" required>
        
        <label for="new_cadete[apellido]"><b>Apellido</b></label>
        <input type="text" placeholder="Introduzca el apellido" name="new_cadete[apellido]" value="<?=$cadete['apellido'] ?? ''?>" required>

        <label for="new_cadete[dni]"><b>DNI</b></label>
        <input type="text" placeholder="Introduzca el DNI" name="new_cadete[dni]" value="<?=$cadete['dni'] ?? ''?>" required>

        <label for="new_cadete[telefono]"><b>Teléfono</b></label>
        <input type="text" placeholder="Introduzca el teléfono" name="new_cadete[telefono]" value="<?=$cadete['telefono'] ?? ''?>" required>
          
        <label for="new_cadete[direcc]"><b>Dirección</b></label>
        <input type="text" placeholder="Introduzca la dirección" name="new_cadete[direcc]" value="<?=$cadete['direcc'] ?? ''?>">
          
          <label for="new_cadete[email]"><b>Email</b></label>
          <input type="text" placeholder="Introduzca el email" name="new_cadete[email]" value="<?=$cadete['email'] ?? ''?>" required>
          
          <label for="new_cadete[password]"><b>Password</b></label>
          <input type="text" placeholder="Introduzca la contraseña" name="new_cadete[password]" value="<?=$cadete['password'] ?? ''?>" required>
          
        <label for="new_cadete[num_cadete]" style="display: none;"><b>num_cadete</b></label>
        <input type="text" name="new_cadete[num_cadete]"  style="display: none;" value="<?=$cadete['num_cadete'] ?? ''?>">
          
        <label for="new_cadete[status]"><b>Status:</b></label>
          <select name="new_cadete[status]">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>>
          </select>


        <button type="submit" class="btn">Registrar</button>
      </form>
    </div>
