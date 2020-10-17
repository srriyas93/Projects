
function openCustomerViewpop(cust_id,cust_name,cust_email,cust_mobile,cust_status,cust_created_date,cust_updated_date){

 	document.getElementById('cust_view_id').value=cust_id;
	document.getElementById('cust_view_name').value=cust_name;
	document.getElementById('cust_view_email').value=cust_email;
	document.getElementById('cust_view_mobile').value=cust_mobile;
	document.getElementById('cust_view_status').value=cust_status;
	document.getElementById('cust_view_created_date').value=cust_created_date;
	document.getElementById('cust_view_updated_date').value=cust_updated_date;
	$('#ViewCustomersPop').modal('show');
}
function CheckOldPass(cust_edit_id,cust_edit_old_pass){

	var cust_id=document.getElementById('cust_edit_id').value;
	var cust_old_pass=document.getElementById('cust_edit_old_pass').value;
	if(cust_old_pass==""){
		msg="Please Enter Existing Password...";
		$("#oldpasswordmessage").html(msg);
	}
	else{
	var url = "customers-ajax.php?mode=checkPass&cust_id="+cust_id+"&cust_old_pass="+cust_old_pass;

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
				document.getElementById("cust_edit_old_pass").style.borderColor="";
				msg = "";
			}else{
				msg = "Old Password Wrong...Please Try Again!!!";
				document.getElementById("cust_edit_old_pass").style.borderColor="red";
				document.getElementById("cust_edit_old_pass").value=null;				
			}
		$("#oldpasswordmessage").html(msg);
		}	
	});
	} 
}

function ChangePasswordCustomer(event){

	event.preventDefault();
	var cust_id=document.getElementById('cust_edit_id').value;
	var cust_pass_new=document.getElementById('cust_edit_new_pass').value;
	var cust_pass_new_confirm=document.getElementById('cust_edit_confirm_pass').value;
	if(cust_pass_new!=cust_pass_new_confirm){
		document.getElementById("cust_edit_confirm_pass").style.borderColor="red";	
		msg = "Password not matching!";
		$("#conpasswordmessage").html(msg);
	}
	else{	
		var url = "customers-ajax.php?mode=CustChangePassword&cust_id="+cust_id+"&cust_pass_new="+cust_pass_new; // the script where you handle the form input.
	
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
					document.getElementById("editCustomerPass").reset();
					swal("Password has been changed Successfully!!!",
				{
					  icon: "success",
				}); 
					setTimeout(function()
					{
					window.location.href = 'customers.php';
					 }, 3000);	
				}
			}
		}); 
	}
}




