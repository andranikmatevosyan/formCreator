$('document').ready(function()
{ 
	 $("#editContragentForm").validate({
      rules:
	  {
        'contragentPageEdit': {
            required: false,
			number: true,
			maxlength: 10
        },
		'contragentNameEdit': {
            required: true,
			maxlength: 20
        },
        'contragentSurnameEdit': {
            required: true,
            maxlength: 20
        },
        'contragentPhoneEdit': {
            required: false,
            maxlength: 20
        },
		'contragentEmailEdit': {
            required: false,
            email: true
        },
		'contragentNoteEdit': {
            required: false
        },
      },

	   submitHandler: editContragent         
    });  

	   function editContragent()
	   {		
           var data = $("#editContragentForm").serialize();
           
           $.ajax({

            type : 'POST',
            url  : 'actions/action.php',
            data : data,
            beforeSend: function()
            {	
                $("#error-contragent-edit").fadeOut();
                $("#editContragentButton").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(response)
            {						

                if(response=="updated")
                {
                    $("#editContragentButton").html('<span class="icon-check2"></span> &nbsp; Updating ...');
                    setTimeout(' window.location.href = "index.php"; ', 2000);
                }
                else
                {
                    $("#error-contragent-edit").fadeIn(1000, function()
                    {
                        $("#error-contragent-edit").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !!!!!</div>');
                        $("#editContragentButton").html('<span class="icon-check2"></span> Update Contragent Details');
                    });
                }
           }
           });
            return false;
       }
});