function openAdminEditpop(sno,plan_name,category,amount){
    document.getElementById('comm_edit_sno').value=sno;
    document.getElementById('comm_edit_plan').value=plan_name;
    document.getElementById('comm_edit_category').value=category;
    document.getElementById('comm_edit_amount').value=amount;

    $('#popeditcommission').modal('show');
}
function InsertCommission(event){
    event.preventDefault();
    var comm_plan=document.getElementById('comm_plan').value;
	var comm_category=document.getElementById('comm_category').value;
	var comm_amount=document.getElementById('comm_amount').value;
	
		var url = "bc_commission_setting-ajax.php?mode=AddCommission&comm_plan="+comm_plan+"&comm_category="+comm_category+"&comm_amount="+comm_amount; // the script where you handle the form input.
	
		$.ajax({
			type: "POST",
			url: url,
			async: false,
			cache: false,
			contentType: false,
			processData: true,
			success: function(responseText)
			{
				alert(responseText);
				if(responseText == "success")
				{	
                    document.getElementById("FrmeaddCommissionPop").reset();
                    showNotification("Record Inserted succesfully !!!","bg-green");
					setTimeout(function()
					{
					window.location.href ='bc_commission_setting.php';$('#popaddnewcommission').modal('hide');
					 }, 3000);	
				}
			}
		}); 
}

function EditCommission(event){
    event.preventDefault();
	var comm_sno=document.getElementById('comm_edit_sno').value;
	var comm_amount=document.getElementById('comm_edit_amount').value;
	
		var url = "bc_commission_setting-ajax.php?mode=EditCommission&comm_sno="+comm_sno+"&comm_amount="+comm_amount; // the script where you handle the form input.
	
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
				if(responseText == "success")
				{	
                    document.getElementById("FrmeeditCommissionPop").reset();
                    showNotification("Record Updated succesfully !!!","bg-green");
					setTimeout(function()
					{
					window.location.href ='bc_commission_setting.php';$('#popeditcommission').modal('hide');
					 }, 3000);	
				}
			}
		});
}