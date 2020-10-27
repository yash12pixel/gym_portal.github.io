$(function(){
	
	$.validator.setDefaults({
		errorClass:'help-block',
		highlight:function(element){
			$(element)
				.closest('.form-group')
				.addClass('has-error');
		},
		unhighlight:function(element){
			$(element)
				.closest('.form-group')
				.removeClass('has-error');
		},
		errorPlacement:function(error,element){
			if(element.prop('type')=='radio'){
				error.insertAfter(element.parent());
			}else{
				error.insertAfter(element);
			}
		}
		
	});
	
$.validator.addMethod('StrongPassword',function(value,element){
	return value.lenght>=6;
	},'Your password must be 6 characters long')
	

	
	$("#cust-register").validate({
		rules:{
			txtemail:{
				required:true,
				email:true
			},
			txtfname:{
				required:true,
				nowhitespace:true,
				lettersonly:true
			},
			txtlname:{
				required:true,
				nowhitespace:true,
				lettersonly:true
			},
			txtunm:{
				required:true,
                                nowhitespace:true
			},
			gen:{
				required:true
			},
			address:{
				required:true
			},
			txtmobile:{
				required:true,
				minlength:10,
				maxlength:10,
				number: true
			},
			txtpassword:{
				required:true,
				minlength:6,		
				
			},
			txtcpass:{
				required:true,
				equalTo:"#password"
			}
			
		},
		
		messages:
		{
			txtemail:{
				required:'Please enter email address',
				email:'please enter <em>valid</em> email address'
			},
			txtfname:{
				required:'Please enter first name'
			},
			txtlname:{
				required:'Please enter last name'
			},
			txtunm:{
				required:'Please enter username'
			},
			gen:{
				required:'Please select gender'
			},
			address:{
				required:'Please enter your address'
			},
			txtmobile:{
				required:'Please enter mobile number',
				minlength:'Mobile number must be 10 digits long',
				maxlength:'Mobile number must be 10 digits long',
				number:'Only digits allowed'
			},
			txtpassword:{
				required:'Please enter password'				
				
			},
			txtcpass:{
				required:'Please confirm your password',
				equalTo:'Password did not match'
			}
		}
	});
});