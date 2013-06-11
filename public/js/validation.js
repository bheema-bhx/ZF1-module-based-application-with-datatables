// JavaScript Document

$(document).ready(function(){


	      

						   
	$("#Loginform").validate({ 
							  
		rules: {
			
			username: "required",
			password: "required"
			
		},
		
		messages: {
			
			username: "Enter your username",
			password: "Enter your password"
			
		}
						 
						
	}); 
	
	
	$("#Regform").validate({ 
							  
		rules: {
			
			firstname: "required",
			lastname: "required",
			username: "required",
			
			email: {
				required : true,
				email : true
			},
			password: {
						required: true,
						minlength: 5
					},
			password2: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			
			
		},
		
		messages: {
			
			firstname: "Please enter firstname",
			lastname: "Please enter lastname",
			username: "Please enter username",
			
			email: "Please enter email",
			
			password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
			password2: {
				required: "Please provide a conform password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			},
			

			
		}
						 
						
	}); 

});
