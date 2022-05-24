function toggle7()
		{
            var x=document.getElementById("vaccination_login_pswrd");   
			var y=document.getElementById("hide9")
			var z=document.getElementById("hide10");

			if(x.type === 'password')
			{
				x.type="text";
				y.style.display="block";
				z.style.display="none";
			}
			else{
				x.type="password";
				y.style.display="none";
				z.style.display="block";
			}
		}
function toggle8()
		{
            var x=document.getElementById("vaccination_signup_pswrd");   
			var y=document.getElementById("hide11")
			var z=document.getElementById("hide12");

			if(x.type === 'password')
			{
				x.type="text";
				y.style.display="block";
				z.style.display="none";
			}
			else{
				x.type="password";
				y.style.display="none";
				z.style.display="block";
			}
		}