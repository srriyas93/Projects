

function showConfirmMessage1(module,id,status)
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
                                    disableProductStatus(id,status);
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

function disableProductStatus(sno,status){
      //alert(sno);
     var url = "custom-ajax.php?mode=disableProduct&sno="+sno+"&status="+status;

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
            window.location.href = 'products.php';
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
                        editProfile(event);
                        break;
                  case "bc_chgpass":
                        ChangePasswordBc(event);
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
}