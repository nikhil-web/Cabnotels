<?php
 include('session.php');
 $login_flag = 0;
 if($_SESSION['auth'] == false){
   $login_flag = 0;
   header("location:login.php");
}else{
  $login_flag = 1;
}

?>
<html lang="en"><head>
    <title>Cabnotels | Search </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="msapplication-TileColor" content="#ffdd00">
    <meta name="msapplication-TileImage" content="ms-icon-144x144.png">
    <meta name="theme-color" content="#ffdd00">

    <!-- css files -->
    <link rel="stylesheet" href="css/cart_style.css">
    <link rel="stylesheet" href="css/cart_style_one.css"> <!-- custom css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!--css files -->

    <!--Script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--Script-->

    <style>

      .center {
            margin: auto;
            margin-top: 10px;
        }

        .d-flex {
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            display: flex !important;
            width: min-content;
            left: 50%;
            position: relative;
            transform: translateX(-50%);
        }

        .middle {
            position: relative;
            left: 50%;
            transform: translateX(-50%);
        }

        .tittle {
            color: #ffdd00;
        }

        /*search box css start here*/
        .search-sec {
            padding: 2rem;
        }

        .search-slt {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: none;
            border-radius: 0px;
            height: calc(3rem + 2px) !important;
        }

        .wrn-btn {
            width: 100%;
            font-size: 16px;
            font-weight: 400;
            text-transform: capitalize;
            height: calc(2.5rem + 2px) !important;
            border-radius: 0;
        }

        @media (min-width: 992px) {
            .search-sec {
                position: relative;
                background: #ffdd00;
                height: auto;
            }
        }

        @media (max-width: 992px) {
            .search-sec {
                background: #ffdd00;
            }
        }

    </style>

</head>

<body>

  <!-- header -->
  <header id="navbar_color">
    <div class="container">
      <!-- nav -->
      <nav class="py-md-3 py-3 d-lg-flex">
        <div id="logo">
          <a href="index.php">  <div style="width: 100px;"><img style="width:inherit;" src="images/logo.png" alt=""> </div>  </a>
        </div>
        <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
        <input type="checkbox" id="drop">
        <ul class="menu ml-auto mt-3">
          <li class="active"><a id="nav_links" href="index.php">Home</a></li>
          <li class=""><a href="about.php">About Us</a></li>
          <li class=""><a href="contact.php">Contact</a></li>
          <li class=""><a href="index.php#pakages">Tours</a></li>
          <li class=""><a href="hotels.php?mode=navbar">Hotels</a></li>
          <li class=""><a href="index.php#taxi">Cars</a></li>

          <?php
            if ($login_flag == 1) {
              // code...
              echo '
                <li class="booking"><a href="user.php">'.$_SESSION["first_name"].' <i class="fas fa-user"></i></a></li>
              ';
            }else {
              // code...
              echo '
              <li class="booking"><a href="#booking">Book Now</a></li>
              ';
            }

           ?>

        </ul>
      </nav>
      <!-- //nav -->
    </div>
  </header>
  <!-- //header -->

<section id="content">
<div class="px-4 px-lg-0">
  <div class="p-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 p-lg-5 bg-white mb-5">
          <!-- Shopping cart table -->
          <div class="table-responsive">
          <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Item</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Details</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody id="big_cart">



              </tbody>
            </table>
          </div>

        </div>
            <!-- End -->

        <div class="col-lg-4  p-lg-5 bg-white mb-5">
          <div class="col-lg-12">
            <div class="bg-light px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
            <div class="py-4">

              <ul id="mini_cart" class="list-unstyled mb-4">


              </ul>

              <p class="font-italic mb-4">Tax and other details</p>
              <button href="#" class="btn btn-dark py-2 btn-block">Procceed to checkout</button>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="bg-light   px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
            <div class="py-4">
              <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>

              <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">

              <button href="#" class="btn btn-dark mt-3  py-2 btn-block">Procceed to checkout</button>

          </div>
            <div class="bg-light   px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
            <div class="py-4">
              <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
              <textarea name="" cols="30" rows="2" class="form-control"></textarea>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</section>


<!-- Modal -->
<div class="modal fade" id="modelformessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2 id="status_message"></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<?php include 'includes\footer.php'; ?>

<script>
  $(function() {
    //caches a jQuery object containing the header element
    var header = $("#navbar_color");
    $(window).scroll(function() {


      var scroll = $(window).scrollTop();
      //console.log(scroll);
      var req_height = screen.availHeight;
      //console.log(req_height);
      var req_height_change = (req_height * 0.1);
      if (scroll >= req_height_change) {
        header.removeClass("clearHeader").addClass("darkHeader");
      } else {
        header.removeClass("darkHeader").addClass("clearHeader");
      }
    });
  });

  function delete_cart_item(id) {

      $.ajax({
          type: "POST",
          url: "delete-cart.php",
          data: {
              parameter: id
          },
          dataType: 'JSON',
          success: function(response) {
              if (response == 1) {
                  console.log(response);
                  update_staus_success("Deleted Sucessfully")
              }else{
                  console.log(response);
                  update_staus_error("Somthing Happend")
              }
          }
      });
  }

  //utility functions
  function update_staus_error(message) {
    $('#modelformessage').modal({
        keyboard: true
    });
      document.getElementById('status_message').innerHTML = message;
      $("#status_message").addClass("dangerclass");

  }

  function update_staus_success(message) {
    $('#modelformessage').modal({
        keyboard: true
    });
      document.getElementById('status_message').innerHTML = message;
      $("#status_message").removeClass("dangerclass")
      update_cart_mini();
      update_cart_big();
  }

update_cart_mini();
update_cart_big();


  function update_cart_mini() {
         $.ajax({
             type: "POST",
             url: "populate-cart-mini.php",
             data: {
                 l_loc: 'dummy',
             },
             dataType: 'JSON',
             success: function(response_location_small) {
                 document.getElementById("mini_cart").innerHTML = response_location_small;
             }
         });
     }


       function update_cart_big() {
              $.ajax({
                  type: "POST",
                  url: "populate-cart-big.php",
                  data: {
                      l_loc: 'dummy',
                  },
                  dataType: 'JSON',
                  success: function(response_location_big) {
                      document.getElementById("big_cart").innerHTML = response_location_big;
                  }
              });
          }
</script>

</body></html>
