<?php
 include('session.php');
 if($_SESSION['auth'] == false){
     navigate("index.php");
}

if(isset($_GET["tour_id"])){
    $tour_id = mysqli_real_escape_string($db,$_GET["tour_id"]);
}else {
  // code...
  navigate("index.php");
}

$sql = 'SELECT * FROM tours WHERE tour_id = '.$tour_id.' ';
$result = mysqli_query($db, $sql);
      if (mysqli_num_rows($result) > 0)
      {
        $row= mysqli_fetch_assoc($result);
      }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cabnotels - Add Schedule || <?php echo $row["tour_name"]; ?></title>
    <link rel="stylesheet" href="css/sb-admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </head>
  <body>
    <section>
      <div class="container">
        <nav class="navbar navbar-light bg-light">
          <h3>CABNOTELS</h3>
        </nav>
<div class="container">
<h3 class="display-6">Add Schedule For <?php echo $row["tour_name"]; ?></h3>
</div>

<hr>

<div class="container">

<div class="row">
<div class="center_element col-xl-12">

  <nav>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

      <?php
      $count = 0;
      for ($i=0; $i < (int)$row["num_days"]; $i++) {
        // code...
        if ($i == 0) {
          // code...
          echo '
          <li class="nav-item mr-1">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#tab_'.$i.'" role="tab" aria-controls="pills-home" aria-selected="true">Day '. ++$count .'</a>
          </li>';
        }else {
          echo '
          <li class="nav-item mr-1">
            <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#tab_'.$i.'" role="tab" aria-controls="pills-home" aria-selected="true">Day '.++$count.'</a>
          </li>';
        }
      }

      ?>
    </div>
  </nav>
  <div class="col-12 tab-content px-3" id="pills-tabContent">
    <?php
    $count = 0;
    for ($i=0; $i < (int)$row["num_days"]; $i++) {
      // code...
        if ($i == 0) {
        echo '
      <div class="tab-pane fade show active" id="tab_'.$i.'" role="tabpanel" aria-labelledby="nav-home-tab">
        Day '.++$count.'
        <div class="">
        <form id="main_schedule_add_'.$i.'">

              <div class="form-group">
                <label for="timeline_heading">Timeline Heading</label>
                <input type="text" class="form-control" id="timeline_heading" name="timeline_heading" required>
              </div>

              <div class="form-group">
                <label for="timeline_content">Content For Timeline Heading</label>
                <textarea class="form-control" id="timeline_content" name="timeline_content" rows="3" required></textarea>
              </div>

              <input type="hidden" class="form-control" id="tour_id" name="tour_id" value="'.$tour_id.'">

              <input type="hidden" class="form-control" id="timeline_day" name="timeline_day" value="'.$i.'">

              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </form>
            </div>
      </div>
      <script>
      $(function() {
          $("#main_schedule_add_'.$i.'").on("submit", function(e) {
              e.preventDefault();
              $.ajax({
                  type: "post",
                  url: "add_new_timeline.php",
                  data: $("#main_schedule_add_'.$i.'").serialize(),
                  dataType: "JSON",
                  success: function(response) {
                      if (response == 1) {
                          update_staus_success("Sucessfully Added");
                      } else {
                          update_staus_error(response);
                      }
                  }
              });
          });
      });
      </script>
      ';
    }else {
      echo '
      <div class="tab-pane fade" id="tab_'.$i.'" role="tabpanel" aria-labelledby="nav-home-tab">
        Day '.++$count.'
        <div class="">
        <form id="main_schedule_add_'.$i.'">
              <div class="form-group">
                <label for="timeline_heading">Timeline Heading</label>
                <input type="text" class="form-control" id="timeline_heading" name="timeline_heading">
              </div>

              <div class="form-group">
                <label for="timeline_content">Content For Timeline Heading</label>
                <textarea class="form-control" id="timeline_content" name="timeline_content" rows="3" required></textarea>
              </div>

              <input type="hidden" class="form-control" id="tour_id" name="tour_id" value="'.$tour_id.'">

              <input type="hidden" class="form-control" id="timeline_day" name="timeline_day" value="'.$i.'">

              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-primary">Reset</button>

            </form>
            </div>
          </div>
          <script>
          $(function() {
              $("#main_schedule_add_'.$i.'").on("submit", function(e) {
                  e.preventDefault();
                  $.ajax({
                      type: "post",
                      url: "add_new_timeline.php",
                      data: $("#main_schedule_add_'.$i.'").serialize(),
                      dataType: "JSON",
                      success: function(response) {
                          if (response == 1) {
                              update_staus_success("Sucessfully Added");
                          } else {
                              update_staus_error(response);
                          }
                      }
                  });
              });
          });
          </script>
         ';
        }
      }
     ?>
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

<script>
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
}
</script>

  </body>
</html>
