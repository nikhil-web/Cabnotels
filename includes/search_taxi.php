<section id="booking" class="book search-sec ">

    <div class="container">


    <div style="z-index: 9;" data-aos="zoom-in" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
        <h2 class="heading text-capitalize text-center" style="color:#3c3c3c; margin-top: 15px; ">Book Taxi.</h2>

        <div class="tab-pane fade m-3 active show" id="hotels" role="tabpanel" aria-labelledby="hotels-tab" aria-expanded="true">
        <form id="taxi_search_form" method="GET" >
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row">

                      <div class="col-lg-4 col-md-4 col-sm-12 p-1">

                          <h3 class="mt-lg-3 mb-2" style="text-align: left;color: #3c3c3c;"><strong>Where?</strong></h3>

                          <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                              <p>Pickup Location</p>
                            </label>
                          <select class="form-control" id="pickup_location" name="pickup_location" placeholder="Pickup Location" aria-placeholder="Enter the pickup loaction" >
                              <option value="0">Select..</option>
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
                            <option value="0">Select..</option>
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

                          <h3 class="mt-lg-3 mb-2" style="text-align: left;color: #3c3c3c;" ><strong>When?</strong></h3>

                        <label for="pickup_date" style="width: 100%;text-align: left;">
                          <p>Pickup Date</p>
                        </label>
                        <input type="date" id="pickup_date" name="pickup_date" class="form-control" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" >

                        <label for="end_date_taxi" style="width: 100%;text-align: left;">
                          <p>Drop Date</p>
                        </label>
                        <input type="date" id="end_date_taxi" name="end_date_taxi" class="form-control"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value = " <?php echo $end_date_taxi; ?>">

                      </div>





                      <div class="col-lg-4 col-md-4 col-sm-12 p-1">
                          <h3 class="mt-lg-3 mb-2" style="text-align: left;color: #3c3c3c;" ><strong>Confirm?</strong></h3>
                          <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                              <p>Car type?</p>
                            </label>
                              <select class="form-control" id="car_type" name="car_type">

                                  <option value="0">Select..</option>
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


    </div>

    </div>

</section>
<div class=" clirle_button bottom">
  <div id="arrow" onclick="hide_search()" class="innside">
    <i class="fas fa-arrow-down"></i>
  </div>
</div>
      <script>
        function hide_search()
        {
          var x = document.getElementById("booking");
          var y = document.getElementById("arrow");
          if (x.style.display === "none") {
            $("#booking").css('opacity', 1).slideDown('slow').animate({ opacity: 1 },{ queue: false, duration: 'slow' });
            y.style.transform = 'rotate(180deg)';
          } else {
            $("#booking").css('opacity', 1).slideUp('slow').animate({ opacity: 1 },{ queue: false, duration: 'slow' });
            y.style.transform = 'rotate(0deg)';
          }
        }

        $("#booking").css('opacity', 1).slideUp('slow').animate({ opacity: 1 },{ queue: false, duration: 'slow' });
          document.getElementById("arrow").style.transform = 'rotate(0deg)';
      </script>
