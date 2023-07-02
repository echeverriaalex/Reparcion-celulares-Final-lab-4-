<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado clientes</h2>
               <table class="table bg-light-alpha">
                    <thead>                         
                         <th>Id</th>
                         <th>Nombre</th>
                         <th>Telefono</th>
                         <th>Opcion</th>
                    </thead>
                    <tbody>
                         <?php 
                         foreach($clientList as $client){                       
                         ?>
                              <tr>                             
                                   <td> <?php echo $client->getIdCliente();?></td>
                                   <td> <?php echo $client->getNombre();?></td>
                                   <td> <?php echo $client->getTelefono();?></td>
                                   <td>
                                        <form action="<?php echo FRONT_ROOT ?>Client/Delete">                                             
                                             <div class="row">
                                                  <div class="col-lg-2">
                                                       <div class="form-group">
                                                            <input name="id_client" value="<?php echo $client->getIdCliente();?>" hidden>
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

<?php
    // echo "<br><br> el root es list -->". ROOT . "<br><br>";

?>