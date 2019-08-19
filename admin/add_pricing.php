<?php
 include('session.php');
 if($_SESSION['auth'] == false){
     navigate("index.php");
}

if(isset($_GET["tour_id"])){
    $tour_id = mysqli_real_escape_string($db,$_GET["tour_id"]);
    $sql = 'SELECT * FROM tours WHERE tour_id = '.$tour_id.' ';
    $result = mysqli_query($db, $sql);
      if (mysqli_num_rows($result) > 0)
      {
        $row= mysqli_fetch_assoc($result);
      }


}else {
  // code...
  navigate("index.php");
}



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cabnotels || <?php echo $row["tour_name"]; ?></title>
    <link rel="stylesheet" href="css/sb-admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
  <h1>Add Pricing for || <?php echo $row["tour_name"]; ?></h1>
  <hr>
  <p>Add Pricing for Cabs and Hotel use the tabs for switching between hotel and cabs</p>
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#cabs" role="tab" aria-controls="home" aria-selected="true">CABS</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#hotels" role="tab" aria-controls="profile" aria-selected="false">HOTELS</a>
    </li>

  </ul>

  <div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="cabs" role="tabpanel" aria-labelledby="home-tab">
      <!--Inside-->
      <div class="container">
          <div class="row">
                  <div class="col-12">
                  <table class="table table-striped">
          <thead>
          <tr>
            <th scope="col">S.No.</th>
            <th scope="col">Cab Type</th>
            <th scope="col">Price</th>
            <th scope="col">Tools</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Hatchback AC</td>
            <td id="hatch_price_out" >No Data</td>
            <td>
            <div class="col-12">
                  <div class="row">
                  <div class="col-8">
                  <input type="number" class="form-control" id="hatch_price" min="0" max="1000000" placeholder="Enter Hatchback Price" required>
                  </div>
                  <div class="col-4">
                    <button onclick="save_tour_data(<?php echo $row["tour_id"]; ?>,1)" class="btn btn-primary" >Save</button>

                    <button onclick="update_tour_data(<?php echo $row["tour_id"]; ?>,1)" class="btn btn-info" >Update</button>

                  </div>
                  </div>
              </div>

            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>SEDAN AC</td>
            <td id="sed_price_out" >No Data</td>

            <td>

            <div class="col-12">
                  <div class="row">
                  <div class="col-8">
                  <input type="number" class="form-control" id="sedan_price" min="0" max="1000000" placeholder="Enter Sedan Price" required>

                  </div>
                  <div class="col-4">
                    <button onclick="save_tour_data(<?php echo $row["tour_id"]; ?>,2)" class="btn btn-primary" >Save</button>

                    <button onclick="update_tour_data(<?php echo $row["tour_id"]; ?>,2)" class="btn btn-info" >Update</button>

                  </div>
                  </div>
              </div>

            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>SUV AC</td>
            <td id="suv_price_out" >No Data</td>
            <td>
              <div class="col-12">
                  <div class="row">
                  <div class="col-8">
                  <input type="number" class="form-control" id="suv_price" min="0" max="1000000" placeholder="Enter SUV Price" required>
                  </div>
                  <div class="col-4">
                    <button onclick="save_tour_data(<?php echo $row["tour_id"]; ?>,3)" class="btn btn-primary" >Save</button>

                    <button onclick="update_tour_data(<?php echo $row["tour_id"]; ?>,3)" class="btn btn-info" >Update</button>

                  </div>
                  </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>

      </div>

      </div>
      </div>
      <!--Inside-->
    </div>
    <div class="tab-pane fade" id="hotels" role="tabpanel" aria-labelledby="profile-tab">

      <!--Inside-->
      <div class="container">
          <div class="row">
                  <div class="col-12">
                  <table class="table table-striped">
          <thead>
          <tr>
            <th scope="col">S.No.</th>
            <th scope="col">Hotel Room Type</th>
            <th scope="col">Price</th>
            <th scope="col">Tools</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>2 Star Accomodation</td>
            <td id="two_star_out" >No Data</td>
            <td>
            <div class="col-12">
                  <div class="row">
                  <div class="col-8">
                  <input type="number" class="form-control" id="two_star_price" min="0" max="1000000" placeholder="Enter 2 Star Acc. Price" required>
                  </div>
                  <div class="col-4">
                    <button onclick="save_tour_data_hotel(<?php echo $row["tour_id"]; ?>,2)" class="btn btn-primary" >Save</button>

                    <button onclick="update_tour_data_hotel(<?php echo $row["tour_id"]; ?>,2)" class="btn btn-info" >Update</button>

                  </div>
                  </div>
              </div>

            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>3 Star Accomodation</td>
            <td id="three_star_out" >No Data</td>

            <td>

            <div class="col-12">
                  <div class="row">
                  <div class="col-8">
                  <input type="number" class="form-control" id="three_star_price" min="0" max="1000000" placeholder="Enter 3 Star Acc. Price" required>

                  </div>
                  <div class="col-4">
                    <button onclick="save_tour_data_hotel(<?php echo $row["tour_id"]; ?>,3)" class="btn btn-primary" >Save</button>

                    <button onclick="update_tour_data_hotel(<?php echo $row["tour_id"]; ?>,3)" class="btn btn-info" >Update</button>

                  </div>
                  </div>
              </div>

            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>4 Star Accomodation</td>
            <td id="four_star_out" >No Data</td>
            <td>
              <div class="col-12">
                  <div class="row">
                  <div class="col-8">
                  <input type="number" class="form-control" id="four_star_price" min="0" max="1000000" placeholder="Enter 4 Star Acc. Price" required>
                  </div>
                  <div class="col-4">
                    <button onclick="save_tour_data_hotel(<?php echo $row["tour_id"]; ?>,4)" class="btn btn-primary" >Save</button>

                    <button onclick="update_tour_data_hotel(<?php echo $row["tour_id"]; ?>,4)" class="btn btn-info" >Update</button>

                  </div>
                  </div>
              </div>
            </td>
          </tr>

          <tr>
            <th scope="row">4</th>
            <td>5 Star Accomodation</td>
            <td id="five_star_out" >No Data</td>
            <td>
              <div class="col-12">
                  <div class="row">
                  <div class="col-8">
                  <input type="number" class="form-control" id="five_star_price" min="0" max="1000000" placeholder="Enter 5 Star Acc. Price" required>
                  </div>
                  <div class="col-4">
                    <button onclick="save_tour_data_hotel(<?php echo $row["tour_id"]; ?>,5)" class="btn btn-primary" >Save</button>

                    <button onclick="update_tour_data_hotel(<?php echo $row["tour_id"]; ?>,5)" class="btn btn-info" >Update</button>

                  </div>
                  </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>

      </div>

      </div>
      </div>
      <!--Inside-->


    </div>
  </div>

