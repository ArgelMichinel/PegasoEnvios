    <h2>Registrar Cadete</h2>
    <div class="formu">
      <form action="regis_cadete.php" method="get" class="container-reg">
        <h1>Seleccione el cadete a editar</h1>

        <label for="num_cadete"><b>Cadete:</b></label>
        <select name="num_cadete">
            <?php
                for ($i=0; $i < count($cadetes); $i++) {
                    echo ('<option value='. $cadetes[$i]['num_cadete'] . '>' . $cadetes[$i]['nombre'] . ' ' . $cadetes[$i]['apellido'] . '</option>' . PHP_EOL);
                }
            ?>
        </select>


        <button type="submit" class="btn">Editar</button>
      </form>
    </div>
