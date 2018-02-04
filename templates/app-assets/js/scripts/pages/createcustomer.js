$('document').ready(function()
{ 
     /* Register form validation and user registration*/
	 $("#createConsultant").validate({
      rules:
	  {
        consultantNumber: {
            required: true,
			number: true,
			maxlength: 8
        },
        'selectSponsor': {
            required: true
        },
        'consultantName': {
            required: true,
			maxlength: 20
        },
        'consultantSurname': {
            required: true,
            maxlength: 20
        },
        'consultantPassport': {
            required: false,
            maxlength: 20
        },
        consultantIssue: {
            required: false,
			date: true
        },
        'consultantAuth': {
            required: false,
			number: true,
			maxlength: 5
        },
        consultantAddress: {
            required: false
        },
        consultantPhone: {
            required: false,
            maxlength: 20
        },
		consultantEmail: {
            required: false,
            email: true
        },
      },

	   submitHandler: submitConsultant         
    });  

	   function submitConsultant()
	   {		
           var data = $("#createConsultant").serialize();
           
           $.ajax({

            type : 'POST',
            url  : 'actions/action.php',
            data : data,
            beforeSend: function()
            {	
                $("#error-consultant").fadeOut();
                $("#newConsultantCreate").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(response)
            {						

                if(response=="registered")
                {
                    $("#newConsultantCreate").html('<img src="images/btn-ajax-loader.gif" /> &nbsp; Creating ...');
                    setTimeout(' window.location.href = "index.php"; ', 2000);
                }
                else
                {
                    $("#error-consultant").fadeIn(1000, function()
                    {
                        $("#error-consultant").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !!!!!</div>');
                        $("#newConsultantCreate").html('<span class="icon-check2"></span> Create Consultant');
                    });
                }
           }
           });
            return false;
       }
});

