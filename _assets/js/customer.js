function otpVerification()
{
	str1 = document.getElementById('otpval').value;
	str2 = document.getElementById('otpEnt').value;
	cust_id = document.getElementById('cust_id').value;

	plan_id = document.getElementById('plan_id').value;
	str1 = str1.trim();

	if(str1 === str2)
	{
		window.location.href = "reg_success.php?cust_id="+cust_id+"&plan_id="+plan_id;
		
	}
	else
	{
		//Materialize.toast('Please select month', 1500,'red rounded');
		//showNotification("Record updated succesfully !!!","bg-green");
		return false;
	} 
}
function resendOTP(phone)
{

	var url = "resend-otp-ajax.php?mode=resendOTP&phone="+phone;
	
	$.ajax({
		type: "POST",
		url: url,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(responseText)
		{
			if(responseText)
			{
				//alert(responseText);
				document.getElementById('otpval').value = responseText;
		   }
		}	
	}); 
}
function getBCname()
{
	bc_id = document.getElementById('bus_con').value;
	$.ajax({
			type: "POST",
			url: "custom-ajax.php?mode=GET_BC_NAME",
			data: {
				'bcid' :bc_id,
			},
			success: function(responseText)
			{
				if(responseText == 0)
				{
					document.getElementById('bcname').className ='errorform';
					$("#bcname").html('Wrong Counselor ID');
					document.getElementById('bus_con').value = '';

				}
				else
				{
					document.getElementById('bcname').className ='infoform';
					$("#bcname").html(responseText);
				}
				$(function()
				{
					console.log( "ready!" );
				});
			}
		});
}
function checkEmail()
{
	cemail = document.getElementById('cemail').value;
	
	$.ajax({
			type: "POST",
			url: "custom-ajax.php?mode=CHECK_EMAIL",
			data: {
				'email' :cemail,
			},
			success: function(responseText)
			{
				
				if(responseText == 0)
				{
					$("#emailid").text('E-mail already exists!');
					document.getElementById('cemail').value = '';
				}
				else
				{
					$("#emailid").text("");
				}


				$(function()
				{
					console.log( "ready!" );
				});
			}
		});

}
function checkMob()
{
	cphone = document.getElementById('cphone').value;
	$.ajax({
			type: "POST",
			url: "custom-ajax.php?mode=CHECK_MOB",
			data: {
				'cphone' :cphone,
			},
			success: function(responseText)
			{
				
				if(responseText == 0)
				{
					$("#mobno").html('Number already exists!');
					document.getElementById('cphone').value = '';

				}
				else{
					$("#mobno").html('');
				}

				$(function()
				{
					console.log( "ready!" );
				});
			}
		});

}

// Function for managing Menu Active
activemenu();
function activemenu()
{
	var pathArray = window.location.pathname.split('/');
	var activeMenu = pathArray[pathArray.length-2];

	activeItem = "menu-" + activeMenu;
	document.getElementById(activeItem).classList.add("active");

      switch (activeMenu[0])
      {
            case "home":
                  document.getElementById('menu-home').classList.add("active");
			  break;
			  case "about":
				document.getElementById('menu-about').classList.add("active");
			  break;
			  case "packages":
				document.getElementById('menu-packages').classList.add("active");
				break;
			  case "contact":
				document.getElementById('menu-contact').classList.add("active");
			  break;
      }
}