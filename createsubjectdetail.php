<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cyberhelper";

// Create connection - mysqli API이용
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection - 오류 메시지 전송
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$num=$_GET['num_subject'];
$sql = "SELECT * FROM tbl_subjectdetail WHERE num_subject='$num'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
        <title>이화여자대학교 강의관리</title>

        <!-- 부트스트랩 -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        <!-- IE8 에서 HTML5 요소와 미디어 쿼리를 위한 HTML5 shim 와 Respond.js -->
        <!-- WARNING: Respond.js 는 당신이 file:// 을 통해 페이지를 볼 때는 동작하지 않습니다. -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <![endif]-->

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style.css">

        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation" style="background-color:#00462a; margin-bottom:0px; ">
            <div class="container-fluid">
                    <ul class="nav navbar-nav" style="display:inline-block;">
                        <li><a href="#" style="padding:0px; margin:0px;"><img alt="ewha" src="\logo.png" style="width:107px; height:107px; position:relative; left:15px;"></a></li>
                        <li>
                            <a href="#" style="margin:0px; padding:auto; color:white;">
                            <p style="font-size:30px; margin:10px;">이화여자대학교</p>
                            <p style="font-size:20px; margin:20px 0px 0px 10px;">강의관리</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav ml-auto" style="display:inline-block; position:absolute; right:0px; height:107px;">
                        <li><a href="#about" style="color:white; height:107px; margin-top:25px;">김이화</a></li>
                        <li><a href="#" style="padding:0px; margin:0px;"><img alt="person" src="\person.png" style="width:30px; height:30px; margin-top:35px;"></a></li>
                        <li><button style="margin:35px 20px 20px 40px; background-color:#BDBDBD;">로그아웃</button></li>
                    </ul>
            </div>
        </nav>
          
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <ul class="list-unstyled components">
                    <li class="active">
                        <a href='#' onClick="location.href='mainpage_final.html'">
                            <i class="fas fa-list"></i>
                            　To-do 리스트/데일리로그</a>
                    </li>
                    <li>
                        <a href='#' onClick="location.href='http://localhost/datatable.php'">
                            <i class="fas fa-home" ></i>
                            　강의 및 과제 모아보기</a>
                    </li>
                    <li>
                        <a href="#" onClick="location.href='http://localhost/createsubject.php'">
                            <i class="fas fa-plus-circle" ></i>
                            　과목 추가하기</a>
                    </li>
                    <li>
                        <a href="#" onClick="location.href='Calendar.html'">
                            <i class="fas fa-calendar" ></i>
                            　캘린더</a>
                    </li>
                </ul>
            </nav>
    
            <!-- Page Content  -->
            
            <div id="content">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                </nav>

                <div class="container">
                    <div class="row">
                        <h2 class="text-danger">과목 추가하기</h2>
                        <table class="table table-bordered success">
                            <thead>
                                <tr >
                                    <th >과목명</th>
                                    <td><?php echo $row['name_subject'] ?></td>
                                </tr>
                                <tr>
                                    <th class="info">교수명</th>
                                    <td><?php echo $row['prof_subject'] ?></td>
                                </tr>
                                <tr>
                                    <th class="info">개설학과</th>
                                    <td><?php echo $row['depart_subject'] ?></td>
                                </tr>
                                <tr>
                                    <th class="info">요일/시간</th>
                                    <td><?php echo $row['time_subject'] ?></td>
                                </tr>
                                <tr>
                                    <th class="info">학년</th>
                                    <td><?php echo $row['year_subject'] ?></td>
                                </tr>
                                <tr>
                                    <th class="info">강의실</th>
                                    <td><?php echo $row['room_subject'] ?></td>
                                </tr>
                                <tr >
                                    <th  class="info">학점</th>
                                    <td><?php echo $row['grade_subject'] ?></td>
                                </tr>
                                <tr>
                                    <th class="info">강의계획안</th>
                                    <td><?php echo $row['file_subject'] ?></td>
                                </tr>
                                    <th></th>
                                    <td>
                                        <form action="datatable.php">
                                        <input type="button" value="이전" onClick="history.go(-1)">
                                        <input type="submit" value="추가하기" onClick="add_subject(<?php $row['id_subject'] ?>)">
                                        </form>
                                        
                                    <td>
                                <tr>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>  

        <script>
            function add_subject(id_subject) {
                <?php 
                    $sql_add="INSERT into tbl_subjectlist(id_subject,id_user) VALUES(id_subject, 1)"; 
                    mysqli_query($conn, $sql_add);  
                ?>
            }    
        </script>



        <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
        <script src="js/bootstrap.min.js"></script>
    
        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>