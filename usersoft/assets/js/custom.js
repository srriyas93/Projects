

function showConfirmMessage1(module,sno,id,status)
{
  //alert(status);
     swal({
          title: "Warning",
          text: "Do you want to change the status?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete)
            {
                  switch (module)
                  {
                        case "product":
                                    disableProductStatus(sno,id,status);
                                    swal("Confirmed! Product status has been changed!",
                                    {
                                          icon: "success",
                                    }); 
                        break;
                  }
            }
            else
            {
                  swal("Status changed request cancelled!");
            }
      });
}

function disableProductStatus(cust_bus_id,cust_prod_id,prod_status){
      //alert(sno);
     var url = "custom-ajax.php?mode=disableProduct&cust_prod_id="+cust_prod_id+"&prod_status="+prod_status;

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
            setTimeout(function()
                  {
            window.location.href = 'products.php?cust_bus_id='+cust_bus_id;
         }, 1500);	        
         	
            }	
         }
      }); 
}

function formIsValid(moduleName,frmId,event)
{
      
      var form = document.getElementById(frmId);
      var isValidForm = form.checkValidity();

      if (isValidForm)
      {
            switch (moduleName)
            {
                  case "profile":
                        ChangePasswordCustomer(event);
                        break;
                  default:
                        alert("Something Went Wrong! Please Try Later");
            }
      }
      else
      {
            return false;
      }
}

// Function for managing Menu Active
activemenu();
function activemenu()
{
      var urlpath = window.location.pathname;
      url_Index = urlpath.lastIndexOf("/") + 1;
      fileName = urlpath.substr(url_Index);

      var activeMenu = fileName.split('.');
      activeItem = "menu-" + activeMenu[0];
      document.getElementById(activeItem).classList.add("active");

      switch (activeMenu[0])
      {
            case "socialmedia":
            case "mission":
            case "bussiness_profile":
                  document.getElementById('menu-bc').classList.add("active");
                  break;
      }
}