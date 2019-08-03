<!-- Search -->
<section id="booking" class="book search-sec">
  <div  style="z-index: 9;" data-aos="zoom-in" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="container py-lg-5 py-sm-3 col-xl-10 col-lg-12 col-sm-12 mb-3">
    <h2 class="heading text-capitalize text-center" style="color:#ffdd00;">Lets Go.</h2>

    <div class=" mt-5 text-center">
      <ul class="nav nav-tabs justify-content-center nav-fill" id="myTab" role="tablist">

        <li class="nav-item">
          <a class="nav-link active show" id="hotels-tab" data-toggle="tab" href="#hotels" role="tab" aria-controls="hotels" aria-selected="true" aria-expanded="true"> <i class="fas fa-hotel"></i> Hotels</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="tours-tab" data-toggle="tab" href="#tours" role="tab" aria-controls="tours" aria-selected="false" aria-expanded="true"> <i class="fas fa-suitcase-rolling"></i> Tours</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="cars-tab" data-toggle="tab" href="#cars" role="tab" aria-controls="cars" aria-selected="false" aria-expanded="false"> <i class="fas fa-car"></i> Car Rents</a>
        </li>

      </ul>

      <div class="tab-content" id="myTabContent">
        <!--Hotels-->
        <div class="tab-pane fade m-3 active show" id="hotels" role="tabpanel" aria-labelledby="hotels-tab" aria-expanded="true">
            <div class="container py-md-3">
                <div class="">
                  <h5 class="tittle">Book Hotels</h5>
                </div>
            </div>
          <form id="hotel_search_form" >
            <div class="row">
              <div class="col-lg-12">
                <div class="row">

                  <div class="col-lg-2 col-md-2 col-sm-12 p-1">
                      <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                          <p>Where?</p>
                      </label>
                      <select id="location" name="location" class="form-control" placeholder="Pickup Location" aria-placeholder="Enter the pickup loaction">
                        <option value='0'>Select..</option>
                        <?php
                                                 $sql = 'SELECT * FROM locations ORDER BY loc_name ASC';
                                                 $result = mysqli_query($db, $sql);
                                                  if (mysqli_num_rows($result) > 0) {
                                                     // output data of each row
                                                    while($row= mysqli_fetch_assoc($result)) {
                                                      echo ' <option>'.$row["loc_name"].'</option>';
                                                  }
                                                }
                                        ?>
                      </select>
                  </div>

                  <div class="col-lg-2 col-md-2 col-sm-12 p-1">
                    <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                      <p>Check In</p>
                    </label>
                    <input type="date" id="start_date" name="start_date" class="form-control  " placeholder="Enter Check In Date?"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" >
                  </div>

                  <div class="col-lg-2 col-md-2 col-sm-12 p-1">
                      <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                        <p>Check Out</p>
                      </label>
                      <input type="date" id="end_date" name="end_date" class="form-control  "   pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                  </div>

                  <div class="col-lg-2 col-md-2 col-sm-12 p-1">
                      <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                        <p>Adults?</p>
                      </label>
                      <input id="adult_num" name="adult_num" type="number" class="form-control" max="10" min="1" placeholder="No. Of Adults?">
                  </div>


                  <div class="col-lg-2 col-md-2 col-sm-12 p-1">
                      <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                        <p>Childeren?</p>
                      </label>
                      <input id="child_num" name="child_num" type="number" class="form-control" max="10" min="1" placeholder="No. Of Childern?" >
                  </div>

                  <div class="col-lg-2 col-md-2 col-sm-12 p-1">
                      <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                          <p>Search</p>
                        </label>
                    <button type="submit" class="btn btn-danger wrn-btn">Search</button>
                  </div>

                </div>
              </div>
            </div>
          </form>
        </div>

<!--Hotels-->



<!--Tours-->
        <div class="tab-pane fade m-3" id="tours" role="tabpanel" aria-labelledby="tours-tab" aria-expanded="true">
            <div class="container py-md-3">
                <div class="">
                  <h5 class="tittle">Book Tours</h5>
                </div>
            </div>
            <form id="location_search_form" method="GET" >
              <div class="row">
                  <div class="col-lg-12">
                    <div class="row">

                      <div class="col-lg-4 col-md-4 col-sm-12 p-1">
                      <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                          <p>Where?</p>
                      </label>
                      <select id="location-tour" name="location-tour" class="form-control" placeholder="Pickup Location" aria-placeholder="Enter the pickup loaction">
                        <option value='0'>Select..</option>
                        <?php
                                                 $sql = 'SELECT * FROM locations_tours ORDER BY loc_name ASC';
                                                 $result = mysqli_query($db, $sql);
                                                  if (mysqli_num_rows($result) > 0) {
                                                     // output data of each row
                                                    while($row= mysqli_fetch_assoc($result)) {
                                                      echo ' <option>'.$row["loc_name"].'</option>';
                                                  }
                                                }
                                        ?>
                      </select>
                      </div>

                      <div class="col-lg-2 col-md-2 col-sm-12 p-1">
                        <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                          <p>Start Month</p>
                        </label>
                        <select class="form-control" id="tour_start_date" name="tour_start_date">
                         <option value="0">Select</option>
                         <option>Janaury</option>
                         <option>February</option>
                         <option>March</option>
                         <option>April</option>
                         <option>May</option>
                         <option>June</option>
                         <option>July</option>
                         <option>August</option>
                         <option>September</option>
                         <option>October</option>
                         <option>November</option>
                         <option>December</option>
                        </select>
                      </div>

                      <div class="col-lg-2 col-md-2 col-sm-12 p-1">
                          <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                            <p>People</p>
                          </label>
                          <select class="form-control" id="tour_people_count" name="tour_people_count">
                            <option value="0">Select..</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>

                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-12 p-1">
                          <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                              <p>Search</p>
                            </label>
                            <button type="submit" class="btn btn-danger wrn-btn">Search</button>
                      </div>

                    </div>
                  </div>
                </div>
          </form>
        </div>
