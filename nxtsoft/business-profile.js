function openMissionPop(cust_bus_id,vision,mission)
{
	
	document.getElementById('cust_bus_id').value=cust_bus_id;
	document.getElementById('vision').value=vision;
	document.getElementById('mission').value=mission;
	$('#MissionPop').modal('show');
	

}
function insertMission(event)
{
	cust_bus_id = document.getElementById('cust_bus_id').value;
	vision = document.getElementById('vision').value;
	mission = document.getElementById('mission').value;

	var url = "bussiness_profile-ajax.php?mode=insertMission&cust_bus_id="+cust_bus_id+"&vision="+vision+"&mission="+mission; // the script where you handle the form input.
	

	$.ajax({
		type: "POST",
		url: url,
		async: false,
		cache: false,
		contentType: false,
		processData: true,
		success: function(responseText)
		{
			
			if(responseText == "success")
			{
			
			document.getElementById("frmMissionPop").reset();
			showNotification("Vision & Mission submitted succesfully !!!","bg-green");
			
			}
			else
			{
				document.getElementById("frmMissionPop").reset();
				showNotification("ERROR in Vision & Mission UPDATION !!!","bg-red");
			}
				
		}
	});

}