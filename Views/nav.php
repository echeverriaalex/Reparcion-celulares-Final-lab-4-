<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <span class="navbar-text">
          <strong> <?php echo COMERCE_NAME; ?></strong>
          <?php
               if(isset($_SESSION['technical']))
          ?>
                    <h2 class="mb-4"> <?php echo "Hola ".$_SESSION['technical']->getUserName(); ?> </h2>
        
     </span>
     <ul class="navbar-nav ml-auto">
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Client/ShowAddView">Registrar <br> cliente</a>
          </li> 
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Client/ShowListView">Listar <br> clientes</a>
          </li> 
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Repair/ShowAddView">Agregar <br> Ordenes</a>
          </li>  
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Repair/ShowListOrderView">Listar mis <br> ordenes</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Repair/ShowListAllOrderView">Listar todas <br> las ordenes</a>
          </li> 
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Repair/ShowListAllOrderViewArray">Listar todas las <br> ordenes Array</a>
          </li> 
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Repair/ShowListAllOrderViewArrayComplete">Listar todas las ordenes <br> con Array completo</a>
          </li> 
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Technical/Logout">Cerrar Sesión</a>
          </li>        
     </ul>
</nav>