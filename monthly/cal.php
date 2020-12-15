<?php
$servername = "localhost";
$username = "root";
$password = "111111";
$dbname = "cyberhelper";

// Create connection - mysqli API이용
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection - 오류 메시지 전송
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// MySQL의 events table에서 title, event_date SELECT
$sql_hw = "SELECT title, end_homework as start FROM tbl_homeworkdetail WHERE finish_homework=0";
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
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <title>Monthly Calendar</title>
    <link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js'></script>
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js'></script>
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />

     <!-- Font Awesome JS -->
     <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
     <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
     <script>
  $(document).ready(function() {
    $('#calendar').fullCalendar({
        lang : 'ko',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      defaultDate: new Date(),
      //클릭하면 다른 페이지로 이동하는지 여부
      navLinks: false, // can click day/week names to navigate views
      //수정 여부
      editable: false,
      selectable : true,
    
      eventLimit: true, // allow "more" link when too many events
      //$myArray에 들어있는 events를 json data로 encode
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
    <nav class="navbar navbar-default" role="navigation" style="background-color:#00462a; margin-bottom:0px; ">
        <div class="container-fluid">
                <ul class="nav navbar-nav" style="display:inline-block;">
                    <li><a href="#" style="padding:0px; margin:0px;"><img alt="ewha" src="C:\Users\82106\Desktop\오소플\logo.png" style="width:107px; height:107px; position:relative; left:15px;"></a></li>
                    <li>
                        <a href="#" style="margin:0px; padding:auto; color:white;">
                        <p style="font-size:30px; margin:10px;">이화여자대학교</p>
                        <p style="font-size:20px; margin:20px 0px 0px 10px;">강의관리</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto" style="display:inline-block; position:absolute; right:0px; height:107px;">
                    <li><a href="#about" style="color:white; height:107px; margin-top:25px;">김이화</a></li>
                    <li><a href="#" style="padding:0px; margin:0px;"><img alt="person" src="https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/profle-128.png" style="width:30px; height:30px; margin-top:35px;"></a></li>
                    <li><button style="margin:35px 15px 20px 30px; background-color:rgba(213,213,213,70);">로그아웃</button></li>
                </ul>
        </div>
    </nav>
      
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <ul class="list-unstyled components">
                <li class="active">
                    <a href='#'>
                        <i class="fas fa-list"></i>
                        　스탬프/투두리스트/데일리로그</a>
                </li>
                <li>
                    <a href='#'>
                        <i class="fas fa-home"></i>
                        　강의/과제 모아보기</a>
                </li>
                <li>
                    <a href='#'>
                        <i class="fas fa-chart-bar"></i>
                        　한눈에 모아보기</a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-plus-circle"></i>
                        　과목 추가하기</a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-calendar"></i>
                        　캘린더</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            </nav>
 
            <div class="container">
                <div id='calendar'>

                </div>
                
                
               



                <div id="footer">
                    <div class="container text-center">
                    <p class="text-muted credit"><a href="http://cyber.ewha.ac.kr">Cyber Campus 바로가기</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/jquery.highlight.min.js"></script>
    <script src="js/dataTables.responsive.min.js"></script>
    <script src="js/dataTables.searchHighlight.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/fnMultiFilter.js"></script>
    <script src="js/custom.js"></script>

    
    
</body>
</html>