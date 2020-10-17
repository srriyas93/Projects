<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Left Side Bar --> 
<?php
    include('page_left-sidebar.php');
?>
<!-- Include Right Side Bar --> 
<?php
    include('page_right-sidebar.php');
    require_once '../_includes/dbconfig.php';
    $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
?>
 
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add New Customer</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Add New Customer</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form id="addCustomer" name="addCustomer" action="customers-add-action.php" enctype="multipart/form-data" method="POST">
                <div class="row clearfix">
                 <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Select</strong> Package*</h2>
                        </div>
                        <div class="body">
                            <div class="form-group">
                                <select id="package" name="package" class="form-control" required>
                                    <option value="1" selected>FREE PLAN</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Select</strong> Category*</h2>
                                </div>
                                <div class="body">
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="cat" id="manu" class="with-gap" value="1" required="" checked="">
                                        <label for="manu">Manufacturers</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="cat" id="ser" class="with-gap" value="2" >
                                        <label for="ser">Service Providers</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="cat" id="prof" class="with-gap" value="3">
                                        <label for="prof">Professionals</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="cat" id="inst" class="with-gap" value="4" >
                                        <label for="inst">Institutions</label>
                                    </div>
                                    <div class="radio inlineblock ">
                                        <input type="radio" name="cat" id="trad" class="with-gap" value="5">
                                        <label for="trad">Traders & Vendors</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="cat" id="hosp" class="with-gap" value="6" >
                                        <label for="hosp">Hospitality</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Business</strong> Profile</h2>
                                </div>
                                <div class="body row">
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Busniess Name*</strong>
                                        <div class="form-group">
                                            <input id="bname" name="bname" type="text" class="form-control" placeholder="Enter business name" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Busniess Logo* (350px X 100px)</strong>
                                        <div class="form-group">
                                            <input id="blogo" name="blogo" type="file" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Cover Image* (800px X 450px)</strong>
                                        <div class="form-group">
                                            <input id="cover_img" name="cover_img" type="file" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Main</strong> Product</h2>
                                </div>
                                <div class="body row">
                                    <div class="col-sm-6">
                                        <strong>Product Name*</strong>
                                        <div class="form-group">
                                            <input id="pname" name="pname" type="text" class="form-control" placeholder="Enter product name" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Product Category*</strong>
                                        <div class="form-group">
                                            <input id="pcategory" name="pcategory" type="text" class="form-control" placeholder="Enter product category" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Brand Name</strong>
                                        <div class="form-group">
                                            <input id="brname" name="brname" type="text" class="form-control" placeholder="Enter brand name"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Product Keyword*</strong>
                                        <div class="form-group">
                                            <input id="pkeywd" name="pkeywd" type="text" class="form-control" placeholder="Enter product keyword" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Product Description*</strong>
                                        <div class="form-group">
                                            <textarea id="prdesc" name="prdesc" class="form-control" required=""></textarea>
                                        </div>
                                    </div> <div class="col-sm-6">
                                        <strong>Product Image* (900px X 550px)</strong>
                                        <div class="form-group">
                                            <input id="pimage" name="pimage" type="file" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Price*</strong>
                                        <div class="form-group">
                                            <input id="prprice" name="prprice" type="text" class="form-control" placeholder="Enter price" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Business</strong> Address</h2>
                                </div>
                                <div class="body row">
                                    <div class="col-sm-6">
                                        <strong>Building Name*</strong>
                                        <div class="form-group">
                                        <input id="buname" name="buname" type="text" class="form-control" placeholder="Enter Building Name" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Street Name*</strong>
                                        <div class="form-group">
                                        <input id="bstreet" name="bstreet" type="text" class="form-control" placeholder="Enter Street Name" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>P.O Number*</strong>
                                        <div class="form-group">
                                        <input id="bpo" name="bpo" type="text" class="form-control" placeholder="Enter P.O Numbere" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>City*</strong>
                                        <div class="form-group">
                                        <input id="bcity" name="bcity" type="text" class="form-control"  placeholder="Enter city" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>State*</strong>
                                        <div class="form-group">
                                        <input id="bstate" name="bstate" type="text" class="form-control"  placeholder="Enter state" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Country*</strong>
                                        <div class="form-group">
                                        <input id="bcountry" name="bcountry" type="text" class="form-control" placeholder="Enter country" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Google Map Location</strong>
                                        <div class="form-group">
                                        <textarea id="gmap" name="gmap" class="form-control" ></textarea>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Contact</strong> Details</h2>
                                </div>
                                <div class="body row">
                                     <div class="col-sm-6">
                                        <strong>Customer Name*</strong>
                                        <div class="form-group">
                                        <input id="cname" name="cname" type="text" class="form-control" placeholder="Enter Customer Name" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>E-mail Address*</strong>&nbsp;&nbsp;<span id="emailid" class="errorform"></span>
                                        <div class="form-group">
                                            <input id="cemail" name="cemail" type="text" class="form-control"  placeholder="Enter E-mail" onblur="checkEmail()" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <strong>Country Code*</strong>
                                        <div class="form-group">
                                            <input id="country_code" name="country_code" type="text" class="form-control" placeholder="0091" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <strong>Phone Number*</strong>&nbsp;&nbsp;<span id="mobno" class="errorform"></span>
                                        <div class="form-group">
                                            <input id="cphone" name="cphone" type="text" class="form-control" placeholder="Enter Phone Number" onblur="checkMob()" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Business counselor ID</strong>&nbsp;&nbsp;<span id="bcname" class="errorform"></span>
                                        <div class="form-group">
                                        <input id="bus_con" name="bus_con" type="text" class="form-control" placeholder="Enter counselor ID" onblur="getBCname()"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Business Holidays*</strong>
                                        <div class="form-group">
                                        <input id="busholi" name="busholi" type="text" class="form-control" placeholder="Enter holiday - ex:Sunday" required/>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <strong>Business Hours*</strong>()
                                        <div class="form-group">
                                        <input id="bushrs" name="bushrs" type="text" class="form-control" placeholder="Enter business hours - ex:9.00 AM to 6 PM" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong> Website URL</strong>
                                            <div class="form-group">
                                            <input id="cwebsite" name="cwebsite" type="text" class="form-control" placeholder="Enter wesite url" />
                                        </div>
                                    </div>
      
                            </div>
                        </div>
                    </div>
                </div>
         
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-danger waves-effect">Add Customer</button>
                <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</section>

<!-- Include Footer -->
<script>
    function geteditorvalue()
    {
        var innerHtml = $('.note-editable').html();
        document.getElementById('news_inline_editor').value=innerHtml;
        //alert(innerHtml);
    }
</script>
<?php
    include('page_footer.php');
?>