<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <?php
                    if(isset($message)){
               ?>
                    <script> 
                         alert("<?php echo $message; ?>");
                    </script>
               <?php
                    }
               ?>

               <h2 class="mb-4">Listado de todas las Ordenes</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Informacion de reparacion</th>
                         <th>Informacion estado de la reparacion</th>
                         <th>Informacion del tecnico reparacion</th>
                         <th>Informacion cliente de la reparacion</th>
                         <th>Opciones</th>
                    </thead>
                    <tbody>                  
                         <?php
                         for($j=0; $j < count($repairsList); $j++){
                         ?> 
                              <tr>
                                   <td>
                                        <table>
                                             <thead>
                                                  <th>ID reparacion</th>
                                                  <th>Descripcion reparacion</th>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <td> <?php echo $repairsList[$j]['repairId'] ;?></td>
                                                       <td> <?php echo $repairsList[$j]['repairDescription'];?></td>
                                                  </tr>
                                             </tbody>
                                        </table>
                                   </td>

                                   <td>
                                        <table>
                                             <thead> 
                                                  <th>ID estado reparacion</th>
                                                  <th>Estado de reparacion</th>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <td><?php echo $repairsList[$j]['repairStatusId'];?></td>
                                                       <td>
                                                            <form action="<?php echo FRONT_ROOT?>Repair/EditStatus" method="post">
                                                                 <input name="repairId" value="<?php echo $repairsList[$j]['repairId'];?>" hidden>
                                                                 <select name="repairStatusId" class="form-control">
                                                                      <optgroup>
                                                                           <option disabled selected><?php echo "Actual: ". $repairsList[$j]['orderStatusdescription'];?></option>                                        
                                                                           <?php
                                                                                foreach($repairStatusList as $repairStatus){
                                                                           ?>
                                                                                     <option value="<?php echo $repairStatus->getRepairStatusId();?>"> <?php echo "Cambiar a: ".$repairStatus->getDescription();?> </option>
                                                                           <?php        
                                                                                }
                                                                           ?>
                                                                      </optgroup>
                                                                 </select>
                                                                 <button type="submit" class="btn btn-danger ml-auto d-block"> Actualizar estado</button>
                                                            </form>
                                                       </td>
                                                  </tr>
                                             </tbody>
                                        </table>
                                   </td>
                                   
                                   <td>
                                        <table>
                                             <thead>
                                                  <th>ID tecnico repacion</th>
                                                  <th>Nombre del tecnico</th>
                                                  <th>ID tecnico</th>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <td> <?php echo $repairsList[$j]['repairTechnicalId'];?></td>
                                                       <td> <?php echo $repairsList[$j]['technicalName'];?></td>
                                                       <td> <?php echo $repairsList[$j]['technicalId'];?></td>
                                                  </tr>
                                             </tbody>
                                        </table>
                                   </td>
                                   
                                   <td>
                                        <table>
                                             <thead>
                                                  <th>ID cliente repacion</th>
                                                  <th>Nombre del cliente</th>
                                                  <th>ID del cliente</th>
                                                  <th>Telefono del cliente</th>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <td> <?php echo $repairsList[$j]['repairClientId'];?></td>
                                                       <td> <?php echo $repairsList[$j]['clientName'];?></td>
                                                       <td> <?php echo $repairsList[$j]['clientPhone'];?></td>
                                                       <td> <?php echo $repairsList[$j]['clientId'];?></td>
                                                  </tr>
                                             </tbody>
                                        </table>
                                   </td>
                                   
                                   <td>
                                        <form class="bg-light-alpha" action="<?php echo FRONT_ROOT ?>Repair/Delete">
                                             <div class="row">
                                                  <div class="col-lg-2">
                                                       <div class="form-group">
                                                            <input name="repairId" value="<?php echo $repairsList[$j]['repairId'];?>" hidden>
                                                            <button type="submit" class="btn btn-dark ml-auto d-block">Eliminar</button>
                                                       </div>
                                                  </div>                         
                                             </div>
                                        </form>
                                   </td>
                              </tr>
                         <?php
                         }
                         ?>
                    </tbody>
               </table>
          </div>
     </section>
</main>