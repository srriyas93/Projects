function openFeatureEditpop(id,planfeaturename,rank){
	document.getElementById('pf_id').value=id;
	document.getElementById('pf_edit_name').value=planfeaturename;
	document.getElementById('pf_edit_rank').value=rank;

	$('#editFeaturesPop').modal('show');
}

function getid(){
    var url = "features-ajax.php?mode=GetpfId";
	
	
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
			alert(data);
			document.getElementById("pf_id").value = data;
	
		//	$('#popAddNewCustomers.cust_id').modal();
			
		}	
	}); 
}

function InsertFeature(event){
    event.preventDefault();

    var pf_id=document.getElementById('pf_id').value;
   // alert(pf_id);
	var pf_name=document.getElementById('pf_name').value;
    var pf_rank=document.getElementById('pf_rank').value;

	var url = "features-ajax.php?mode=addPf&pf_id="+pf_id+"&pf_name="+pf_name+"&pf_rank="+pf_rank; // the script where you handle the form input.
	

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
				
			document.getElementById("FrmeaddFeaturesPop").reset();
				showNotification("Record submitted succesfully !!!","bg-green");

				setTimeout(function()
				{
            	window.location.href = 'features.php';$('#popAddNewFeatures').modal('hide');
         		}, 3000);	
			}
		}
	}); 
}

function EditFeatures(event)
{

	event.preventDefault();
	var pf_id=document.getElementById('pf_id').value;
	var pf_name=document.getElementById('pf_edit_name').value;
	var pf_rank=document.getElementById('pf_edit_rank').value;
	
	var url = "features-ajax.php?mode=editPf&pf_id="+pf_id+"&pf_name="+pf_name+"&pf_rank="+pf_rank;
	
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
			document.getElementById("FrmeEditFeaturesPop").reset();
				
				showNotification("Record updated succesfully !!!","bg-green");

				setTimeout(function()
				{
            	window.location.href = 'features.php';$('#editFeaturesPop').modal('hide');
         		}, 3000);	
			}
		}	
	}); 
}

