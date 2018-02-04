$('document').ready(function()
{ 
	 $("#createProduct").validate({
      rules:
	  {
        'productCode': {
            required: true,
			number: true
        },
		'productName': {
            required: true,
			maxlength: 40
        },
      },

	   submitHandler: submitProduct         
    });  

	   function submitProduct()
	   {		
           var data = $("#createProduct").serialize();
           
           $.ajax({

            type : 'POST',
            url  : 'actions/action.php',
            data : data,
            beforeSend: function()
            {	
                $("#error-product").fadeOut();
                $("#newContragentCreate").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(response)
            {						

                if(response=="registered")
                {
                    $("#createProductButton").html('<span class="icon-check2"></span> &nbsp; Creating ...');
                    setTimeout(' window.location.href = "index.php"; ', 2000);
                }
                else
                {
                    $("#error-product").fadeIn(1000, function()
                    {
                        $("#error-product").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !!!!!</div>');
                        $("#createProductButton").html('<span class="icon-check2"></span> Create Consultant');
                    });
                }
           }
           });
            return false;
       } 
	
	$("#editProduct").validate({
      rules:
	  {
        'editProductId': {
            required: true,
			number: true
        },
		'editProductCode': {
            required: true,
			number: true
        },
		'editProductName': {
            required: true,
			maxlength: 40
        },
      },

	   submitHandler: submitProduct         
    });  

	   function submitProduct()
	   {		
           var data = $("#editProduct").serialize();
           
           $.ajax({

            type : 'POST',
            url  : 'actions/action.php',
            data : data,
            beforeSend: function()
            {	
                $("#error-product-edit").fadeOut();
                $("#newContragentCreate").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Updating ...');
            },
            success :  function(response)
            {						

                if(response=="updated")
                {
                    $("#editProductButton").html('<span class="icon-check2"></span> &nbsp; Updating ...');
                    setTimeout(' window.location.href = "products.php"; ', 2000);
                }
                else
                {
                    $("#error-product-edit").fadeIn(1000, function()
                    {
                        $("#error-product-edit").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !!!!!</div>');
                        $("#editProductButton").html('<span class="icon-check2"></span> Update');
                    });
                }
           }
           });
            return false;
       }
});