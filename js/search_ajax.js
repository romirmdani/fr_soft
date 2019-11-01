    $(document).ready(function(){ 
     $("#btn-search").click(function(){ 
     $(this).html("SEARCHING...").attr("disabled", "disabled");  
     $.ajax({    
       url: 'index.php?p=anggota', 
       type: 'POST',   
       data: {keyword: $("#keyword").val()}, 
       dataType: "json",      beforeSend: function(e) {
       if(e && e.overrideMimeType) {
       e.overrideMimeType("application/json;charset=UTF-8");        
       }     
     },      
     success: function(response){     
     	$("#btn-search").html("SEARCH").removeAttr("disabled");
     	$("#view").html(response.hasil);      },      
     	error: function (xhr, ajaxOptions, thrownError) { 
     	alert(xhr.responseText); 
     }    });  });});