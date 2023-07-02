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

                         //$clientsDAO = new DAO\ClientDAO;
                         //$client = $clientsDAO->GetClientById(3);
                         //var_dump($client);

                         foreach($repairsList as $repair){                       
                         ?>
                              <tr>
                                   <td> <?php echo $repair->getRepairId();?></td>
                                   <td>
                                        <form action="<?php echo FRONT_ROOT?>Repair/EditStatus" method="post">
                                             <input name="repairId" value="<?php echo $repair->getRepairId();?>" hidden>
                                             <select name="repairStatusId" class="form-control">
                                                  <optgroup>
                                                       <option disabled selected><?php echo "Actual: ". $repair->getRepairStatusId();?></option>                                        
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
                                   <td> <?php echo $repair->getDescription();?></td>
                                   <td> <?php echo $repair->getTechnicalId();?></td>
                                   <td> 
                                        <?php 
                                             // esto era antes de unir nombre con telefono
                                             // echo $repair->getClientId();
                                             // con el / corto el string en 2 partes para el nombre uso la parte 1
                                             $telefono = explode('/',  $repair->getClientId());
                                             //var_dump($telefono);
                                             echo $telefono[0];
                                             //echo $repair->getClientId();
                                        ?>
                                   </td>
                                   <td> 
                                        <?php 
                                             // con el / corto el string en 2 partes para el telefono uso la parte 2
                                             $telefono = explode('/',  $repair->getClientId());
                                             //var_dump($telefono);
                                             echo $telefono[1];
                                        ?>
                                   </td>
                                   <td> 
                                        <form class="bg-light-alpha" action="<?php echo FRONT_ROOT ?>Repair/Delete">
                                             <div class="row">
                                                  <div class="col-lg-2">
                                                       <div class="form-group">
                                                            <input name="repairId" value="<?php echo $repair->getRepairId();?>" hidden>
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