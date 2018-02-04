$('document').ready(function()
{ 
	 $("#createContragent").validate({
      rules:
	  {
        'contragentPage': {
            required: false,
			number: true,
			maxlength: 10
        },
		'contragentName': {
            required: true,
			maxlength: 20
        },
        'contragentSurname': {
            required: true,
            maxlength: 20
        },
        contragentPhone: {
            required: false,
            maxlength: 20
        },
		contragentEmail: {
            required: false,
            email: true
        },
		contragentNote: {
            required: false
        },
      },

	   submitHandler: submitContragent         
    });  

	   function submitContragent()
	   {		
           var data = $("#createContragent").serialize();
           
           $.ajax({

            type : 'POST',
            url  : 'actions/action.php',
            data : data,
            beforeSend: function()
            {	
                $("#error-contragent").fadeOut();
                $("#newContragentCreate").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(response)
            {						

                if(response=="registered")
                {
                    $("#newContragentCreate").html('<span class="icon-check2"></span> &nbsp; Creating ...');
                    setTimeout(' window.location.href = "index.php"; ', 2000);
                }
                else
                {
                    $("#error-consultant").fadeIn(1000, function()
                    {
                        $("#error-contragent").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !!!!!</div>');
                        $("#newContragentCreate").html('<span class="icon-check2"></span> Create Consultant');
                    });
                }
           }
           });
            return false;
       }
});