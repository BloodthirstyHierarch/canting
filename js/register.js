
$("#register_form input[name='first_name']").blur(function(){
	var value = this.value.trim();
	var tip = '';
	if(!value){
		tip = '名字不能为空';
	}else if(value.length>20){
		tip = '名字太长';
	}
	document.getElementById('first_name_tip').style.color='#B71B39';
	document.getElementById('first_name_tip').innerText = tip;
}).focus(function(){
	document.getElementById('first_name_tip').style.color='#2EA733';
	document.getElementById('first_name_tip').innerText = "长度必须低于２０";
});
$("#register_form input[name='last_name']").blur(function(){
	var value = this.value.trim();
	var tip = '';
	if(!value){
		tip='姓不能为空';
	}else if(value.length>20){
		tip = '姓太长';
	}
	document.getElementById('last_name_tip').style.color='#B71B39';
	document.getElementById('last_name_tip').innerText = tip;
}).focus(function(){
	document.getElementById('last_name_tip').style.color='#2EA733';
	document.getElementById('last_name_tip').innerText = "长度必须低于２０";
});
$("#register_form input[name='email']").blur(function(){
	var value = this.value.trim();
	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.open('POST','php-ajax/email_check.php',true);
  	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  	xmlhttp.send('email='+value);
  	xmlhttp.onreadystatechange = function(){
   	 	if(xmlhttp.readyState===4&&xmlhttp.status===200){
   	 		var email_judge = xmlhttp.responseText;
   	 		var color,tip;
   	 		if(email_judge==='ok'){
   	 			tip = "邮箱可用";
   	 			color = '#2EA733';
   	 		}else{
   	 			color = '#B71B39';
   	 			if(email_judge==='empty'){
   	 				tip='邮箱不能为空';
   	 			}else if(email_judge==='error'){
					tip = '邮箱格式错误';
		      	}else if(email_judge==='exist'){
					tip = '邮箱已被占用';
		      	} 
   	 		}
			document.getElementById('email_tip').style.color = color;
			document.getElementById('email_tip').innerText = tip;
	    }
  	}
}).focus(function(){
	document.getElementById('email_tip').style.color='#2EA733';
	document.getElementById('email_tip').innerText = "请输入正确的邮箱";
});
$("#register_form input[name='password']").blur(function(){
	var value = this.value.trim();
	var tip = '';
	if(!value){
		tip = '密码不能为空';
	}else if(value.length>16||value.length<6){
		tip = '密码长度必须6-16位';
	}
	document.getElementById('password_tip').style.color='#B71B39';
	document.getElementById('password_tip').innerText = tip;
}).focus(function(){
	document.getElementById('password_tip').style.color='#2EA733';
	document.getElementById('password_tip').innerText = "密码长度在6-16之间";
});
$("#register_form input[name='password1']").blur(function(){
	var value = this.value.trim();
	var tip = '';
	if(value!==$("#register_form input[name='password']")[0].value.trim()){
		tip = '两次密码不一样';
	}
	document.getElementById('password1_tip').style.color='#B71B39';
	document.getElementById('password1_tip').innerText = tip;
}).focus(function(){
	document.getElementById('password1_tip').style.color='#2EA733';
	document.getElementById('password1_tip').innerText = "确认密码";
});
$("#register_form input[name='mobile']").blur(function(){
	var value = this.value.trim();
	var tip = '';
	var mobile_reg = new RegExp(/^\d{11}$/);
	if(!value){
		tip = '电话不能为空';
	}else if(!mobile_reg.test(parseInt(value))){
		tip = '电话长度有误或格式不对';
	}
	document.getElementById('mobile_tip').style.color='#B71B39';
	document.getElementById('mobile_tip').innerText = tip;
}).focus(function(){
	document.getElementById('mobile_tip').style.color='#2EA733';
	document.getElementById('mobile_tip').innerText = "请输入正确的电话号码";
});

function formsubmit(){
	$.ajax({
    	cache: true,
		type: "POST",
    	url:"php-ajax/register.php",
    	data:$('#register_form').serialize(),
    	async: false,
    	error: function(request) {
    		alert("Connection error");
    	},
    	success: function(data) {
    		if(data === 'success'){
    			alert('注册成功！');
    			location.href='login.php';
    		}else if(data === 'empty_error'){
    			console.log('empty_error!');
    		}else if(data === 'first_name_error'){
    			document.getElementById("first_name_tip").innerText = '名字有误';
    		}else if(data === 'last_name_error'){
    			document.getElementById("last_name_tip").innerText = '姓有误';
    		}else if(data === 'email_error'){
    			document.getElementById("email_tip").innerText = '邮箱有误';
    		}else if(data === 'email_same'){
    			document.getElementById("email_tip").innerText = '邮箱已被占用';
    		}else if(data === 'password_error'){
    			document.getElementById("password_tip").innerText = '密码有误';
    		}else if(data === 'password1_error'){
    			document.getElementById("password1_tip").innerText = '两次密码不一样';
    		}else if(data === 'mobile_error'){
    			document.getElementById("mobile_tip").innerText = '电话有误';
    		}else{
    			console.log(data);
    		}
    	}
	});
}