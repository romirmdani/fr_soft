 <?php
    $query=mysql_query("select * from dt_grp WHERE PARENT_ID ='0' ")or die(mysql_error());
    while ($data = mysql_fetch_array($query)){

         $cek_grp=mysql_query("select ID_GRP from dt_grp WHERE PARENT_ID ='$data[ID_GRP]'")or die(mysql_error());
          $cek_ada_grp=mysql_num_rows($cek_grp);
        if ($cek_ada_grp > 0) {
        ?>
         <a href="#<?php echo $data['NAMA_GRP'];?>"  id='<?php echo $data['ID_GRP']; ?>' data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start" style="background: #eee">
        <div class="d-flex w-100 justify-content-start align-items-center">
          <span class="menu-collapsed" disabled><?php echo $data['NAMA_GRP'];?></span>
          <span class="submenu-icon ml-auto"></span>
        </div>    
      </a>
        <?php
        } else {
        ?>
  <a href="#<?php echo $data['NAMA_GRP'];?>"  id='<?php echo $data['ID_GRP']; ?>' data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start data_grp" style="background: #eee">
        <div class="d-flex w-100 justify-content-start align-items-center">

          <span class="menu-collapsed" disabled><?php echo $data['NAMA_GRP'];?></span>
          <span class="submenu-icon ml-auto"></span>
        </div>    
      </a>
        <?php
        }
      ?>




    

        <!--  <div id='<?php echo $data['NAMA_GRP'];?>' class="collapse sidebar-submenu">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Charts</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Reports</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Tables</span>
                </a>
              </div> -->

              <?php
              $aktifitas=mysql_query("select * from dt_grp  WHERE PARENT_ID ='$data[ID_GRP]'")or die(mysql_error());
              $cek_ada=mysql_num_rows($aktifitas);

              while ($query2=mysql_fetch_array($aktifitas)){

                ?>
                <!-- <div id='<?php echo $data['NAMA_GRP'];?>' class="collapse sidebar-submenu"> -->
                  <a href="#" class="list-group-item data_grp" id='<?php echo $query2['ID_GRP']; ?>' list-group-item-action bg-dark text-white>
                              <span class="fa fa-dashboard fa-fw mr-3"></span>
                    <span class="menu-collapsed"><?php echo $query2['NAMA_GRP'];?></span>
                  </a>
                  <!--             </div> -->
                  <?php
                }
                ?>


                <?php

              }
              ?>   

              <!--  <a href="#" class="list-group-item data_grp" id='<?php echo $data['ID_GRP']; ?>'><?php echo $data['NAMA_GRP'];?></a> -->