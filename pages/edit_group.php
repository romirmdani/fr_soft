<?php
include '../koneksi.php';
$id = $_GET['ID_GRP'];
$tampil1 = mysql_query("select * from dt_grp where ID_GRP='$id'");
$data1 = mysql_fetch_array($tampil1);
 ?>
<div id="tampildata">
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  data-keyboard="true" data-backdrop="true">
         </div>
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				   <div class="modal-header" style="background:#ffec87;">
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
         			 <h4 class="modal-title" style="text-align: center;">Edit Group</h4>
       				 </div>
				<!-- body modal -->
				<!-- 	<form method="post" action="index_user.php?p=proses_update_customer" enctype="multipart/form-data"> -->
            <form method="post" id="edit_grp" class="form-edit-grp">
	<div class="modal-body">		
     <table class="table" style="font-size: 15px;">  	
    <tr>
    <td>Nama Group</td>
    <td>:</td>
    <td><input type="text" class="form-control" value="<?php echo $data1['NAMA_GRP'];?>" name="edit_nama_grp" id="edit_nama_grp"required="required" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()"></td>
    </tr>
    <tr>
    <td>Keterangan</td>
    <td>:</td>
     <td><input type="text" class="form-control" name="edit_ket_grp" value="<?php echo $data1['KET_GRP'];?>"></td>
    </tr>
</table>
</div>	<!-- footer modal -->
	<div class="modal-footer"  style="background: #eee;">
	<input type="hidden" name="edit_id_grp" id="edit_id_grp" value="<?php echo $data1['ID_GRP'];?>">

   <input type="button" value="Update" id='<?php echo $data1['ID_GRP']; ?>' onclick="UpdateGrp()" class="btn btn-success btn-md open_modal_edit_grp btn-load" name="update">

  


	</form>
	</div>
	</div>

</div>
</div>
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

function UpdateGrp(){

  var edit_nm_grp = document.getElementById("edit_nama_grp").value;
      
      if(edit_nm_grp == ''){
      // alert("Nama Customer Harus Di isi detail");
       swal({
          title :'Nama Group Harus di isi',
        text : '',
          type: 'info'
        })

      return false;
      } else {

             var data = $('.form-edit-grp').serialize();
              var ID_GRP = $('#edit_id_grp').val();
            $.ajax({
                url: "pages/proses_update_grp.php",
                type: "POST",
                data : data,
                success: function (hasil){
                    if (hasil > 0 ) {
                      alert('gagal');
                      return false ;
                    } else {

                      // alert('yes');

            //         $('.tampildata').load("pages/tampil_tabel_customer.php");
                    $("#pesan").html(
                       swal({
                        title :'Group Berhasil di Update',
                        text : '',
                        type: 'success'
                        })

                    );
                   $.ajax({
                url: "pages/detail_group.php",
                type: "GET",
                // data : {ID_CST: m,},
                 data: 'ID_GRP='+ID_GRP,
                success: function (ajaxData){
                    $("#ModalEdit").html(ajaxData);
                    $("#ModalEdit").modal('show',{backdrop: 'true'});
                }
            });
                          }
                }
            });

  }

}


</script>


<!--Yang bener 

<script type="text/javascript">
    $(document).ready(function (){
        $('body').on('click','.open_modal_cst_2',function(){
             var data = $('.form-customer').serialize();
            $.ajax({
                url: "pages/proses_update_customer.php",
                type: "POST",
                data : data,
                success: function (ajaxData){
                    $('.tampildata').load("pages/tampil_tabel_customer.php");
                    $("#pesan").html(
                       swal({
                        title :'Customer Berhasil di Update',
                        text : '',
                        type: 'success'
                        })

                    );
                }
            });
        });
    });

//script untuk kembali ke detail customer
    $(document).ready(function (){
        $('body').on('click','.open_modal_cst_2',function(){
            var m = $(this).attr("id");
            $.ajax({
                url: "pages/detail_customer.php",
                type: "GET",
                data : {ID_CST: m,},
                success: function (ajaxData){
                    $("#ModalEdit").html(ajaxData);
                    $("#ModalEdit").modal('show',{backdrop: 'true'});
                }
            });
        });
    });

</script> -->


<!-- <script type="text/javascript">
  function saveForm(){
    if(document.getElementById('nama_customer').value == ''){
      alert('First Name tidak boleh kosong');
      document.getElementById('nama_customer').focus();
      return false;
  }
   document.getElementById('form1').submit();
}

</script> -->





