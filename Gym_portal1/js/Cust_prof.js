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
	$("#cust_prof").validate({
		rules:{
			txtemail:{
				required:true,
				email:true
			},
			txtadd:{
				required:true,
				
			},
			txtunm:{
				required:true,
                                nowhitespace:true
			},
			txtheight:{
				required:true,
				number: true
                         },
                         txtweight:{
				required:true,
				number: true
                         },
			
			txtmobile:{
				required:true,
				minlength:10,
				maxlength:10,
				number: true
                         }
			
		},
		
		messages:
		{
			txtemail:{
				required:'Please enter email address',
				email:'please enter <em>valid</em> email address'
			},
			txtadd:{
				required:'Please enter address'
			},
			txtunm:{
				required:'Please enter username'
			},
			txtmobile:{
				required:'Please enter mobile number',
				minlength:'Mobile number must be 10 digits long',
				maxlength:'Mobile number must be 10 digits long',
				number:'Only digits allowed'
			}

		}
	});
});