</div>







<script>
//////////////////CAB/////////////////////////////////////
function save_tour_data(tour_id,type) {

    console.log("tour_id=>"+ tour_id);
    console.log("type=>"+ type);

    if (type == 1) {
        var price =  document.getElementById('hatch_price').value;
    }else if (type == 2) {
        var price = document.getElementById('sedan_price').value;
    }else if (type == 3) {
        var price =  document.getElementById('suv_price').value;
    }

      $.ajax({
            type: "POST",
            url: "add_cab_price_tour.php",
            data: {
              tour_id: tour_id,
              price : price,
              type : type,
            },
            dataType: 'JSON',
            success: function(response) {
              if (response == 0) {
                alert("Data already present, Please use update");
              }else if(response == 1) {
                alert("Sucess");
              }else {
                alert("Err");
              }
            }
        });

update_all();
}

function update_tour_data(tour_id,type) {

    console.log("tour_id=>"+ tour_id);
    console.log("type=>"+ type);

    if (type == 1) {
        var price =  document.getElementById('hatch_price').value;
    }else if (type == 2) {
        var price = document.getElementById('sedan_price').value;
    }else if (type == 3) {
        var price =  document.getElementById('suv_price').value;
    }


      $.ajax({
            type: "POST",
            url: "update_cab_price_tour.php",
            data: {
              tour_id: tour_id,
              price : price,
              type : type,
            },
            dataType: 'JSON',
            success: function(response) {
              if (response == 0) {
                alert("No Data, Please use Save");
              }else if(response == 1) {
                alert("Sucess");
              }else {
                alert("Err");
              }
            }
        });

update_all();
}

      /////////////////////////////FETCHING DATA////////////////////////////////
      function get_hatch_price(){

        $.ajax({
              type: "POST",
              url: "get_hatch_price.php",
              data: {
                tour_id: <?php echo $row["tour_id"]; ?>,
                type : 1,
              },
              dataType: 'JSON',
              success: function(response) {
                document.getElementById("hatch_price_out").innerHTML = response;
              }
          });
      }

      function get_sedan_price(){
        $.ajax({
              type: "POST",
              url: "get_hatch_price.php",
              data: {
                tour_id: <?php echo $row["tour_id"]; ?>,
                type : 2,
              },
              dataType: 'JSON',
              success: function(response) {
                document.getElementById("sed_price_out").innerHTML = response;

              }
          });

      }

      function get_suv_price(){

        $.ajax({
              type: "POST",
              url: "get_hatch_price.php",
              data: {
                tour_id: <?php echo $row["tour_id"]; ?>,
                type : 3,
              },
              dataType: 'JSON',
              success: function(response) {
                document.getElementById("suv_price_out").innerHTML = response;
              }
          });

      }

      update_all();
      function update_all(){
        get_hatch_price();
        get_sedan_price();
        get_suv_price();
      }
      /////////////////////////////FETCHING DATA////////////////////////////////

