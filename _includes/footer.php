            <!--Footer Top-->
            <div class="sec-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 colmargin clearfix margin-bottom">
                            <div class="fo-map">
                                <div class="footer-logo"><img src="../_assets/images/logo/logo.jpg" alt="" style="width: 60%;" /></div>
                                <p class="text-dark">“Trade Brochure” is a useful tool to add credibility by demonstrating that your product or service. Meets the expectations of your customers.</p>
                            </div>
                        </div>
                        <!--end item-->
                        <div class="col-md-2 col-xs-12 clearfix margin-bottom">
                            <h4 class="less-mar3 font-weight-5">About Us</h4>
                            <div class="clearfix"></div>
                            <br />
                            <ul class="footer-quick-links-5">
                                <li><a href="#"> Home</a></li>
                                <li><a href="#"> Packages</a></li>
                                <li><a href="#"> About Us</a></li>
                                <li><a href="#"> Contact</a></li>
                            </ul>
                        </div>
                        <!--end item-->
                        <div class="col-md-3 col-xs-12 clearfix margin-bottom">
                            <h4 class="less-mar3 font-weight-5">Our Packages</h4>
                            <div class="clearfix"></div>
                            <br />
                            <ul class="footer-quick-links-5">
                                <li><a href="#"> Basic - FREE</a></li>
                                <li><a href="#"> Standard</a></li>
                                <li><a href="#"> Premium</a></li>
                                <li><a href="#"> Professional</a></li>
                            </ul>
                        </div>
                        <!--end item-->
                        <div class="col-md-3 col-xs-12 clearfix margin-bottom">
                            <h4 class="less-mar3 font-weight-5">Contact Us</h4>
                            <div class="clearfix"></div>
                            <br />
                            <address class="text-dark">
                                <strong class="text-dark uppercase">Address:</strong> <br>
                                Mr.Kissan House P.O.Veloor,680601, Thrissur,Kerala
                            </address>
                            <span class="text-dark"><strong class="text-dark uppercase">Registration No:</strong> TSR/TC/465/2017 </span>
                            <span class="text-dark"><strong class="text-dark uppercase">Phone:</strong> +91-7902380800</span><br>
                            <span class="text-dark"><strong class="text-dark uppercase">Email:</strong> mrkissanmd@gmail.com </span><br>
                            
                            <ul class="footer-social-icons dark left-align icons-plain text-center">
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                        <!--end item-->
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- Footer Low -->
            <section class="sec-padding-6 section-light">
                <div class="container">
                    <div class="row">
                        <div class="fo-copyright-holder text-center text-white"> Copyright © 2020 l Trade Brochure. All rights reserved. </div>
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
            <!-- Scroll top -->
            <a href="#" class="scrollup"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
        </div>
        <!--end site wrapper-->
    </div>
    <!--end wrapper boxed-->
    <!-- Scripts -->
    <script async src="https://cse.google.com/cse.js?cx=2dff9636095a34b3a"></script>
    <script src="../_assets/js/jquery/jquery.js"></script>
    <script src="../_assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="../_assets/js/file-upload/fileinput.js" type="text/javascript"></script>
    <script src="../_assets/js/file-upload/fr.js" type="text/javascript"></script>
    <script src="../_assets/js/file-upload/es.js" type="text/javascript"></script>
    <script src="../_assets/js/less/less.min.js" data-env="development"></script>

    <!-- Scripts END -->
    <script>
    $('#file-fr').fileinput({
        language: 'fr',
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'png', 'gif'],
    });
    $('#file-es').fileinput({
        language: 'es',
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'png', 'gif'],
    });
    $("#file-0").fileinput({
        'allowedFileExtensions': ['jpg', 'png', 'gif'],
    });
    $("#file-1").fileinput({
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
    /*
    $(".file").on('fileselect', function(event, n, l) {
        alert('File Selected. Name: ' + l + ', Num: ' + n);
    });
    */
    $("#file-3").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
    });
    $("#file-4").fileinput({
        uploadExtraData: { kvId: '10' }
    });
    $(".btn-warning").on('click', function() {
        if ($('#file-4').attr('disabled')) {
            $('#file-4').fileinput('enable');
        } else {
            $('#file-4').fileinput('disable');
        }
    });
    $(".btn-info").on('click', function() {
        $('#file-4').fileinput('refresh', { previewClass: 'bg-info' });
    });
    /*
    $('#file-4').on('fileselectnone', function() {
        alert('Huh! You selected no files.');
    });
    $('#file-4').on('filebrowse', function() {
        alert('File browse clicked for #file-4');
    });
    */
    $(document).ready(function() {
        $("#test-upload").fileinput({
            'showPreview': false,
            'allowedFileExtensions': ['jpg', 'png', 'gif'],
            'elErrorContainer': '#errorBlock'
        });
        /*
        $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
            alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
        });
        */
    });
    </script>
    <!-- Template scripts -->
    <script src="../_assets/js/megamenu/js/main.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="../_assets/js/gmaps/jquery.gmap.min.js"></script> 
    <script type="text/javascript" src="../_assets/js/gmaps/examples.js"></script>
    <script>
        $(window).load(function() {
            setTimeout(function() {

                $('.loader-live').fadeOut();
            }, 1000);
        })
    </script>
    <script src="../_assets/js/parallax/parallax-background.min.js"></script>
    <script>
        (function($) 
        {
            $('.parallax').parallaxBackground();
        })(jQuery);
    </script>
    <script src="../_assets/js/tabs/js/responsive-tabs.min.js" type="text/javascript"></script>
    <script src="../_assets/js/functions/functions.js"></script>
    <script src="../_assets/js/customer.js"></script>
</body>

</html>