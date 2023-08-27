    <div class="outfitSex">
        
        <div class="container-fluid" id="principal">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    
                    <div class="shared" style="margin: auto">
                        
                        <!********************************************************>
                                  <h2>Cameras</h2>
                        
                        <div class="preview-container">
                            <video id="preview" width="500" height="500"></video>
                        </div>
                        <!********************************************************>
                        <audio id="audio_scan" src="./include_QR/bip-scanner.mpeg"></audio>
                        <audio id="trompeta" src="./include_QR/trompeta.mp3"></audio>
                        
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-right: 0;">
                    
                    <div class="shared Lista" style="margin: auto">
                        
                        <!********************************************************>
                        <div id="myDIV" class="header_2">
                          <h1 style="margin:5px">Envíos para agregar</h1>
                          <p style="display: inline-block;">El numero de envios ingresados es:  </p><p id="num_pack" style="display: inline-block; padding-left: 5px;"></p>
                        </div>
                        
                        <div class="table-container">
                            <table id="my_ship_in">
                              <tr>
                                <th>Id. Shipping</th>
                                <th>Dirección</th>
                              </tr>
                            </table>
                        </div>
                        <!********************************************************>
                        
                        <div id="Envi_manual" class="header_2">
                          <p style="margin:5px; font-size: 30px;">Ingreso manual</p>
                              
                            <table width="15%" align="center">
                                <tr>
                                  <td># shipping:</td>
                                  <td> <input type="text" id="shipnum"></td>
                                </tr>
                                <tr>
                                  <td>Id. Vendedor:</td>
                                  <td> <input type="text" id="sender_id"></td>
                                </tr>
                                <tr>
                                  <td colspan="2" align="center"><button class="btn2" onclick="prepare_data_man()">Agregar</button></td>
                                </tr>
                            </table>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>  
        
    </div>