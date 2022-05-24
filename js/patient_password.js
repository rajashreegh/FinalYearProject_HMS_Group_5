function toggle3()
		{
            var x=document.getElementById("patient_pswrd");   
			var y=document.getElementById("hide5")
			var z=document.getElementById("hide6");

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

        function toggle4()
		{
            var x=document.getElementById("patient_reg-pswrd");   
			var y=document.getElementById("hide7")
			var z=document.getElementById("hide8");

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