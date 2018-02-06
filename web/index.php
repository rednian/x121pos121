<?php require_once 'php/config.php'; ?>
<?php 
    $proprietor = "SELECT * FROM about_more_title WHERE title = 'the proprietor' LIMIT 1";
    $proprietor_result = $conn->query($proprietor);

    $our_Services = "SELECT * FROM about_more_title WHERE title = 'Our Services' LIMIT 1";
    $our_services_result =  $conn->query($our_Services);


    $our_product = "SELECT * FROM about_more_title WHERE title = 'Our products' LIMIT 1";
    $our_product_result =  $conn->query($our_product);


    $products_count = "SELECT * FROM product_main_info, pricing, barcode, product_type
        WHERE product_main_info.prod_id = barcode.prod_id
        AND barcode.bc_id = pricing.bc_id
        AND product_main_info.prod_type_id = product_type.prod_type_id
         AND product_main_info.on_delete IS NULL
        AND product_main_info.`view` = 1";


  $product_result = $conn->query($products_count);

  $product_total_rows = $product_result->num_rows;
  $product_total_pages = ceil($product_total_rows/2);


   $service_count = "SELECT * FROM service_info, availability_status, pricing
                      WHERE service_info.service_info_id = pricing.service_info_id
                      AND service_info.service_info_id = availability_status.service_info_id
                      AND availability_status.`status` = 'available'
                      AND service_info.`view` = 1
                      ";
  $service_result = $conn->query($service_count);

  $service_total_rows = $service_result->num_rows;
  $service_total_pages = ceil($service_total_rows/2);




 ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title>Sochic - Hair and beauty Salon</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/templatemo_misc.css">
  <link rel="stylesheet" href="css/templatemo_style.css">
