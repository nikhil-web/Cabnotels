<!-- Search tours-->
<section id="booking" class="book search-sec ">
    <div class="container">
            <div style="z-index: 9;" data-aos="zoom-in" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                    <h2 class="heading text-capitalize text-center" style="color:#3c3c3c; margin-top: 15px; ">Book Tours.</h2>

                    <div class="tab-pane fade m-3 active show" id="hotels" role="tabpanel" aria-labelledby="hotels-tab" aria-expanded="true">
                    <form id="location_search_form" action="tours.html" method="GET" >
          <div class="row">
              <div class="col-lg-12">
                <div class="row">

                  <div class="col-lg-4 col-md-4 col-sm-12 p-1">
                  <label for="exampleInputEmail1" style="width: 100%;text-align: left;">
                      <p>Where?</p>
                  </label>
                  <select id="location-tour" name="location-tour" class="form-control" placeholder="Pickup Location" aria-placeholder="Enter the pickup loaction">
                      <option value="0">Select..</option>
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
