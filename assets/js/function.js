$(function(){

	//--------------- Url

		var url = "http://contactbook.ga";

	//--------------- Mascara

    	$('.phone').mask('(99) 99999-9999');

	//--------------- Phone

		$('#more--phone').click(function(){
			$('.phones').append('<div class="row"> <div class="col-lg-12"> <input type="text" name="phone[]" class="phone input__pattern"> </div> </div> ');
	    	$('.phone').mask('(99) 99999-9999');
		});

		$('#less--phone').click(function(){
			$('#phones .row:last-child').remove();
		});

	//--------------- Menu

		$('.hamburguer-bt').click(function(){
		 	if( $(this).hasClass('active')  ){

		 		$(this).removeClass('active');
		 		$('#menuNav').slideUp();

		 	}else{

		 		$(this).addClass('active');
		 		$('#menuNav').slideDown();

		 	}
		});

	//--------------- Form
		//--------------- Login

			$('#login').validate({
		      	rules: {
		      		email: 		{ required: true, email: true },
		      		password: 	{ required: true }
		      	},messages: {
		      		email: 		{ required: 'Enter a valid email.', email: 'Enter a valid email.' },
		      		password: 	{ required: 'Enter a password.' }
		      	},submitHandler: function(form) {

					$('#login').css({"display":"none"});
					$('#loading').fadeIn();

			        $.ajax({
						type: 'POST',
						async: true,
						url: url + "/assets/php/login.php",
						data: new FormData($('#login')[0]),
			          	processData: false,
			          	contentType: false,
			          	success: function(answer) {

			          		if(answer == "true"){
								setTimeout(function() {
									window.location.href = url + "/in/";
								}, 700);
			          		}else{
					        	$('#loading').css({'display':'none'});
				                $('.error').fadeIn();
				                $('#description').html(answer);
				            }
			          	}
			        });
					
		        	return false;
		      	}
		    });

		    $("#try--login").click(function(){
		    	window.location.href = url + "/in/";
		    });

		    $(".sign_up").click(function(){
				$('#login').css({"display":"none"});
				$('#loading').fadeIn();
				setTimeout(function() {
					$('#loading').css({"display":"none"});
					$('#sign_up').fadeIn();
				}, 800);
		    });

		//--------------- Sign up

			$('#sign_up').validate({
		      	rules: {
		      		name_sign_up: 		{ required: true },
		      		email_sign_up: 		{ required: true, email: true },
		      		password_sign_up: 	{ required: true, minlength: 6 }
		      	},messages: {
		      		name_sign_up: 		{ required: 'Fill in your name.' },
		      		email_sign_up: 		{ required: 'Fill in your email.', email: 'Fill in valid email.' },
		      		password_sign_up: 	{ required: 'Enter a password.', minlength: 'Minimum of 6 characters.' }
		      	},submitHandler: function(form) {

					$('#sign_up').css({"display":"none"});
					$('#loading').fadeIn();

			        $.ajax({
						type: 'POST',
						async: true,
						url: url + "/assets/php/signupuser.php",
						data: new FormData($('#sign_up')[0]),
			          	processData: false,
			          	contentType: false,
			          	success: function(answer) {

			          		if(answer == "true"){
					        	$('#loading').css({'display':'none'});
				                $('#thank').fadeIn();
								setTimeout(function() {
									window.location.href = url + "/in/";
								}, 700);
			          		}else{
					        	$('#loading').css({'display':'none'});
				                $('.error').fadeIn();
				                $('#description').html(answer);
				            }
			          	}
			        });
					
		        	return false;
		      	}
		    });





		    $(".to_back").click(function(){
				$('#sign_up').css({"display":"none"});
				$('#loading').fadeIn();
				setTimeout(function() {
					$('#loading').css({"display":"none"});
					$('#login').fadeIn();
				}, 800);
		    });

		//--------------- Register Contact

			$('#creat__contact').validate({
		      	rules: {
		      		name__contact: 		{ required: true, minlength:2 },
		      		email__contact: 	{ required: true, email: true },
		      		phone__contact:		{ required: true, minlength:14 },
		      		address__contact:	{ required: true }
		      	},messages: {
		      		name__contact: 		{ required: 'Enter a valid name.', minlength: 'Minimum of two characters.' },
		      		email__contact: 	{ required: 'Enter a valid email.', email: 'Enter a valid email.' },
		      		phone__contact:		{ required: 'Fill in at least one phone.', minlength: 'Minimum of ten digits.' },
		      		address__contact:	{ required: 'Enter a address.' }
		      	},submitHandler: function(form) {

		      		if ( $('#address__contact').val() == "" ) {
						$('.address_field').append('<label id="address-error" class="error" for="address__contact">Fill in the address field.</label>');
		      		}else{
		      			$('#address-error').remove();
		      			
						$('#creat__contact').css({"display":"none"});
						$('#loading').fadeIn();

				        $.ajax({
							type: 'POST',
							async: true,
							url: url + "/assets/php/registercontact.php",
							data: new FormData($('#creat__contact')[0]),
				          	processData: false,
				          	contentType: false,
				          	success: function(answer) {

				          		if(answer == "true"){
						        	$('#loading').css({'display':'none'});
					                $('#thank').fadeIn();
									setTimeout(function() {
										window.location.href = url ;
									}, 2000);
				          		}else{
						        	$('#loading').css({'display':'none'});
					                $('.error').fadeIn();
					                $('#description').html(answer);
					            }
				          	}
				        });
		      		}

					
		        	return false;
		      	}
		    });

		    $("#try--creat__contact").click(function(){
		    	$('.error').css({'display':'none'})
				$('#creat__contact').fadeIn();
		    });

		//--------------- Edit Contact

			$('#edit__contact').validate({
		      	rules: {
		      		name__contact: 		{ required: true, minlength:2 },
		      		email__contact: 	{ required: true, email: true },
		      		phone__contact:		{ required: true, minlength:14 },
		      		address__contact:	{ required: true }
		      	},messages: {
		      		name__contact: 		{ required: 'Enter a valid name.', minlength: 'Minimum of two characters.' },
		      		email__contact: 	{ required: 'Enter a valid email.', email: 'Enter a valid email.' },
		      		phone__contact:		{ required: 'Fill in at least one phone.', minlength: 'Minimum of ten digits.' },
		      		address__contact:	{ required: 'Enter a address.' }
		      	},submitHandler: function(form) {

		      		if ( $('#address__contact').val() == "" ) {
						$('.address_field').append('<label id="address-error" class="error" for="address__contact">Fill in the address field.</label>');
		      		}else{
		      			$('#address-error').remove();
		      			
						$('#edit__contact').css({"display":"none"});
						$('#loading').fadeIn();

				        $.ajax({
							type: 'POST',
							async: true,
							url: url + "/assets/php/editcontact.php",
							data: new FormData($('#edit__contact')[0]),
				          	processData: false,
				          	contentType: false,
				          	success: function(answer) {

				          		if(answer == "true"){
						        	$('#loading').css({'display':'none'});
					                $('#thank').fadeIn();
									setTimeout(function() {
										window.location.href = url ;
									}, 2000);
				          		}else{
						        	$('#loading').css({'display':'none'});
					                $('.error').fadeIn();
					                $('#description').html(answer);
					            }
				          	}
				        });
		      		}

					
		        	return false;
		      	}
		    });

		    $("#try--edit__contact").click(function(){
		    	$('.error').css({'display':'none'})
				$('#edit__contact').fadeIn();
		    });

		//--------------- Delet Contact

			$("#dark_background, #deleting .back, #view .back").click(function(){
				$("#dark_background").fadeOut();
				$("#block_in").fadeOut();
				$("#deleting").fadeOut();
				$("#view").fadeOut();
			});

			$(".delet").click(function(){
				var cod = $(this).data("cod");
				var name = $(this).data("name");

				$("#contact").val(cod);
				$("#deleting h1 span").html(name);

				$("#dark_background").fadeIn();
				$("#block_in").fadeIn();
				$("#deleting").fadeIn();
			});			

		    $("#try--deleting").click(function(){
		    	$('.error').css({'display':'none'})
				$('#deleting').fadeIn();
		    });

			$('#deleting').validate({
		      	rules: {
		      	},messages: {
		      	},submitHandler: function(form) {
		      			
					$('#deleting').css({"display":"none"});
					$('#loading').fadeIn();

			        $.ajax({
						type: 'POST',
						async: true,
						url: url + "/assets/php/deletcontact.php",
						data: new FormData($('#deleting')[0]),
			          	processData: false,
			          	contentType: false,
			          	success: function(answer) {

			          		if(answer == "true"){
					        	$('#loading').css({'display':'none'});
				                $('#thank').fadeIn();
								setTimeout(function() {
									window.location.href = url ;
								}, 2000);
			          		}else{
					        	$('#loading').css({'display':'none'});
				                $('.error').fadeIn();
				                $('#description').html(answer);
				            }
			          	}
			        });
					
		        	return false;
		      	}
		    });

		//--------------- View Contact

			$(".view").click(function(){
				var cod = $(this).data("cod");
				var name = $(this).data("name");
				var email = $(this).data("email");
				var address = $(this).data("address");

				$("#dark_background").fadeIn();
				$("#block_in").fadeIn();
				$('#loading').fadeIn();

		        $.ajax({
					type: 'POST',
					url: url + "/assets/php/viewcontact.php",
					data: { id : cod },
		          	success: function(answer) {

			        	$('#loading').css({'display':'none'});

			        	$("#view h1.name").html(name);
						$("#view span.email").html(email);
						$("#view span.address").html(address);
						$("#view .phones").html(answer);

						$("#view").fadeIn();
		          	}
		        });

			});	

});