//////////////////CAB/////////////////////////////////////




//////////////////HOTLEL/////////////////////////////////////
function save_tour_data_hotel(tour_id,type) {

    console.log("tour_id=>"+ tour_id);
    console.log("type=>"+ type);

    if (type == 2)       {
        var price =  document.getElementById('two_star_price').value;
    }else if (type == 3) {
        var price = document.getElementById('three_star_price').value;
    }else if (type == 4) {
        var price =  document.getElementById('four_star_price').value;
    }else if (type == 5) {
        var price =  document.getElementById('five_star_price').value;
    }


      console.log("2star_price=>" + document.getElementById('two_star_price').value);
      $.ajax({
            type: "POST",
            url: "add_hotel_price_tour.php",
            data: {
              tour_id: tour_id,
              price : price,
              type : type,
            },
            dataType: 'JSON',
            success: function(response) {
              if (response == 0) {
                alert("Data already present, Please use update");
              }else if(response == 1) {
                alert("Sucess");
              }else {
                alert("Err");
              }
            }
        });

  update_all_hotel();
}

function update_tour_data_hotel(tour_id,type) {

    console.log("tour_id=>"+ tour_id);
    console.log("type=>"+ type);

    if (type == 2)       {
        var price =  document.getElementById('two_star_price').value;
    }else if (type == 3) {
        var price = document.getElementById('three_star_price').value;
    }else if (type == 4) {
        var price =  document.getElementById('four_star_price').value;
    }else if (type == 5) {
        var price =  document.getElementById('five_star_price').value;
    }


      console.log("2star_price=>" + document.getElementById('two_star_price').value);
      $.ajax({
            type: "POST",
            url: "update_hotel_price_tour.php",
            data: {
              tour_id: tour_id,
              price : price,
              type : type,
            },
            dataType: 'JSON',
            success: function(response) {
              if (response == 0) {
                alert("Data already present, Please use update");
              }else if(response == 1) {
                alert("Sucess");
              }else {
                alert("Err");
              }
            }
        });
  update_all_hotel();
}

  //////FETCHING DATA//////
  function get_two_star_price(){

    $.ajax({
          type: "POST",
          url: "get_star_price.php",
          data: {
            tour_id: <?php echo $row["tour_id"]; ?>,
            type : 2,
          },
          dataType: 'JSON',
          success: function(response) {
            document.getElementById("two_star_out").innerHTML = response;
          }
      });
  }
  function get_three_star_price(){

    $.ajax({
          type: "POST",
          url: "get_star_price.php",
          data: {
            tour_id: <?php echo $row["tour_id"]; ?>,
            type : 3,
          },
          dataType: 'JSON',
          success: function(response) {
            document.getElementById("three_star_out").innerHTML = response;
          }
      });
  }
  function get_four_star_price(){

    $.ajax({
          type: "POST",
          url: "get_star_price.php",
          data: {
            tour_id: <?php echo $row["tour_id"]; ?>,
            type : 4,
          },
          dataType: 'JSON',
          success: function(response) {
            document.getElementById("four_star_out").innerHTML = response;
          }
      });
  }
  function get_five_star_price(){

    $.ajax({
          type: "POST",
          url: "get_star_price.php",
          data: {
            tour_id: <?php echo $row["tour_id"]; ?>,
            type : 5,
          },
          dataType: 'JSON',
          success: function(response) {
            document.getElementById("five_star_out").innerHTML = response;
          }
      });
  }

  update_all_hotel();

  function update_all_hotel(){
    get_two_star_price();
    get_three_star_price();
    get_four_star_price();
    get_five_star_price();
  }
  //////FETCHING DATA//////
//////////////////Hotel/////////////////////////////////////





</script>

</body>
</html>
