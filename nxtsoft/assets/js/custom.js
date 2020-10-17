

function showConfirmMessage1(module,name,id,status)
{
  //alert(status);
     swal({
          title: "Warning",
          text: "Do you want to change "+name+" status?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete)
            {
                  switch (module)
                  {
                        case "admin":
                                    disableAdminStatus(id,status);
                                    swal("Confirmed! "+name+" status has been changed!",
                                    {
                                    icon: "success",
                                    }); 
                        break;
                        case "bc":
                                    disableBcStatus(id,status);
                                    swal("Confirmed! "+name+" status has been changed!",
                                    {
                                    icon: "success",
                                    }); 
                        break;
                        case "customer":
                                    disableCustomerStatus(id,status);
                                    swal("Confirmed! "+name+" status has been changed!",
                                    {
                                    icon: "success",
                                    }); 
                        break;
                        case "plan":
                                    disablePlanStatus(id,status);
                                    swal("Confirmed! "+name+" status has been changed!",
                                    {
                                    icon: "success",
                                    }); 
                        break;
                        case "features":
                                    disablePlanFeatureStatus(id,status);
                                    swal("Confirmed! "+name+" status has been changed!",
                                    {
                                    icon: "success",
                                    }); 
                        break;
                        
                  }
            }
            else
            {
                  swal(name+" status change request cancelled!");
            }
      });
}

function disablePlanStatus(id,status){
      
     var url = "custom-ajax.php?mode=disablePlan&id="+id+"&status="+status;

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
            window.location.href = 'plans.php';
         }, 1500);	        
         	
            }	
         }
      }); 
}


function disablePlanFeatureStatus(id,status){
   
      var url = "custom-ajax.php?mode=disablePlanFeatures&id="+id+"&status="+status;
 
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
             window.location.href = 'features.php';
          }, 1500);	        
                
            }	
      }
  });
} 

function disableBcStatus(bc_id,status){
    
      var url = "custom-ajax.php?mode=disableBc&bc_id="+bc_id+"&status="+status;
 
      $.ajax({
      type: "POST",
      url: url,
      async: false,
      cache: false,
      contentType: false,
      processData: true,
      success: function(responseText)
      {
           // alert(responseText);
            if(responseText == "success")
            {
            setTimeout(function()
            {
             window.location.href = 'bussiness_counsellor.php';
          }, 1500);	        
                
            }	
      }
  });
} 

function disableAdminStatus(user_id,status){
   
      var url = "custom-ajax.php?mode=disableAdmin&user_id="+user_id+"&status="+status;

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
            setTimeout(function()
            {
             window.location.href = 'admin.php';
          }, 1500);	        
                
            }	
      }
  });
}

function disableCustomerStatus(cust_sno,status){
   
      var url = "custom-ajax.php?mode=disableCustomer&cust_sno="+cust_sno+"&status="+status;

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
            setTimeout(function()
            {
             window.location.href = 'customers.php';
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
                  case "admin":
                        insertAdmin(event);
                        break;
                  case "admin_edit":
                        EditAdmin(event);
                        break;
                  case "admin_chgpass":
                        ChangePasswordAdmin(event);
                        break;
                  case "bc":
                        insertBc(event);
                        break;
                  case "bc_edit":
                        EditBc(event);
                        break;
                  case "bc_chgpass":
                        ChangePasswordBc(event);
                        break;
                  case "features":
                        InsertFeature(event);
                        break;
                  case "features_edit":
                        EditFeatures(event);
                        break;
                  case "plans":
                        InsertPlan(event);
                        break;
                  case "plans_edit":
                        EditPlan(event);
                        break;
                  case "plan_assign_feature":
                        AssignFeatures(event);
                        break;
                  case "commission":
                        InsertCommission(event);
                        break;
                  case "commission_edit":
                        EditCommission(event);
                        break;
                  case "customer-edit":
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
//notification message
function showNotification(text,colorName) {
    /*
    if (text === null || text === '') { text = 'Turning standard Bootstrap alerts'; }
    if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
    if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }*/

    if(colorName === "bg-green")
    {
        colorName === 'bg-green';
    }
    else if(colorName === "bg-red")
    {
        colorName = 'bg-red';
    }
    else
    {
        colorName = 'bg-black';
    }

    var placementFrom = 'top';
    var placementAlign = 'right';
    var colorName = colorName;
    var text = text;
    var animateEnter = 'animated fadeInDown';
    var animateExit = 'animated fadeOutUp';
    var allowDismiss = true;

    $.notify({
        message: text
    },
        {
            type: colorName,
            allow_dismiss: allowDismiss,
            newest_on_top: true,
            timer: 500,
            placement: {
                from: placementFrom,
                align: placementAlign
            },
            animate: {
                enter: animateEnter,
                exit: animateExit
            },
            template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "" : "") + '" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
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
          $("#mobno").html(' Number already exists!');
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
      var urlpath = window.location.pathname;
      url_Index = urlpath.lastIndexOf("/") + 1;
      fileName = urlpath.substr(url_Index);

      var activeMenu = fileName.split('.');
      activeItem = "menu-" + activeMenu[0];
      document.getElementById(activeItem).classList.add("active");

      switch (activeMenu[0])
      {
            case "admin":
            case "customers":
            case "bussiness_counsellor":
                  document.getElementById('menu-users').classList.add("active");
                  break;
            
            case "reports_customers":
            case "reports_bc":
                  document.getElementById('menu-reports').classList.add("active");
                  break;
            
            case "features":
            case "plans":
            case "bc_commission_setting":
                  document.getElementById('menu-settings').classList.add("active");
                  break;
      }
}