function CheckOldPass(b_edit_id,b_edit_old_pass){

	var b_id=document.getElementById('b_edit_id').value;
	var b_old_pass=document.getElementById('b_edit_old_pass').value;
	if(b_old_pass==""){
		msg="Please Enter Existing Password...";
		$("#oldpasswordmessage").html(msg);
	}
	else{
	var url = "profile-ajax.php?mode=checkPass&b_id="+b_id+"&b_old_pass="+b_old_pass;

	$.ajax({
		type: "POST",
		url: url,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(responseText)
			{
		    //alert(responseText);
			if(responseText == "1")
			{
				document.getElementById("b_edit_old_pass").style.borderColor="";
				msg = "";
			}else{
				msg = "Old Password Wrong...Please Try Again!!!";
				document.getElementById("b_edit_old_pass").style.borderColor="red";
				document.getElementById("b_edit_old_pass").value=null;				
			}
		$("#oldpasswordmessage").html(msg);
		}	
	});
	} 
}

function ChangePasswordBc(event){

	event.preventDefault();
	var bc_id=document.getElementById('b_edit_id').value;
	var b_pass_new=document.getElementById('b_edit_new_pass').value;
	var b_pass_new_confirm=document.getElementById('b_edit_confirm_pass').value;
	if(b_pass_new!=b_pass_new_confirm){
		document.getElementById("b_edit_new_pass").style.borderColor="red";	
		msg = "Password not matching!";
		$("#conpasswordmessage").html(msg);
	}
	else{	
		var url = "profile-ajax.php?mode=BcChangePassword&bc_id="+bc_id+"&b_pass_new="+b_pass_new; // the script where you handle the form input.
	
		$.ajax({
			type: "POST",
			url: url,
			async: false,
			cache: false,
			contentType: false,
			processData: true,
			success: function(responseText)
			{
				//alert(responseText);
				if(responseText == "1")
				{	
					document.getElementById("editBcPass").reset();
					swal("Password has been changed Successfully!!!",
				{
					  icon: "success",
				}); 
					setTimeout(function()
					{
					window.location.href = 'profile-edit.php';
					 }, 3000);	
				}
			}
		}); 
	}
}