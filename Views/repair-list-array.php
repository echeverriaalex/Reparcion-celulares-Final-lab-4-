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
                         <th>Código</th>
                         <th>Estado</th>
                         <th>Descripcion</th>
                         <th>Tecnico</th>
                         <th>Cliente</th>
                         <th>Telefono</th>
                         <th>Opcion</th>
                    </thead>
                    <tbody>                  
                         <?php
                         for($j=0; $j < count($repairsList); $j++){
                         ?> 
                              <tr>
                                   <td> <?php echo $repairsList[$j]['repairId'] ;?></td>
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
                                   <td> <?php echo $repairsList[$j]['repairDescription'];?></td>
                                   <td> <?php echo $repairsList[$j]['technicalName'];?></td>
                                   <td> 
                                        <?php
                                             echo $repairsList[$j]['clientName'];
                                        ?>
                                   </td>
                                   <td> 
                                        <?php 
                                             echo $repairsList[$j]['clientPhone'];
                                        ?>
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