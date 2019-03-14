function validate_login(){
	//User
	if(document.signin.usernamel.value.length === 0){
		document.getElementById('e_usernamel').innerHTML = "Tienes que escribir el usuario";
		document.getElementById('usernamel').focus();
		return 0;
	}
	document.getElementById('e_usernamel').innerHTML = "";

	//Password
	if(document.signin.passwordl.value.length === 0){
		document.getElementById('e_passwordl').innerHTML = "Tienes que escribir la contraseña";
		document.getElementById('passwordl').focus();
		return 0;
	}
	document.getElementById('e_passwordl').innerHTML = "";

	//document.formlogin.click();//click
	//document.formlogin.action="index.php?page=controller_login&op=list_login";
}

function validate_register(){
	var mailp = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var user_pass = /^[a-zA-Z0-9]{4,10}$/;
    
	//User
	if(document.register.usernamer.value.length === 0){
		document.getElementById('e_usernamer').innerHTML = "Tienes que escribir el usuario";
		document.getElementById('usernamer').focus();
		return 0;
	}
	if(!user_pass.test(document.register.usernamer.value)){
		document.getElementById('e_usernamer').innerHTML = "El usuario no es valido";
		document.getElementById('usernamer').focus();
		return 0;
	}
	document.getElementById('e_usernamer').innerHTML = "";

	//Mail
	if(document.register.emailr.value.length === 0){
		document.getElementById('e_emailr').innerHTML = "Tienes que escribir el mail";
		document.getElementById('emailr').focus();
		return 0;
	}
	if(!mailp.test(document.register.emailr.value)){
		document.getElementById('e_emailr').innerHTML = "El formato del mail es invalido";
		document.getElementById('emailr').focus();
		return 0;
	}
	document.getElementById('e_emailr').innerHTML = "";

	//Password
	if(document.register.passwordr.value.length === 0){
		document.getElementById('e_passwordr').innerHTML = "Tienes que escribir la contraseña";
		document.getElementById('passwordr').focus();
		return 0;
	}
	if(!user_pass.test(document.register.passwordr.value)){
		document.getElementById('e_passwordr').innerHTML = "La contraseña no es valida";
		document.getElementById('passwordr').focus();
		return 0;
	}
	document.getElementById('e_passwordr').innerHTML = "";

	//document.register.click();
	//document.register.action="index.php?page=controller_login&op=list_register";
}

$(document).ready(function(){
	$("#signin").submit(function (e) {
		e.preventDefault();
		if(validate_login() != 0){	
			var data = $("#signin").serialize();
			// console.log(data);	
			$.ajax({
				type : 'POST',
				url  : 'module/login/controller/controller_login.php?&op=login&' + data,
				data : data,
				beforeSend: function(){	
                    $("#error_login").fadeOut();
				},
				success: function(response){
					// console.log(data);			
                    // console.log(response);	
					if(response=="ok"){
						setTimeout(' window.location.href = "index.php?page=controller_home&op=list"; ',1000);
						
					}else if(response=="error_user"){
						document.getElementById('e_log').innerHTML = "Usuario o contraseña incorrectos";
						document.getElementById('e_log').focus();
					}else{
						$("#error_login").fadeIn(1000, function(){						
							$("#error_login").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
						});
					}
				}
			});
		}
	});
	
	$("#register").submit(function (e) {
		e.preventDefault();
		if (validate_register() != 0) {
			var data = $("#register").serialize();
			$.ajax({
				type : 'POST',
				url  : 'module/login/controller/controller_login.php?&op=register&' + data,
				data : data,
				beforeSend: function(){	
					// console.log(data)
					$("#error_register").fadeOut();
				},
				success: function(response){						
					// console.log(response);	
					if(response==="ok"){
						setTimeout(' window.location.href = "index.php?page=controller_login&op=view"; ',1000);
					}else if (response=="okay") {
						// alert("Debes realizar login para completar tu compra");
						setTimeout(' window.location.href = window.location.href; ',1000);
					}else if(response=="error_reg"){
						document.getElementById('e_reg').innerHTML = "Usuario o email ya existen";
						document.getElementById('e_reg').focus();
					}else{
						$("#error_register").fadeIn(1000, function(){						
							$("#error_register").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+'</div>');
						});
					}
			  }
			});
		}
	});
});