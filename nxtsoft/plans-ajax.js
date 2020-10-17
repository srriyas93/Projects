function openPlanViewpop(id,plan_name,amount,plan_status,plan_created_date,plan_updated_date){
    document.getElementById('plan_view_id').value=id;
    document.getElementById('plan_view_name').value=plan_name;
    document.getElementById('plan_view_amount').value=amount;
    document.getElementById('plan_view_status').value=plan_status;
    document.getElementById('plan_view_created_date').value=plan_created_date;
    document.getElementById('plan_view_updated_date').value=plan_updated_date;

    $('#ViewCustomersPop').modal('show');
}

function openPlanEditpop(id,name,description,product_limit,amount){
    document.getElementById('p_edit_id').value=id;
    document.getElementById('p_edit_name').value=name;
	document.getElementById('p_edit_amount').value=amount;
	document.getElementById('p_edit_description').value=description;
    document.getElementById('p_edit_product_limit').value=product_limit;

    $('#editPlansPop').modal('show');
}

function openAssignFeaturePop(id,plan_name){
    document.getElementById('plan_id').value=id;
    document.getElementById('plan_name').value=plan_name;
    $('#popAssignFeatures').modal('show');
}
function getPlanid(){
    var url = "plans-ajax.php?mode=GetPlanId";
	
	
	$.ajax({
		type: "POST",
		url: url,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		data: FormData,
		success: function(data)
			{
			//alert(data);
			document.getElementById("p_id").value = data;
	
		//	$('#popAddNewCustomers.cust_id').modal();
			
		}	
	}); 
}

function InsertPlan(event){
    event.preventDefault();

    var p_id=document.getElementById('p_id').value;
	var p_name=document.getElementById('p_name').value;
	var p_description=document.getElementById('p_description').value;
    var p_amount=document.getElementById('p_amount').value;

	var url = "plans-ajax.php?mode=addPlan&p_id="+p_id+"&p_name="+p_name+"&p_description="+p_description+"&p_amount="+p_amount; // the script where you handle the form input.
	

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
				
			    document.getElementById("FrmeaddPlanPop").reset();
				showNotification("Record submitted succesfully !!!","bg-green");

				setTimeout(function()
				{
            	window.location.href = 'plans.php';$('#popAddNewPlan').modal('hide');
         		}, 3000);	
			}
		}
	}); 
}

function EditPlan(event)
{

	event.preventDefault();
	var p_id=document.getElementById('p_edit_id').value;
	var p_name=document.getElementById('p_edit_name').value;
	var p_description=document.getElementById('p_edit_description').value;
	var p_product_limit=document.getElementById('p_edit_product_limit').value;
	var p_amount=document.getElementById('p_edit_amount').value;
	
	
	var url = "plans-ajax.php?mode=editPlan&p_id="+p_id+"&p_name="+p_name+"&p_description="+p_description+"&p_amount="+p_amount+"&p_product_limit="+p_product_limit;
	
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
			if(responseText == "success")
			{
			    document.getElementById("FrmeEditPlansPop").reset();
				
				showNotification("Record updated succesfully !!!","bg-green");

				setTimeout(function()
				{
            	window.location.href = 'plans.php';$('#editPlansPop').modal('hide');
         		}, 3000);	
			}
		}	
	}); 
}

function AssignFeatures(event){
    event.preventDefault();

    var plan_id=document.getElementById('plan_id').value;
    //alert(plan_id);
	var features_id=document.getElementById('features_id').value;
    

	var url = "plans-ajax.php?mode=AssignFeatures&plan_id="+plan_id+"&features_id="+features_id; // the script where you handle the form input.
	

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
			    document.getElementById("FrmAssignFeaturesPop").reset();
				showNotification("Record submitted succesfully !!!","bg-green");

				setTimeout(function()
				{
            	window.location.href = 'plans.php';$('#popAssignFeatures').modal('hide');
         		}, 3000);	
			}
		}
	}); 
}