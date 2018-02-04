$('document').ready(function()
{ 
    $(".outcomeButton").on("click",function(){
        var id = $(this).data('id');
        $("#outcomeForm").find(".contragentId").val(id);
    });

	
    $('#outcomeForm').on("submit", function(event){  
       event.preventDefault();  

       $.ajax({  
        url:"actions/action.php",  
        method:"POST",  
        data:$('#outcomeForm').serialize(),  
        beforeSend:function(){  
         $('#outcomeInsert').val("Inserting");  
        },  
     
        success: function(response) {
            if(response=="inserted") {
                 $('#outcomeForm')[0].reset();  
                 $('#outcomeModal').modal('hide');
                 setTimeout('window.location.reload(true)', 5000);
                 $("#messageBox").html('<div class="alert alert-success"><span class="glyphicon glyphicon-info-sign"></span> Contract is Paid!</div>');
            } else {
                $('#outcomeForm')[0].reset();  
                 $('#outcomeModal').modal('hide');
                 setTimeout('window.location.reload(true)', 5000);
                 $("#messageBox").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !!!!!</div>');
            }
        }  
       });  

     });
	
	$(".incomeButton").on("click",function(){
        var id = $(this).data('id');
        $("#incomeForm").find(".inContragentId").val(id);
    });

	
    $('#incomeForm').on("submit", function(event){  
       event.preventDefault();  

       $.ajax({  
        url:"actions/action.php",  
        method:"POST",  
        data:$('#incomeForm').serialize(),  
        beforeSend:function(){  
         $('#incomeInsert').val("Inserting");  
        },  
     
        success: function(response) {
            if(response=="inserted") {
                 $('#incomeForm')[0].reset();  
                 $('#incomeModal').modal('hide');
                 setTimeout('window.location.reload(true)', 5000);
                 $("#messageBox").html('<div class="alert alert-success"><span class="glyphicon glyphicon-info-sign"></span> Payment Details Successfully Inserted!</div>');
            } else {
                $('#incomeForm')[0].reset();  
                $('#incomeModal').modal('hide');
                setTimeout('window.location.reload(true)', 5000);
                $("#messageBox").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !!!!!</div>');
            }
        }  
       });  

     });
});

