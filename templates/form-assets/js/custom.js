	 /*
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
	  */

//var data = $("#createForm").serialize();
/*
var fb = $( '.form-builder' ).formBuilder();

$( '.save-template' ).on( 'click', function(){

    $.ajax({
        url: 'actions/save-form.php', // Point this to the file you create to save data
        type: 'POST',
        data: {
            formStructure: JSON.stringify( fb.actions.getData('json') )
        },
        success: function( response ){

            // Got a response
            console.log( 'Response from the save action: ' + response );

        },
        error: function( jqXHR ){

            // Something went wrong
            console.log( 'Error saving the form (details below)' );
            console.log( jqXHR );

        }

    });

});


$(function() {
    $('.selectpicker').selectpicker({ });
});