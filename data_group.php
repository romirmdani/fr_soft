<!--  <script type="text/javascript" src="js/bootstrap.js"></script> -->
<!--   <script type="text/javascript" src="js/jquery.js"></script> -->
<?php

function get_menu($data, $parent = 0) {
        static $i = 1;
        $tab = str_repeat(" ", $i);
        if (@$data[$parent]) {
          $html = "$tab<ul id='menu-tree' class='filetree'>";
          $i++;
          foreach ($data[$parent] as $v) {
             $child = get_menu($data, $v->ID_GRP);
             $html .= "$tab<li>";
             // $html .= '<a  class="open_modal" href="page.php?parent_id='.$v->ID_GRP.'">'.$v->NAMA_GRP.'</a>';
              $html .= '<a href="#" class="data_grp" id="'.$v->ID_GRP.'">'.$v->NAMA_GRP.'</a>';
             if ($child) {
               $i--;
               $html .= $child;
               $html .= "$tab";
             }
             $html .= '</li>';
          }
          $html .= "$tab</ul>";
          return $html;
        } 
        else {
          return false;
        }
      }

$sql=mysql_query("select * from dt_grp")or die(mysql_error());

while ($row = mysql_fetch_object($sql)) {
         $data[$row->PARENT_ID][] = $row;
      }
      $menu = get_menu($data);
      echo "$menu"; 
?>
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  data-keyboard="true" data-backdrop="true">
<!--  <script type="text/javascript">
   $(document).ready(function (){
                $(".open_modal").click(function (e){
                    var m = $(this).attr("id");
                    $.ajax({
                        url: "page.php",
                        type: "GET",
                        data : {parent_id: m,},
                        success: function (ajaxData){
                            $("#ModalEdit").html(ajaxData);
                            console.log ($("#ModalEdit").val(ajaxData));
                            $("#ModalEdit").modal('show',{backdrop: 'true'});
                        }
                    });
                });
            });
</script> -->


<!--          <script type="text/javascript">
    $(document).ready(function (){
         $(".open_modal_cst").click(function (){
            var m = $(this).attr("id");
            $.ajax({
                url: "page.php",
                type: "GET",
                data : {parent_id: m,},
                success: function (ajaxData){
                    $("#ModalEdit").html(ajaxData);
                    $("#ModalEdit").modal('show',{backdrop: 'true'});
                }
            });
        });
    });
</script> -->