<!--   <link href="../assets/validation/css/formValidation.min.css" rel="stylesheet">
  <link href="../assets/js/notify/pnotify.custom.min.css" rel="stylesheet"> -->
  <link href="slider/thumbnail-slider.css" rel="stylesheet">

  <link rel="stylesheet" href="css/custom.css">
        <script src="js/vendor/jquery-1.11.0.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
  <style>
      body {font: normal 0.9em Arial;color:#ddd;}
      header {display:block; font-size:1.2em;margin-bottom:100px;}
      header a, header span {
          display: inline-block;
          padding: 4px 8px;
          margin-right: 10px;
          border: 2px solid #000;
          background: #DDD;
          color: #000;
          text-decoration: none;
          text-align: center;
          height: 20px;
      }
      header span {background:white;}
      a {color:#7fa9fe;}
  </style>

  <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
  <script src="slider/thumbnail-slider.js"></script>

</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->


<div class="site-main" id="sTop">
  <div class="site-header">
    <!-- <div class="container">
    <div class="row">
    <div class="col-md-12 text-center">
    <ul class="social-icons">
    <li><a href="#" class="fa fa-facebook"></a></li>
    <li><a href="#" class="fa fa-twitter"></a></li>
    <li><a href="#" class="fa fa-dribbble"></a></li>
    <li><a href="#" class="fa fa-linkedin"></a></li>
    </ul>
    </div> <!-- /.col-md-12 -->
<!--  </div> <!-- /.row -->
<!--</div> --> <!-- /.container -->
    <div class="main-header">
      <div class="container">
        <div id="menu-wrapper">
          <div class="row">

        <div class="col-md-9 col-sm-9 main-menu text-right">
          <div class="toggle-menu visible-sm visible-xs"><i class="fa fa-bars"></i></div>
          <ul class="menu-first">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#services">Products</a></li>
            <li><a href="#portfolio">Services </a></li>
            <li><a href="#our-team">About Us</a></li>
            <li><a href="#contact">Contact &amp; Location</a></li>
          </ul>
        </div> <!-- /.main-menu -->
      </div> <!-- /.row -->
    </div> <!-- /#menu-wrapper -->
  </div> <!-- /.container -->
</div> <!-- /.main-header -->


</div> <!-- /.site-header -->

<div class="site-slider">
                <div class="slider">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <div class="overlay"></div>
                                <img src="images/bg.fw.png" alt="">
                                <div class="slider-caption visible-md visible-lg">
                                    <h2 class="text-white">Our Products</h2>
                             <?php 
                                if($our_product_result->num_rows > 0){
                                    while ($row = $our_product_result->fetch_array()) { ?>
                                        <p class="text-white" style="text-transform:lowercase"><?php echo ucfirst($row['description']); ?></p>
                            <?php  
                                    }
                                }
                             ?>
                                </div>
                            </li>
                            <li>
                                <div class="overlay"></div>
                                <img src="images/bg2.fw.png" alt="">
                                <div class="slider-caption visible-md visible-lg">
                                    <h2 class="text-white">Our Services</h2>
                                    <?php 
                                       if($our_services_result->num_rows > 0){
                                           while ($row = $our_services_result->fetch_array()) { ?>
                                               <p  class="text-white" style="text-transform:lowercase"><?php echo ucfirst($row['description']); ?></p>
                                   <?php  
                                           }
                                       }
                                    ?>
                                </div>
                            </li>
                            <li>
                                <div class="overlay"></div>
                                <img src="images/bg3.fw.png" alt="">
                                <div class="slider-caption visible-md visible-lg">
                                    <h2 class="text-white">Our Team</h2>
                                 <?php 
                                     if($proprietor_result->num_rows > 0){
                                         while ($row = $proprietor_result->fetch_array()) { ?>
                                             <p class="text-white" style="text-transform:lowercase"><?php echo ucfirst($row['description']); ?></p>
                                 <?php  
                                         }
                                     }
                                  ?>
                                    <!-- <a href="#" class="slider-btn">Mobile Website</a> -->
                                </div>
                            </li>
                        </ul>
                    </div> <!-- /.flexslider -->
                </div> <!-- /.slider -->
            </div> <!-- /.site-slider -->
        </div> <!-- /.site-main -->


        <div class="content-section" id="services">
            <div class="container">
                
                <section class="row">
                    <div class="heading-section col-md-12 text-center">
                        <h2 class="text-white">Our Products</h2>
                    </div> 
                </section>

                <section class="row" style="margin-top:3%">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- <h3 class="text-white">Facial Products</h3> -->
                <!--     <?php 
                    $sql = "SELECT * FROM product_type WHERE prod_type = 'facial products'LIMIT 1";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        while ($row = $result->fetch_array()) {
                          echo '<p class="text-white" style="font-size:15px;">'.htmlspecialchars(ucfirst($row['prod_type_desc'])).'</p>';
                        }
                     
                    }
                    ?> -->
                    <section class="row">
                      <div class="col-md-12">
                        
                        <div id="product-content"></div>
                        <div class="row">
                          <div class="col-md-12 text-center">
                           <div id="product-paginate"></div>
                          </div>
                        </div>
                      

                      </div>
                    </section>
    
<!--                     <button class="btn btn-warning btn-sm pull-right" style="margin-bottom: 2%"> view more products <span class="fa fa-angle-double-right"></span></button>
 -->              
                  </div>  
                </section>

      

                </div> <!-- /.row -->
            </div> <!-- /.container -->
 



        <div class="content-section" id="portfolio">
            <div class="container">
                
                <section class="row">
                    <div class="heading-section col-md-12 text-center">
                        <h2 class="text-white">Our Services</h2>
                        
                  
                    </div> 
                </section> 
                 <section class="row">
                      <div class="col-md-12">
                        
                        <div id="service-content"></div>
                        <div class="row">
                          <div class="col-md-12 text-center">
                           <div id="service-paginate"></div>
                          </div>
                        </div>
                      

                      </div>
                    </section>

               

            </div> <!-- /.container -->
        </div> <!-- /#portfolio -->

        <!-- about us section -->
        <section class="content-section" id="our-team">
          <section class="container">
           
            <section class="row">
              <div class="heading-section col-md-12 text-center">
                 <h2 class="text-white">About Us</h2>
              </div>
            </section>

            <section class="row">
              <div class="col-md-8 col-sm-8 col-xs-12">
                <section class="panel">
                  <div class="panel-heading">
                    <h2 class="text-center text-white panel-title">The Proprietor</h2>
                  </div>
                  <div class="panel-body">
                    <?php 
                      $sql = "SELECT * FROM about_more_title WHERE title = 'the proprietor'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0){
                        while($row = $result->fetch_array()){
                           echo '<p class="text-left">'.htmlspecialchars(ucfirst($row['description'])).'</p>'; 
                        }
                      }
                     ?>
                  </div>
                </section>
              </div>
              <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="team-member">
                  <div style="position:relative; " class="hidden-xs hidden-sm ">
                    <img style="position:absolute;" src="images/about/img-bg.png">
                    <?php 
                      
                      $sql =" SELECT * FROM about_more_images, about_more_title
                              WHERE about_more_images.t_id = about_more_title.t_id
                              AND title = 'the proprietor'
                          ";

                      $result = $conn->query($sql);

                      if($result->num_rows > 0 ){
                        while($row = $result->fetch_array()){ ?>
                          <img class="img-responsive" style="margin-left: 6.5%; height: 465px; width:100%; border-radius: 100% / 90%" src="<?php echo '../uploads/'.$row['image']; ?>" alt="">
                      <?php 
                         }
                      }

                     ?>
                  </div>
                </div>
              </div>
            </section>

            <section class="row" style="margin-top:-10%;">
               <div class="col-md-8 col-sm-8 col-xs-12">
                 <section class="panel">
                   <div class="panel-heading">
                     <h2 class="panel-title text-white text-center">Our Team</h2>
                   </div>
                   <div class="panel-body">
                     <?php 
                      
                      $sql = "SELECT * FROM about_more_title WHERE title = 'Our Team'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0 ){
                         while($row = $result->fetch_array()){ ?>
                               <p class="text-left"><?php echo htmlspecialchars(ucfirst($row['description'])); ?></p>
                     <?php    }
                      }
                      ?>

                   </div>
                 </section>
               </div>
            </section>

            <!-- image of our team -->
            <section class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <?php 
                   $sql = "
                         SELECT * FROM about_more_images, about_more_title
                         WHERE about_more_images.t_id = about_more_title.t_id
                         AND title = 'our team' LIMIT 4
                         ";
                   
                   $result = $conn->query($sql);

                   if($result->num_rows > 0){
                       while ($row = $result->fetch_array()) { ?>
                         <div class="team-member col-md-3 col-sm-6">
                             <div class="member-thumb">
                                 <img class="img-circle" src="<?php echo '../uploads/'.$row['image']; ?>" alt="">
                                  <!-- /.team-overlay -->
                             </div> <!-- /.member-thumb -->
                         </div>

                      <?php }
                   }


                 ?>
              </div>
            </section>

            <!-- our customer -->
            <!-- <section class="row">
              <div class="col-md-8 col-sm-8 col-xs-12">
                <section class="panel">
                  <div class="panel-heading">
                    <h2 class="panel-title text-white text-center">Our Team</h2>
                  </div>
                  <div class="panel-body">
                    <?php 
                     
                     $query = "SELECT * FROM about_more_title WHERE title = 'Our customers'";
                     $results = $conn->query($query);
                     if($results->num_rows > 0 ){
                        while($row = $results->fetch_array()){ ?>
                          <?php print_r($row);?>
                              <p class="text-left"><?php echo htmlspecialchars(ucfirst($row['description'])); ?></p>
                    <?php    }
                     }
                     ?>

                  </div>
                </section>
              </div>
            </section> -->

            <!-- <section class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <?php 
                   $sql = "
                         SELECT * FROM about_more_images, about_more_title
                         WHERE about_more_images.t_id = about_more_title.t_id
                         AND title = 'our customers' LIMIT 4
                         ";
                   
                   $result = $conn->query($sql);

                   if($result->num_rows > 0){
                       while ($row = $result->fetch_array()) { ?>
                         <div class="team-member col-md-3 col-sm-6">
                             <div class="member-thumb">
                                 <img class="img-circle" src="<?php echo '../uploads/'.$row['image']; ?>" alt="">
                                  <!-- /.team-overlay -->
                             </div> <!-- /.member-thumb -->
                         </div>

                      <?php }
                   }


                 ?>
              </div>
            </section> -->

          </section>
        </section>


        <div class="content-section" id="contact">
            <div class="container">
                <div class="row">
                    <div class="heading-section col-md-12 text-center">
                        <h2 class="text-white">Contact &amp; Location</h2>
                        <p class="text-white">Send a message to us</p>
                    </div> <!-- /.heading-section -->
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                       <div class="googlemap-wrapper">
                            <div id="map_canvas" class="map-canvas"></div>
                        </div> <!-- /.googlemap-wrapper -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-7 col-sm-6">
                    <section class="panel">
                      <div class="panel-heading">
                        <h3 class="text-center panel-title text-white">Company History</h3>
                      </div>
                      <div class="panel-body">
                        <p style=" text-indent: 30px;">
                          The salon was established on <strong>February 8, 2015</strong>. It was named "So chic Salon" because the owner, <br/><strong>Mrs. Geraldine Ordaniel</strong>,
                           wants her personality to reflect on the aura and environment of her business. She decided to name it "So Chic" because she loves girly concept and ideas.
                        </p>
                        <p style=" text-indent: 30px;">
                          The design of the salon, including the furnitures, are personally designed by her. She used light and pastel colors that expresses the "chic side" or the common impression of women. The design appears like an exclusive salon for women since it is basically inspired by a women's perpective in the first place.
                        </p>
                        <p style=" text-indent: 30px;">
                          One of the most struggling stage was on how to bulid her business here in Davao City most specially when she was based in General Santos City. Before deciding to have her business in Davao, she stayed five years in the city, trying to get information and data about what are common preferences of Davaoenas and trying to figure out if the salon will really be a good business to establish.   
                        </p>
                        <p style=" text-indent: 30px;">
                          Because of her hardwork and te effort of her staff, the salon bacame stable and is continuosly operating.
                        </p>
                          <ul class="contact-info" style="color:#fff">
                              <!-- <li>Phone: 033-033-0660</li> -->
                              <!-- <li>Email: <a href="mailto:info@company.com">info@company.com</a></li> -->
                              <li><strong class="text-white">Address: <span >Jfive Bldg, Palma Gil Street, Brgy. Obrero, Davao City</span></strong></li>
                              <li><strong class="text-white">Store Open: <span >Monday - Sunday, 9AM - 10PM</span></strong></li>
                          </ul>
                      </div>
                    </section>
                 
                   
                        <!-- spacing for mobile viewing --><br><br>
                    </div> <!-- /.col-md-7 -->
                  <div class="col-md-5 col-sm-6">
                    <div class="contact-form">
                      <form method="post" name="contactform" id="contactform" action="web_php.php">
                              
                        <div class="form-group">
                          <input class="form-control" name="name" type="text" id="name" placeholder="Your Name" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <input class="form-control" name="email" type="text" id="email" placeholder="Your Email" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <input class="form-control" name="subject" type="text" id="subject" placeholder="Subject" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <textarea class="form-control" name="comments" id="comments" placeholder="Message" autocomplete="off"></textarea>
                        </div>
                        <div class="form-group">
                          <input type="submit" class="mainBtn" id="submit" value="Send Message" autocomplete="off">
                        </div>
                        </div> <!-- /.contact-form -->
                    </div> <!-- /.col-md-5 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /#contact -->
            
        <div id="footer">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-xs-12 text-left">
                <span>Copyright &copy; <?php echo date('Y'); ?> Sochic</span>
              </div> <!-- /.text-center -->
              <div class="col-md-4 hidden-xs text-right">
                <a href="#top" id="go-top">Back to top</a>
              </div> <!-- /.text-center -->
            </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /#footer -->



        <!-- Google Map -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="js/vendor/jquery.gmap3.min.js"></script>
        <script src="js/bootstrap-pagination/bootstrap_pagination.js"></script>
        <script src="../assets/plugins/validation/js/formValidation.min.js"></script>
        <script src="../assets/plugins//validation/js/framework/bootstrap.min.js"></script>
        <script src="../assets/plugins/notify/pnotify.custom.min.js"></script>

        
        <!-- Google Map Init-->
        <script type="text/javascript">
            jQuery(function($){
                $('#map_canv  as').gmap3({
                    marker:{ 
                        address: '7.069362, 125.60981' 
                    },
                        map:{
                        options:{
                        zoom: 15,
                        scrollwheel: false,
                        streetViewControl : true
                        }
                    }
                });

                /* Simulate hover on iPad
                 * http://stackoverflow.com/questions/2851663/how-do-i-simulate-a-hover-with-a-touch-in-touch-enabled-browsers
                 --------------------------------------------------------------------------------------------------------------*/ 
                $('body').bind('touchstart', function() {});
            });
        </script>
        
    <script type="text/javascript">
      $(document).ready(function(){


        // services
        // var service_page = '<?php  echo $service_total_rows ?>';
        // if(service_page < 8){
        //   $('#service-paginate').hide();
        // }
        // else{
        //      $('#service-paginate').show();
        // }

        $("#service-content").load("php/services.php");  //initial page number to load
           $("#service-paginate").bootpag({
              total: <?php echo $service_total_pages; ?>, // total number of pages
              page: 1, //initial page
              maxVisible: 5 //maximum visible links
           }).on("page", function(e, num){
               e.preventDefault();
               // $("#results").prepend('<div class="loading-indication"><img src="ajax-loader.gif" /> Loading...</div>');
               $("#service-content").load("php/services.php", {'page':num});
           });


        // products
        var product_page = '<?php echo $product_total_rows; ?>';

        console.log(product_page);

        if(product_page > 5){
          $('#product-paginate').show();
        }
        else{
           $('#product-paginate').hide();
        }

        $("#product-content").load("php/products.php");  //initial page number to load
           $("#product-paginate").bootpag({
              total: <?php echo $product_total_pages; ?>, // total number of pages
              // page: 1, //initial page
              // maxVisible: 5 //maximum visible links
           }).on("page", function(e, num){
               e.preventDefault();
               // $("#results").prepend('<div class="loading-indication"><img src="ajax-loader.gif" /> Loading...</div>');
               $("#product-content").load("php/products.php", {'page':num});
           });

      });


      $(document).ready(function(){



        
        

          $('#contactform').formValidation({
            message: 'This value is not valid',
            //live: 'disabled',
            icon: {
        //        valid: 'glyphicon glyphicon-ok',
        //        invalid: 'glyphicon glyphicon-remove',
              validating: 'fa fa-refresh fa-spin'
            },
            fields: {
              name: {
                message: 'The name is not valid',
                validators: {
                  notEmpty: {
                    message: 'The name is required and cannot be empty'
                  },
                  stringLength: {
                    min: 2,
                    message: 'The name must be more than 5 and less than 20 characters long'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z0-9\s\ñ\Ñ]+$/,
                    message: 'The name must only consist of alphabetical'
                  }
                }
              },
              email: {
                message: 'The email is not valid',
                validators: {
                  notEmpty: {
                    message: 'The email is required and cannot be empty'
                  },
                  emailAddress: {
                   message: 'The input is not a valid email address'
                           },
                  stringLength: {
                    min: 2,
                    message: 'The email must be more than 5 and less than 20 characters long'
                  },
                 
                }
              },
              subject: {
                message: 'The subject is not valid',
                validators: {
                  notEmpty: {
                    message: 'The subject is required and cannot be empty'
                  },
                  stringLength: {
                    min: 2,
                    message: 'The subject must be more than 5 and less than 20 characters long'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z0-9\s\ñ\Ñ]+$/,
                    message: 'The subject must only consist of alphabetical'
                  },
                 
                }
              },
              comments: {
                message: 'The comments is not valid',
                validators: {
                  notEmpty: {
                    message: 'The comments is required and cannot be empty'
                  },
                  stringLength: {
                    min: 2,
                    message: 'The comments must be more than 5 and less than 20 characters long'
                  },
                regexp: {
                    regexp: /^[a-zA-Z0-9\s\ñ\Ñ]+$/,
                    message: 'The comments must only consist of alphabetical'
                  },
                 
                }
              },
              
          
         
            }/*end of fields*/
          }).on('success.form.fv', function (e) {

            e.preventDefault();
            var $form = $(e.target);

            $.ajax({
              url: $(this).attr('action'),
              data: $(this).serialize(),
              type: 'POST',
              dataType: 'html',
              success: function (data) {
                if (data == 1) {
                  new PNotify({
                    // title: 'Account',
                    text: 'Information successfully sent.',
                    type: 'success',
                    icon: false
                  });

                  $form
                    .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
                    .formValidation('resetForm', true);

                }
                else {
                  new PNotify({
                    // title: 'Account',
                    text: 'Failed to create. Account. Please check your network connection.',
                    type: 'error',
                    icon: false
                  });
                }

                // Reset the form
              }

            });
          });

      });
    </script>
    </body>
</html>