<?php
include '../koneksi.php';
$id = $_GET['ID_GRP'];
$tampil1 = mysql_query("select * from dt_grp where ID_GRP='$id'");
$data1 = mysql_fetch_array($tampil1);
?>

<?php
$cekdata_grp="select * from dt_grp where PARENT_ID='$data1[ID_GRP]'";
$ada_parent=mysql_query($cekdata_grp) or die(mysql_error());
$cek_grp=mysql_num_rows($ada_parent);
$parent_grp=mysql_fetch_array($ada_parent);


$cekdata_brg="select ID_GRP from dt_brg where ID_GRP='$id'";
$ada_barang=mysql_query($cekdata_brg) or die(mysql_error());
$cek_brg=mysql_num_rows($ada_barang);

// echo "id : $id<br>";
// echo "ada group : $cek_grp<br>";
// echo "ada barang : $cek_brg";
?>

<!-- <form method="post" action="index_user.php?p=proses_insert_aktifitas" enctype="multipart/form-data" > -->
  <form method="post" action="">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header" style="background:#c1e2b3;">
          <button type="button" class="close"  data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center;">Detail Group</h4>
        </div>
        <!-- body modal -->
        <div class="modal-body">

         <table class="table table-bordered"  style="font-size: 15px;">   
          <tr>
            <td>Nama Group</td>
            <td>:</td>
            <td><?php echo $data1['NAMA_GRP'];?></td>
          </tr>
          <tr>
            <td>Sub Group Dari</td>
            <td>:</td>
             <td>
            <?php echo "$parent_grp[NAMA_GRP]"; ?>
          </td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td><?php echo $data1['KET_GRP'];?></td>
          </tr>
        </table>
        <br>

      </div>
      <!-- footer modal -->
      <div class="modal-footer" style="background: #eee">
        <!-- <input type="submit" class="btn btn-success btn-md" value="Edit" name="tambah"> -->
        <input type="hidden" name="id" id="ID_GRP" value="<?php echo $data1['ID_GRP']; ?>">
        <input type="hidden" name="ada_parent" id="ada_parent" value="<?php echo $cek_grp; ?>">
        <input type="hidden" name="ada_barang" id="ada_barang" value="<?php echo $cek_brg; ?>">
        <a href="#" class='btn btn-primary open_modal_edit_grp btn-load' id='<?php echo $data1['ID_GRP']; ?>' title="Edit">Edit</a>

        <input type="button" value="Hapus" id='<?php echo $data1['ID_GRP']; ?>' class="btn btn-danger btn-md hapus_grp btn-load">
        
        
      </div>
    </div>
  </div>
</form>


<script type="text/javascript">
  $(document).ready(function (){
    $(".open_modal_edit_grp").click(function (e){
      var m = $(this).attr("id");
      $.ajax({
        url: "pages/edit_group.php",
        type: "GET",
        data : {ID_GRP: m,},
        success: function (ajaxData){
          $("#ModalEdit").html(ajaxData);
          $("#ModalEdit").modal('show',{backdrop: 'true'});
        }
      });
    });
  });
</script>


<script>
  $('.btn-load').on('click', function() {
    var $this = $(this);
    $this.button('loading');
    setTimeout(function() {
     $this.button('reset');
   }, 2000);
  });
</script>

<script type="text/javascript">
 $(document).ready(function (){
  $(".hapus_grp").click(function (e){


   var jawab = confirm("Yakin ingin menghapus ?");
   if (jawab === true) {
//            kita set hapus false untuk mencegah duplicate request
var hapus = false;
if (!hapus) {
 hapus = true;



 var ada_prnt = document.getElementById("ada_parent").value;
 var ada_brg = document.getElementById("ada_barang").value;
 if(ada_prnt > 0){
      // alert("Nama Customer Harus Di isi detail");
      swal({
        title :'Harus dari Group Terakhir',
        text : '',
        type: 'error'
      })
      return false;

    } else if (ada_brg > 0){
     swal({
      title :'Group Sudah ada Data Barang',
      text : '',
      type: 'error'
    })
     return false;
   } else {
     var ID_GRP = $('#ID_GRP').val();
     $.ajax({
      url: "pages/hapus_grp.php",
      type: "GET",
      data: 'ID_GRP='+ID_GRP,
      success: function() {
        // $('.tampildata').load("pages/form_data_barang.php");
        alert("Customer Berhasil di Hapus");
        window.location = "http://localhost/fr_soft/index.php?p=data_barang";
      }
    });
   }
 } else {
  return false;
}
}
});
});
</script>






