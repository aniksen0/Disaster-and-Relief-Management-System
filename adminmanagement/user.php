<?php
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="ut-8" />
   <link rel="apple-touch-icon" sizes="76x76" hre="img/apple-icon.png">
   <link rel="icon" type="image/png" hre="img/avicon.png">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>
     Admin Dashboard
   </title>
   <meta content='width=device-width, initial-scale=1.0, shrink-to-it=no' name='viewport' />
   <!--     onts and icons     -->
   <link rel="stylesheet" type="text/css" hre="https://onts.googleapis.com/css?amily=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
   <link rel="stylesheet" hre="https://maxcdn.bootstrapcdn.com/ont-awesome/latest/css/ont-awesome.min.css">
   <!-- CSS iles -->
   <link hre="css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
 </head>

 <body class="">
   <div class="wrapper ">
     <div class="sidebar" data-color="purple" data-background-color="white" data-image="img/sidebar-1.jpg">
       <!--
         Tip 1: You can change the color o the sidebar using: data-color="purple | azure | green | orange | danger"

         Tip 2: you can also add an image using data-image tag
     -->
       <div class="logo"><a hre="" class="simple-text logo-normal">
         </a></div>
       <div class="sidebar-wrapper">
         <ul class="nav">
           <li class="nav-item  ">
             <a class="nav-link" hre="./dashboard.html">
               <i class="material-icons">dashboard</i>
               <p>Dashboard</p>
             </a>
           </li>
           <li class="nav-item active ">
             <a class="nav-link" hre="user1">
               <i class="material-icons">person</i>
               <p>Add Employee</p>
             </a>
           </li>
           <li class="nav-item ">
             <a class="nav-link" hre="./tables.html">
               <i class="material-icons">content_paste</i>
               <p>Employee List</p>
             </a>
           </li>
           <li class="nav-item ">
             <a class="nav-link" hre="./typography.html">
               <i class="material-icons">library_books</i>
               <p>Typography</p>
             </a>
           </li>
           <li class="nav-item ">
             <a class="nav-link" hre="./icons.html">
               <i class="material-icons">bubble_chart</i>
               <p>Icons</p>
             </a>
           </li>
           <li class="nav-item ">
             <a class="nav-link" hre="./map.html">
               <i class="material-icons">location_ons</i>
               <p>Maps</p>
             </a>
           </li>
           <li class="nav-item ">
             <a class="nav-link" hre="./notiications.html">
               <i class="material-icons">notiications</i>
               <p>Notiications</p>
             </a>
           </li>
         </ul>
       </div>
     </div>
     <div class="main-panel">
       <!-- Navbar -->
       <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute ixed-top ">
         <div class="container-luid">
           <div class="navbar-wrapper">
             <a class="navbar-brand" hre="javascript:;">User Proile</a>
           </div>
           <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="alse" aria-label="Toggle navigation">
             <span class="sr-only">Toggle navigation</span>
             <span class="navbar-toggler-icon icon-bar"></span>
             <span class="navbar-toggler-icon icon-bar"></span>
             <span class="navbar-toggler-icon icon-bar"></span>
           </button>
           <div class="collapse navbar-collapse justiy-content-end">
             <orm class="navbar-orm">
               <div class="input-group no-border">
                 <input type="text" value="" class="orm-control" placeholder="Search...">
                 <button type="submit" class="btn btn-white btn-round btn-just-icon">
                   <i class="material-icons">search</i>
                   <div class="ripple-container"></div>
                 </button>
               </div>
             </orm>
             <ul class="navbar-nav">
               <li class="nav-item">
                 <a class="nav-link" hre="javascript:;">
                   <i class="material-icons">dashboard</i>
                   <p class="d-lg-none d-md-block">
                     Stats
                   </p>
                 </a>
               </li>
               <li class="nav-item dropdown">
                 <a class="nav-link" hre="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="alse">
                   <i class="material-icons">notiications</i>
                   <span class="notiication">5</span>
                   <p class="d-lg-none d-md-block">
                     Some Actions
                   </p>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                   <a class="dropdown-item" hre="#">Mike John responded to your email</a>
                   <a class="dropdown-item" hre="#">You have 5 new tasks</a>
                   <a class="dropdown-item" hre="#">You're now riend with Andrew</a>
                   <a class="dropdown-item" hre="#">Another Notiication</a>
                   <a class="dropdown-item" hre="#">Another One</a>
                 </div>
               </li>
               <li class="nav-item dropdown">
                 <a class="nav-link" hre="javascript:;" id="navbarDropdownProile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="alse">
                   <i class="material-icons">person</i>
                   <p class="d-lg-none d-md-block">
                     Account
                   </p>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProile">
                   <a class="dropdown-item" hre="#">Proile</a>
                   <a class="dropdown-item" hre="#">Settings</a>
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" hre="#">Log out</a>
                 </div>
               </li>
             </ul>
           </div>
         </div>
       </nav>
       <!-- End Navbar -->
       <div class="content">
         <div class="container-luid">
           <div class="row">
             <div class="col-md-8">
               <div class="card">
                 <div class="card-header card-header-primary">
                   <h4 class="card-title">Edit Proile</h4>
                   <p class="card-category">Complete your proile</p>
                 </div>
                 <div class="card-body">
                   <form  class="" method="post">
                   <h1>Register</h1>
                   <p>GROUP POLICY AND ROLE.</p>
                   <hr>
                   <div class="form-row">

                       <div class="col-sm-4">
                               <label for="id"><b>ID:</b></label>
                               <input class="input form-control" type="text" size="20" maxlength="10" placeholder="Enter USER ID" name="id" id="id" required>
                       </div>

                       <div class="col-sm-4">
                           <label for="name" ><b>Name:</b></label>
                           <input class="input form-control" type="text" size="25" placeholder="Enter Name" name="name" id="name" required>
                       </div>
                       <div class="col-sm-4">
                           <label for="email" ><b>Email:</b></label>
                           <input class="input form-control" type="text" size="25" placeholder="Enter Email" name="email" id="email" required>
                       </div>
                   </div>


                       <div class="col-sm-12">
                           <hr>
                           <label for="file">Employee Image</label>
                           <input type="file" id="file" name="file1" value="">
                           <p style="color: indianred;">File size should be less than 1MB</p>
                           <hr>
                       </div>
                   <div class="form-row">

                       <div class="col-sm-4">
                           <label for="psw"><b>Password:</b></label>
                           <input class="input form-control" type="password" size="25" placeholder="Enter one time Password" name="password" id="psw" required>
                       </div>
                       <div class="col-sm-4">
                           <label for="mobile" ><b>Mobile:</b></label>
                           <input class="input form-control" type="text" size="25" placeholder="EG:017********" name="mobile" id="mobile" required>

                       </div>
                       <div class="col-sm-4">
                           <label for="address" ><b>address:</b></label>
                           <input class="input form-control" type="text" size="25" placeholder="Current Address" name="address" id="address" required>

                       </div>
                   </div>
                           <br>
                           <div class="col-sm-6 form-content">

                               <label for="role">Place a job role:</label>
                               <select class="input form-control"  id="role" size="1"  name="role">
                                   <option value="4" disabled>System Administrator</option>
                                   <option value="3" >Data Validator</option>
                                   <option value="2" >IT administrator</option>
                                   <option selected value="1" >Data Entry</option>
                               </select>
                               <hr>
                           </div>

                               <br>
                               <div class="col-sm-6">
                                   <label for="date"><b>Joining Date:</b></label>
                                   <input class="input form-control" type="date" size="25" placeholder="Enter date" name="date" id="role" required>
                                   <hr>
                               </div>
                   <div class="col-sm-12">
                       <label for="ec"><b>Emergency Contact No:</b></label>
                       <input class="input form-control" type="text" placeholder="Contact no" name="ec" id="ec" required>
                       <br>
                       <hr>
                   </div>
                       <p>Please provide all the information and follow <a href="#">Rules and Regulationsy</a>.</p>
                       <button type="submit" class=" btnreg btn btn-success">Register</button>
               <hr>
               </form>
                 </div>
               </div>
             </div>
             <div class="col-md-4">
               <div class="card card-proile">
                 <div class="card-avatar">
                   <a hre="javascript:;">
                     <img class="img" src="img/aces/marc.jpg" />
                   </a>
                 </div>
                 <div class="card-body">
                   <h6 class="card-category text-gray">CEO / Co-ounder</h6>
                   <h4 class="card-title">Alec Thompson</h4>
                   <p class="card-description">
                     Don't be scared o the truth because we need to restart the human oundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                   </p>
                   <a hre="javascript:;" class="btn btn-primary btn-round">ollow</a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <ooter class="ooter">
         <div class="container-luid">
           <nav class="loat-let">
             <ul>
               <li>
                 <a hre="https://www.creative-tim.com">
                   Creative Tim
                 </a>
               </li>
               <li>
                 <a hre="https://creative-tim.com/presentation">
                   About Us
                 </a>
               </li>
               <li>
                 <a hre="http://blog.creative-tim.com">
                   Blog
                 </a>
               </li>
               <li>
                 <a hre="https://www.creative-tim.com/license">
                   Licenses
                 </a>
               </li>
             </ul>
           </nav>
           <div class="copyright loat-right">
             &copy;
             <script>
               document.write(new Date().getullYear())
             </script>, made with <i class="material-icons">avorite</i> by
             <a hre="https://www.creative-tim.com" target="_blank">Creative Tim</a> or a better web.
           </div>
         </div>
       </ooter>
     </div>
   </div>
   <div class="ixed-plugin">
     <div class="dropdown show-dropdown">
       <a hre="#" data-toggle="dropdown">
         <i class="a a-cog a-2x"> </i>
       </a>
       <ul class="dropdown-menu">
         <li class="header-title"> Sidebar ilters</li>
         <li class="adjustments-line">
           <a hre="javascript:void(0)" class="switch-trigger active-color">
             <div class="badge-colors ml-auto mr-auto">
               <span class="badge ilter badge-purple" data-color="purple"></span>
               <span class="badge ilter badge-azure" data-color="azure"></span>
               <span class="badge ilter badge-green" data-color="green"></span>
               <span class="badge ilter badge-warning" data-color="orange"></span>
               <span class="badge ilter badge-danger" data-color="danger"></span>
               <span class="badge ilter badge-rose active" data-color="rose"></span>
             </div>
             <div class="clearix"></div>
           </a>
         </li>
         <li class="header-title">Images</li>
         <li class="active">
           <a class="img-holder switch-trigger" hre="javascript:void(0)">
             <img src="img/sidebar-1.jpg" alt="">
           </a>
         </li>
         <li>
           <a class="img-holder switch-trigger" hre="javascript:void(0)">
             <img src="img/sidebar-2.jpg" alt="">
           </a>
         </li>
         <li>
           <a class="img-holder switch-trigger" hre="javascript:void(0)">
             <img src="img/sidebar-3.jpg" alt="">
           </a>
         </li>
         <li>
           <a class="img-holder switch-trigger" hre="javascript:void(0)">
             <img src="img/sidebar-4.jpg" alt="">
           </a>
         </li>
         <li class="button-container">
           <a hre="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">ree Download</a>
         </li>
         <!-- <li class="header-title">Want more components?</li>
             <li class="button-container">
                 <a hre="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                   Get the pro version
                 </a>
             </li> -->
         <li class="button-container">
           <a hre="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-deault btn-block">
             View Documentation
           </a>
         </li>
         <li class="button-container github-star">
           <a class="github-button" hre="https://github.com/creativetimoicial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
         </li>
         <li class="header-title">Thank you or 95 shares!</li>
         <li class="button-container text-center">
           <button id="twitter" class="btn btn-round btn-twitter"><i class="a a-twitter"></i> &middot; 45</button>
           <button id="acebook" class="btn btn-round btn-acebook"><i class="a a-acebook-"></i> &middot; 50</button>
           <br>
           <br>
         </li>
       </ul>
     </div>
   </div>
   <!--   Core JS iles   -->
   <script src="js/core/jquery.min.js"></script>
   <script src="js/core/popper.min.js"></script>
   <script src="js/core/bootstrap-material-design.min.js"></script>
   <script src="js/plugins/perect-scrollbar.jquery.min.js"></script>
   <!-- Plugin or the momentJs  -->
   <script src="js/plugins/moment.min.js"></script>
   <!--  Plugin or Sweet Alert -->
   <script src="js/plugins/sweetalert2.js"></script>
   <!-- orms Validations Plugin -->
   <script src="js/plugins/jquery.validate.min.js"></script>
   <!-- Plugin or the Wizard, ull documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
   <script src="js/plugins/jquery.bootstrap-wizard.js"></script>
   <!--	Plugin or Select, ull documentation here: http://silviomoreto.github.io/bootstrap-select -->
   <script src="js/plugins/bootstrap-selectpicker.js"></script>
   <!--  Plugin or the DateTimePicker, ull documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
   <script src="js/plugins/bootstrap-datetimepicker.min.js"></script>
   <!--  DataTables.net Plugin, ull documentation here: https://datatables.net/  -->
   <script src="js/plugins/jquery.dataTables.min.js"></script>
   <!--	Plugin or Tags, ull documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
   <script src="js/plugins/bootstrap-tagsinput.js"></script>
   <!-- Plugin or ileupload, ull documentation here: http://www.jasny.net/bootstrap/javascript/#ileinput -->
   <script src="js/plugins/jasny-bootstrap.min.js"></script>
   <!--  ull Calendar Plugin, ull documentation here: https://github.com/ullcalendar/ullcalendar    -->
   <script src="js/plugins/ullcalendar.min.js"></script>
   <!-- Vector Map plugin, ull documentation here: http://jvectormap.com/documentation/ -->
   <script src="js/plugins/jquery-jvectormap.js"></script>
   <!--  Plugin or the Sliders, ull documentation here: http://rereshless.com/nouislider/ -->
   <script src="js/plugins/nouislider.min.js"></script>
   <!-- Include a polyill or ES6 Promises (optional) or IE11, UC Browser and Android browser support SweetAlert -->
   <script src="https://cdnjs.cloudlare.com/ajax/libs/core-js/2.4.1/core.js"></script>
   <!-- Library or adding dinamically elements -->
   <script src="js/plugins/arrive.min.js"></script>
   <!--  Google Maps Plugin    -->
   <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
   <!-- Chartist JS -->
   <script src="js/plugins/chartist.min.js"></script>
   <!--  Notiications Plugin    -->
   <script src="js/plugins/bootstrap-notiy.js"></script>
   <!-- Control Center or Material Dashboard: parallax eects, scripts or the example pages etc -->
   <script src="js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
   <!-- Material Dashboard DEMO methods, don't include it in your project! -->
   <script src="demo/demo.js"></script>
   <script>
     $(document).ready(unction() {
       $().ready(unction() {
         $sidebar = $('.sidebar');

         $sidebar_img_container = $sidebar.ind('.sidebar-background');

         $ull_page = $('.ull-page');

         $sidebar_responsive = $('body > .navbar-collapse');

         window_width = $(window).width();

         ixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

         i (window_width > 767 && ixed_plugin_open == 'Dashboard') {
           i ($('.ixed-plugin .dropdown').hasClass('show-dropdown')) {
             $('.ixed-plugin .dropdown').addClass('open');
           }

         }

         $('.ixed-plugin a').click(unction(event) {
           // Alex i we click on switch, stop propagation o the event, so the dropdown will not be hide, otherwise we set the  section active
           i ($(this).hasClass('switch-trigger')) {
             i (event.stopPropagation) {
               event.stopPropagation();
             } else i (window.event) {
               window.event.cancelBubble = true;
             }
           }
         });

         $('.ixed-plugin .active-color span').click(unction() {
           $ull_page_background = $('.ull-page-background');

           $(this).siblings().removeClass('active');
           $(this).addClass('active');

           var new_color = $(this).data('color');

           i ($sidebar.length != 0) {
             $sidebar.attr('data-color', new_color);
           }

           i ($ull_page.length != 0) {
             $ull_page.attr('ilter-color', new_color);
           }

           i ($sidebar_responsive.length != 0) {
             $sidebar_responsive.attr('data-color', new_color);
           }
         });

         $('.ixed-plugin .background-color .badge').click(unction() {
           $(this).siblings().removeClass('active');
           $(this).addClass('active');

           var new_color = $(this).data('background-color');

           i ($sidebar.length != 0) {
             $sidebar.attr('data-background-color', new_color);
           }
         });

         $('.ixed-plugin .img-holder').click(unction() {
           $ull_page_background = $('.ull-page-background');

           $(this).parent('li').siblings().removeClass('active');
           $(this).parent('li').addClass('active');


           var new_image = $(this).ind("img").attr('src');

           i ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
             $sidebar_img_container.adeOut('ast', unction() {
               $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
               $sidebar_img_container.adeIn('ast');
             });
           }

           i ($ull_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
             var new_image_ull_page = $('.ixed-plugin li.active .img-holder').ind('img').data('src');

             $ull_page_background.adeOut('ast', unction() {
               $ull_page_background.css('background-image', 'url("' + new_image_ull_page + '")');
               $ull_page_background.adeIn('ast');
             });
           }

           i ($('.switch-sidebar-image input:checked').length == 0) {
             var new_image = $('.ixed-plugin li.active .img-holder').ind("img").attr('src');
             var new_image_ull_page = $('.ixed-plugin li.active .img-holder').ind('img').data('src');

             $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
             $ull_page_background.css('background-image', 'url("' + new_image_ull_page + '")');
           }

           i ($sidebar_responsive.length != 0) {
             $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
           }
         });

         $('.switch-sidebar-image input').change(unction() {
           $ull_page_background = $('.ull-page-background');

           $input = $(this);

           i ($input.is(':checked')) {
             i ($sidebar_img_container.length != 0) {
               $sidebar_img_container.adeIn('ast');
               $sidebar.attr('data-image', '#');
             }

             i ($ull_page_background.length != 0) {
               $ull_page_background.adeIn('ast');
               $ull_page.attr('data-image', '#');
             }

             background_image = true;
           } else {
             i ($sidebar_img_container.length != 0) {
               $sidebar.removeAttr('data-image');
               $sidebar_img_container.adeOut('ast');
             }

             i ($ull_page_background.length != 0) {
               $ull_page.removeAttr('data-image', '#');
               $ull_page_background.adeOut('ast');
             }

             background_image = alse;
           }
         });

         $('.switch-sidebar-mini input').change(unction() {
           $body = $('body');

           $input = $(this);

           i (md.misc.sidebar_mini_active == true) {
             $('body').removeClass('sidebar-mini');
             md.misc.sidebar_mini_active = alse;

             $('.sidebar .sidebar-wrapper, .main-panel').perectScrollbar();

           } else {

             $('.sidebar .sidebar-wrapper, .main-panel').perectScrollbar('destroy');

             setTimeout(unction() {
               $('body').addClass('sidebar-mini');

               md.misc.sidebar_mini_active = true;
             }, 300);
           }

           // we simulate the window Resize so the charts will get updated in realtime.
           var simulateWindowResize = setInterval(unction() {
             window.dispatchEvent(new Event('resize'));
           }, 180);

           // we stop the simulation o Window Resize ater the animations are completed
           setTimeout(unction() {
             clearInterval(simulateWindowResize);
           }, 1000);

         });
       });
     });
   </script>
 </body>

 </html>
