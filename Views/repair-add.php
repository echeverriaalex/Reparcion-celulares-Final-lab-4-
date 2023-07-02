<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Registrar Orden</h2>
               <form class="bg-light-alpha p-5" action="<?php echo FRONT_ROOT?>Repair/Add">
                    <div class="row">
                         <div class="col-lg-3">
                              <div class="form-group">
                                   <label for="">Estado de Orden</label>
                                   <select name="repairStatusId" class="form-control">
                                        <optgroup>
                                             <option disabled selected>Seleccionar...</option>                                        
                                             <?php
                                                  foreach($repairsStatusList as $repairsStatus){
                                             ?>
                                                       <option value="<?php echo $repairsStatus->getRepairStatusId();?>"> <?php echo $repairsStatus->getDescription();?> </option>
                                             <?php        
                                                  }
                                             ?>
                                        </optgroup>
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="form-group">
                                   <label for="">Cliente </label>
                                   <select name="clientId" class="form-control">
                                        <optgroup>
                                             <option disabled selected>Seleccionar...</option>                                        
                                             <?php
                                                  foreach($clientList as $client){
                                             ?>
                                                       <option value="<?php echo $client->getIdCliente();?>"> <?php echo $client->getNombre();?> </option>
                                             <?php        
                                                  }
                                             ?>
                                        </optgroup>
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="form-group">
                                   <label for="">Nombre del equipo</label>
                                   <input name="description" type="text" value="" class="form-control">
                              </div>
                         </div>
                    </div>
                    <input name="technicalId" type="text" value="<?php echo $_SESSION['technical']->getIdTechnical(); ?>" hidden>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main>