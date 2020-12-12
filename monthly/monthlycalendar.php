<?php
$servername = "localhost";
$username = "root";
$password = "111111";
$dbname = "cyberhelper";

// Create connection-mysqliAPI이용
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 
$sql_hw = "SELECT title, end_homework as start from tbl_homeworkdetail WHERE finish_homework=0";
$sql_lc = "SELECT title, end_lecture as start, color from tbl_lecturedetail WHERE finish_lecture=0";
$result_hw = mysqli_query($conn,$sql_hw); 
$result_lc = mysqli_query($conn,$sql_lc); 
$myArray = array();
if ($result_hw->num_rows > 0) {
// output data of each row
    while($row = $result_hw->fetch_assoc()) {
        $myArray[] = $row;
    }
} 
if ($result_lc->num_rows > 0) {
  // output data of each row
      while($row = $result_lc->fetch_assoc()) {
          $myArray[] = $row;
      }
  } 
else 
{
    echo "0 results";
}



?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js'></script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js'></script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js'></script>
<script src='ko.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script>
  $(document).ready(function() {
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      defaultDate: new Date(),
      //클릭하면 다른 페이지로 이동하는지 여부
      navLinks: , // can click day/week names to navigate views
      //수정 여부
      editable: false,
      selectable : true,
      locale : 'ko',
      eventLimit: true, // allow "more" link when too many events
   
      events: <?php echo json_encode($myArray); ?>
    });
  });
</script>
<style>
  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }
  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }
</style>
</head>
<body>
  <div id='calendar'></div>

</body>
</html>