<?php 
include "koneksi.php";
$id = $_GET['parent_id'];

$sql=mysql_query("select ID_GRP from dt_grp WHERE PARENT_ID=".$id)or die(mysql_error());
  $cek_ada_grp=mysql_num_rows($sql);

	if($cek_ada_grp > 0) {
		// echo "<script> swal({
  //       title :'Gagal',
  //       text : 'Nama Customer Sudah digunakan di aktifitas',
  //       type: 'info'
  //     })
  //     </script>";
		// // echo "<script>window.location ='index_user.php?p=data_barang';</script>";

		echo "<script>alert('test');history.go(0)</script>";
	} else {
		// echo "tidak ada sub group";
		?>

		<form method="post" action="">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header" style="background:#c1e2b3;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center;">Detail Customer</h4>
        </div>
        <!-- body modal -->
        <div class="modal-body">

         <table class="table table-bordered">   
          <tr>
            <td>Nama Customer</td>
            <td>:</td>
            <td><?php echo $data1['NAMA_CST'];?></td>
          </tr>
          <tr>
            <td>Lokasi</td>
            <td>:</td>
            <td><?php echo $data1['LOKASI'];?></td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td><?php echo $data1['KET_CST'];?></td>
          </tr>
        </table>
        <br>

      </div>
      <!-- footer modal -->
      <div class="modal-footer" style="background: #eee">
        <!-- <input type="submit" class="btn btn-success btn-md" value="Edit" name="tambah"> -->
        <input type="hidden" name="id" id="ID_CST" value="<?php echo $data1['ID_CST']; ?>">
        <input type="hidden" name="ada_akts" id="ada_akts" value="<?php echo $aktifitas; ?>">
        <input type="hidden" name="ada_install" id="ada_install" value="<?php echo $install; ?>">
        <a href="#" class='btn btn-primary open_modal_edit_cst btn-load' id='<?php echo $data1['ID_CST']; ?>' title="Edit">Edit</a>
        <!-- <a href="index_user.php?p=hapus_customer&ID_CST=<?php echo $data1['ID_CST']; ?>" class="btn btn-danger btn-md btn-load" title="Hapus" onclick="return confirm('Yakin mau di hapus?');">Hapus</a> -->

        <input type="button" value="Hapus" id='<?php echo $data1['ID_CST']; ?>' class="btn btn-danger btn-md hapus_customer btn-load">
        
        
      </div>
    </div>
  </div>
</form>

<?php
	}



?>