<h2>Bienvenidos</h2>

<div class="presentacion"  id="presentacion">
    
    <div class="container-fluid" id="principal">
        <div><p>¿Que desea realizar?</p></div>
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                <div class="shared" style="margin: auto">

                    <button class="btn" onclick="query_packets()">Consultar envíos</button>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                <div class="shared" style="margin: auto">

                    <button class="btn" onclick="assing_credential()">Otorgar permisos</button>

                </div>
            </div>

        </div>
    </div>
    
    <!********************************************************>
    
    <input type="password" id="envios" name="envios" value="<?=isset($num_envios)? $num_envios : 0;?>" style="display: none;">
  
</div>