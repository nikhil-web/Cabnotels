<!-- Search hotel -->
<section id="booking" class="book search-sec ">
    <div class="container">
    <div style="z-index: 9;" data-aos="zoom-in" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
        <h2 class="heading text-capitalize text-center" style="color:#3c3c3c; margin-top: 15px; ">Book Hotels.</h2>

        <div class="tab-pane fade m-3 active show" id="hotels" role="tabpanel" aria-labelledby="hotels-tab" aria-expanded="true">
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
