$(document).ready(function(){

/* customers.php javascript */
    
    $(document).on('click', '.view_data', function(){
      var tid = $(this).attr("id");
      $.ajax({
       url:"productInfo.php",
       method:"POST",
       data:{tid:tid},
       success:function(data){
        $('#product_detail').html(data);
        $('#productModal').modal('show');
       }
      });
     }); 
});