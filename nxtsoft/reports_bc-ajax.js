
function BcReport(event){
	event.preventDefault();
	var bc_name=document.getElementById('bc_report_name').value;
	//alert(cust_snoname);
	//var cust_planid=document.getElementById('cust_report_planid').value;
	var bc_status=document.getElementById('bc_report_status').value;
	var bc_start_date=document.getElementById('bc_report_start_date').value;
	var bc_end_date=document.getElementById('bc_report_end_date').value;

/*	if(bc_snoname == -1)
	{
		var bc_name = "NA"	;
	}
	else
	{
		var bc = document.getElementById('bc_report_snoname');
		var bc_name = bc.options[bc.selectedIndex].text;
	}

	/*if(cust_planid == -1)
	{
		var pl_name = "NA"	;
	}
	else
	{
		var pl =document.getElementById('cust_report_planid');
		var pl_name = pl.options[pl.selectedIndex].text;
	}*/

	if(bc_status == -1)
	{
		var status = "NA"	;
	}
	else
	{
		var stat =document.getElementById('bc_report_status');
		var status = stat.options[stat.selectedIndex].text;
	}


	var url = "reports_bc-ajax.php?mode=BcReport&bc_name="+bc_name+"&bc_status="+bc_status+"&bc_start_date="+bc_start_date+"&bc_end_date="+bc_end_date; // the script where you handle the form input.

	$.ajax({
		url: url,
		dataType : 'html',
		context: document.body,
		success: function(responseText)
		{
			//alert(responseText);
			$('#displayBcReport').html(responseText);

			/* ----- Setting up data for Export Report start ---*/
			document.getElementById('td_cu_type').innerHTML = bc_name;
			//document.getElementById('td_cu_plan').innerHTML =pl_name;
			document.getElementById('td_cu_status').innerHTML = status;
			document.getElementById('td_cu_stdate').innerHTML =bc_start_date;
			document.getElementById('td_cu_enddate').innerHTML = bc_end_date;
			/* ----- Setting up data for Export Report ends ---*/
			$(function()
			{
				console.log( "ready!" );
			});
			document.getElementById("BcSearch").reset();
			
		}
	});	
}
