$('document').ready(function()
{ 

/* Login form validation and user login*/
    $("#login_form").validate({
        rules:
           {
            user_name: 
            {
                required: true,
                minlength: 3,
                maxlength: 25
            },
            user_password: 
            {
                required: true,
                minlength: 5,
                maxlength: 25
           },
           },
            messages:
            {
                user_name: {
                    required: "please enter your username",
                    minlength: "Username at least have 3 characters",
                    maxlength: "Username must be less than 25 characters"
                },
				user_password:{
                    required: "please enter your password",
                    minlength: "password at least have 5 characters",
                    maxlength: "password must be less than 25 characters"
                },
            },
          submitHandler: submitFormLogin 
        });  

        function submitFormLogin()
        {  
           var data = $("#login_form").serialize();

           $.ajax
           ({
           type : 'POST',
           url  : 'actions/dologin.php',
           data : data,
           beforeSend: function()
           { 
                $("#error_login").fadeOut();
                $("#login_submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
           },
           success :  function(response)
            {      
                if(response=="ok")
                {
                      $("#login_submit").html('<img src="images/btn-ajax-loader.gif" /> &nbsp; Signing In ...');
                      setTimeout(' window.location.href = "index.php"; ', 2000);
                }
				else
                {
                    $("#error_login").fadeIn(1000, function(){      
                    $("#error_login").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>  '+response+' !!!</div>');
                    $("#login_submit").html('<i class="icon-unlock2"></i> Login');
                    });
                }
            }
           });
            return false;
          }
});
