function toggle2()
		{
            var x=document.getElementById("doc_pswrd");   
			var y=document.getElementById("hide3")
			var z=document.getElementById("hide4");

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