<!--Tours-->

<!--cars-->
        <div class="tab-pane fade m-3" id="cars" role="tabpanel" aria-labelledby="cars-tab" aria-expanded="false">
            <div class="container py-md-3">
                <div class="">
                  <h5 class="tittle">Book Cars</h5>
                </div>
            </div>
            <form id="taxi_search_form" method="GET" >
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row">

                      <div class="col-lg-4 col-md-4 col-sm-12 p-1">

                          <h3 class="mt-lg-3 mb-2" style="text-align: left;color: #fff;"><strong>Where?</strong></h3>

                          <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                              <p>Pickup Location</p>
                            </label>
                          <select class="form-control" id="pickup_location" name="pickup_location" placeholder="Pickup Location" aria-placeholder="Enter the pickup loaction">
                            <option value = '0'>Select..</option>
                            <?php
                                                   $sql = 'SELECT * FROM locations ORDER BY loc_name ASC';
                                                   $result = mysqli_query($db, $sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                       // output data of each row
                                                      while($row= mysqli_fetch_assoc($result)) {
                                                        echo ' <option>'.$row["loc_name"].'</option>';
                                                        }
                                                      }
                                                ?>
                          </select>


                          <label for="end_location" style="width: 100%;text-align: left;">
                              <p>Drop Location</p>
                            </label>
                          <select class="form-control" id="end_location" name="end_location" placeholder="Pickup Location" aria-placeholder="Enter the pickup loaction">
                          <option value = '0'>Select..</option>
                            <?php
                                                   $sql = 'SELECT * FROM locations ORDER BY loc_name ASC';
                                                   $result = mysqli_query($db, $sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                       // output data of each row
                                                      while($row= mysqli_fetch_assoc($result)) {
                                                        echo ' <option>'.$row["loc_name"].'</option>';
                                                        }
                                                      }
                                                ?>
                          </select>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-12 p-1">

                          <h3 class="mt-lg-3 mb-2" style="text-align: left;color: #fff;" ><strong>When?</strong></h3>

                        <label for="pickup_date" style="width: 100%;text-align: left;">
                          <p>Pickup Date</p>
                        </label>
                        <input type="date" id="pickup_date" name="pickup_date" class="form-control" placeholder="Enter Check In Date?"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">

                        <label for="end_date_taxi" style="width: 100%;text-align: left;">
                          <p>Drop Date</p>
                        </label>
                        <input type="date" id="end_date_taxi" name="end_date_taxi" class="form-control" placeholder="Enter Check In Date?"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">

                      </div>





                      <div class="col-lg-4 col-md-4 col-sm-12 p-1">
                          <h3 class="mt-lg-3 mb-2" style="text-align: left;color: #fff;" ><strong>Confirm?</strong></h3>
                          <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                              <p>Car type?</p>
                            </label>
                              <select class="form-control" id="car_type" name="car_type">

                                <option value = "0" >Select..</option>
                                <option value = "Hatchback">Hatchback</option>
                                <option value = "Sedan">Sedan</option>
                                <option value = "Sport utility vehicle (SUV)">Sport utility vehicle (SUV)</option>

                              </select>

                          <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                              <p>Search</p>
                            </label>
                            <button type="submit" class="btn btn-danger wrn-btn">Search</button>
                      </div>

                    </div>
                  </div>
                </div>
              </form>
        </div>
  <!--cars-->
      </div>
    </div>
  </div>

<div class="mobile_hide" id="skyline"style="position: absolute;
    bottom: -1px;
    margin: 0;
    padding: 0;
    left: 10%;
    transform: translateX(-50%);" >
<img src="images/assets/skyline.png" alt="">

    </div>
<div class="mobile_hide" id="car" style="position: absolute;
    bottom: 0;
    margin: 0;
    padding: 0;
    left: 45%;
    width:100px;
    transform: translateX(-50%);" >
<img src="images/assets/car.png" alt="">
  </div>

</section>
<!-- Search -->
