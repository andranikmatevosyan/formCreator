$('document').ready(function()
{ 
     /* Register form validation and user registration*/
	 $("#incomeForm").validate({
      rules:
	  {
		inContragentId: {
            required: true,
			number: true
        },
		inType: {
            required: true,
			number: true
        },
        'inAmount': {
            required: true,
			number: true
        },
        'inPaymentDate': {
            required: true,
			date: true
        },
        'inNote': {
            required: false
        },
        'inProduct[]': {
            required: true
        },
        'inProductPrice[]': {
            required: true,
			number: true
        },
		'inProductQuontity[]': {
            required: true,
			number: true
        },
      },

	   submitHandler: submitIncome         
    });  

	   function submitIncome()
	   {		
           var data = $("#incomeForm").serialize();
           
           $.ajax({

            type : 'POST',
            url  : 'actions/action.php',
            data : data,
            beforeSend: function()
            {	
                $("#error-income").fadeOut();
                $("#incomeInsert").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Inserting ...');
            },
            success :  function(response)
            {						

                if(response=="inserted")
                {
                    $("#incomeInsert").html('<span class="icon-check2"></span> &nbsp; Inserting ...');
                    setTimeout(' window.location.href = "index.php"; ', 2000);
                }
                else
                {
                    $("#error-income").fadeIn(1000, function()
                    {
                        $("#error-income").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !!!!!</div>');
                        $("#incomeInsert").html('<span class="icon-check2"></span> Insert');
                    });
                }
           }
           });
            return false;
       }
});

$('document').ready(function()
{ 
     /* Register form validation and user registration*/
	 $("#outcomeForm").validate({
      rules:
	  {
		outContragentId: {
            required: true,
			number: true
        },
		outType: {
            required: true,
			number: true
        },
        'outAmount': {
            required: true,
			number: true
        },
        'outConsultantId': {
            required: false,
			number: true
        },
        'outYear': {
            required: true,
			number: true
        },
		'outCatalogue': {
            required: true,
			number: true
        },
		'outOrder': {
            required: true,
			number: true
        },
		'outDate': {
            required: true,
			date: true
        },
		'outNote': {
            required: false
        },
        'outProduct[]': {
            required: true
        },
        'outProductPrice[]': {
            required: true,
			number: true
        },
		'outProductQuontity[]': {
            required: true,
			number: true
        },
      },

	   submitHandler: submitOutcome         
    });  

	   function submitOutcome()
	   {		
           var data = $("#outcomeForm").serialize();
           
           $.ajax({

            type : 'POST',
            url  : 'actions/action.php',
            data : data,
            beforeSend: function()
            {	
                $("#error-outcome").fadeOut();
                $("#outcomeInsert").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Inserting ...');
            },
            success :  function(response)
            {						

                if(response=="inserted")
                {
                    $("#outcomeInsert").html('<span class="icon-check2"></span> &nbsp; Inserting ...');
                    setTimeout(' window.location.href = "index.php"; ', 2000);
                }
                else
                {
                    $("#error-outcome").fadeIn(1000, function()
                    {
                        $("#error-outcome").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !!!!!</div>');
                        $("#outcomeInsert").html('<span class="icon-check2"></span> Insert');
                    });
                }
           }
           });
            return false;
       }
});

$('document').ready(function()
{ 
     /* Register form validation and user registration*/
	 $("#outcomeoffForm").validate({
      rules:
	  {
		outoffDate: {
            required: true,
			date: true
        },
        'outoffProduct[]': {
            required: true
        },
		'outoffProductQuontity[]': {
            required: true,
			number: true
        },
      },

	   submitHandler: submitOutcomeOff         
    });  

	   function submitOutcomeOff()
	   {		
           var data = $("#outcomeoffForm").serialize();
           
           $.ajax({

            type : 'POST',
            url  : 'actions/action.php',
            data : data,
            beforeSend: function()
            {	
                $("#error-outcome-off").fadeOut();
                $("#outcomeoffInsert").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Inserting ...');
            },
            success :  function(response)
            {						

                if(response=="inserted")
                {
                    $("#outcomeoffInsert").html('<span class="icon-check2"></span> &nbsp; Inserting ...');
                    setTimeout(' window.location.href = "index.php"; ', 2000);
                }
                else
                {
                    $("#error-outcome-off").fadeIn(1000, function()
                    {
                        $("#error-outcome-off").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !!!!!</div>');
                        $("#outcomeoffInsert").html('<span class="icon-check2"></span> Insert');
                    });
                }
           }
           });
            return false;
       }
});

$('document').ready(function()
{ 
     /* Register form validation and user registration*/
	 $("#incomeoffForm").validate({
      rules:
	  {
		inoffDate: {
            required: true,
			date: true
        },
        'inoffProduct[]': {
            required: true
        },
		'inoffProductPrice[]': {
            required: true,
			number: true
        },
		'inoffProductQuontity[]': {
            required: true,
			number: true
        },
      },

	   submitHandler: submitIncomeOff         
    });  

	   function submitIncomeOff()
	   {		
           var data = $("#incomeoffForm").serialize();
           
           $.ajax({

            type : 'POST',
            url  : 'actions/action.php',
            data : data,
            beforeSend: function()
            {	
                $("#error-income-off").fadeOut();
                $("#incomeoffInsert").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Inserting ...');
            },
            success :  function(response)
            {						

                if(response=="inserted")
                {
                    $("#incomeoffInsert").html('<span class="icon-check2"></span> &nbsp; Inserting ...');
                    setTimeout(' window.location.href = "index.php"; ', 2000);
                }
                else
                {
                    $("#error-income-off").fadeIn(1000, function()
                    {
                        $("#error-income-off").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !!!!!</div>');
                        $("#incomeoffInsert").html('<span class="icon-check2"></span> Insert');
                    });
                }
           }
           });
            return false;
       }
});

function showForm(elem){
   if(elem.value == 1){
      document.getElementById('productBody').style.display = "none";
      document.getElementById('orderBody').style.display = "block";
	}
	else if(elem.value == 2){
      document.getElementById('productBody').style.display = "block";
	  document.getElementById('orderBody').style.display = "none";
	}
	else{
      document.getElementById('productBody').style.display = "none";
	  document.getElementById('orderBody').style.display = "block";
	}
}

function showOutForm(elem){
   if(elem.value == 1){
      document.getElementById('outProductBody').style.display = "none";
      document.getElementById('outOrderBody').style.display = "block";
	}
	else if(elem.value == 2){
      document.getElementById('outProductBody').style.display = "block";
	  document.getElementById('outOrderBody').style.display = "none";
	}
	else{
      document.getElementById('outProductBody').style.display = "none";
	  document.getElementById('outOrderBody').style.display = "block";
	}
}