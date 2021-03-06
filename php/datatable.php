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

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <title>jQuery Datatable</title>

    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap-datepicker.min.css" rel="stylesheet" />
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/dataTables.searchHighlight.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />

     <!-- Font Awesome JS -->
     <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
     <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
     
</head>
<body>
    <nav class="navbar navbar-default" role="navigation" style="background-color:#00462a; margin-bottom:0px; ">
        <div class="container-fluid">
                <ul class="nav navbar-nav" style="display:inline-block;">
                    <li><a href="#" style="padding:0px; margin:0px;"><img alt="ewha" src="logo.png" style="width:107px; height:107px; position:relative; left:15px;"></a></li>
                    <li>
                        <a href="#" style="margin:0px; padding:auto; color:white;">
                        <p style="font-size:30px; margin:10px;">이화여자대학교</p>
                        <p style="font-size:20px; margin:20px 0px 0px 10px;">강의관리</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto" style="display:inline-block; position:absolute; right:0px; height:107px;">
                    <li><a href="#about" style="color:white; height:107px; margin-top:25px;">김이화</a></li>
                    <li><a href="#" style="padding:0px; margin:0px;"><img alt="person" src="person.png" style="width:30px; height:30px; margin-top:35px;"></a></li>
                    <li><button style="margin:35px 15px 20px 30px; background-color:rgba(213,213,213,70);">로그아웃</button></li>
                </ul>
        </div>
    </nav>
      
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <ul class="list-unstyled components">
                 <li>
                    <a href='#' onClick="location.href='mainpage_final.html'">
                        <i class="fas fa-list"></i>
                        　To-do 리스트/데일리로그</a>
               </li>
                <li class="active">
                    <a href='#' onClick="location.href='http://localhost/datatable.php'">
                        <i class="fas fa-home"></i>
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
                <div class="page-header">
                    <h2 class="text-center">강의/과제 모아보기</h2>
                
                    <button class="button" id="btn1" type="submit" onClick="location.href='http://localhost/createlecture.php'"> 강의 추가 </button>
                    <button class="button" id="btn2" type="submit" onClick="location.href='http://localhost/createhomework.php'"> 과제 추가 </button>
    
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="example" class="table table-oddEven-rows table-hover table-fixed-row-heights dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>과목명</th>
                                        <th>구분</th>
                                        <th>강의종류</th>
                                        <th>과제분류</th>
                                        <th>내용</th>
                                        <th>시작시간</th>
                                        <th>종료시간</th>
                                        <th>완료여부</th>
                                    </tr>
                                </thead>
            
                                <tbody>
                                    <tr>
                                        <td>오픈sw플랫폼</td>
                                        <td>강의</td>
                                        <td>실강</td>
                                        <td> </td>
                                        <td>Week7 - jQuery</td>
                                        <td>11/18 15:30</td>
                                        <td>11/18 16:45</td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>오픈sw플랫폼</td>
                                        <td>과제</td>
                                        <td> </td>
                                        <td>팀 과제</td>
                                        <td>jQuery Exercise</td>
                                        <td>11/18 16:45</td>
                                        <td>11/18 23:55</td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>채플</td>
                                        <td>강의</td>
                                        <td>녹강</td>
                                        <td> </td>
                                        <td>[6주차] 온라인 이화감사페스티벌</td>
                                        <td>11/12 10:30</td>
                                        <td>11/13 09:00</td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>채플</td>
                                        <td>강의</td>
                                        <td>녹강</td>
                                        <td> </td>
                                        <td>[6주차] 온라인 이화감사페스티벌</td>
                                        <td>11/12 10:30</td>
                                        <td>11/13 09:00</td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>채플</td>
                                        <td>강의</td>
                                        <td>녹강</td>
                                        <td> </td>
                                        <td>[6주차] 온라인 이화감사페스티벌</td>
                                        <td>11/12 10:30</td>
                                        <td>11/13 09:00</td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>채플</td>
                                        <td>강의</td>
                                        <td>녹강</td>
                                        <td> </td>
                                        <td>[6주차] 온라인 이화감사페스티벌</td>
                                        <td>11/12 10:30</td>
                                        <td>11/13 09:00</td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>채플</td>
                                        <td>강의</td>
                                        <td>녹강</td>
                                        <td> </td>
                                        <td>[6주차] 온라인 이화감사페스티벌</td>
                                        <td>11/12 10:30</td>
                                        <td>11/13 09:00</td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>채플</td>
                                        <td>강의</td>
                                        <td>녹강</td>
                                        <td> </td>
                                        <td>[7주차] 무용채플</td>
                                        <td>11/12 10:30</td>
                                        <td>11/13 09:00</td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>채플</td>
                                        <td>강의</td>
                                        <td>녹강</td>
                                        <td> </td>
                                        <td>[6주차] 온라인 이화감사페스티벌</td>
                                        <td>11/12 10:30</td>
                                        <td>11/13 09:00</td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>채플</td>
                                        <td>강의</td>
                                        <td>녹강</td>
                                        <td> </td>
                                        <td>[8주차] 졸업채플</td>
                                        <td>11/12 10:30</td>
                                        <td>11/13 09:00</td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>채플</td>
                                        <td>강의</td>
                                        <td>녹강</td>
                                        <td> </td>
                                        <td>[8주차] 졸업채플</td>
                                        <td>11/12 10:30</td>
                                        <td>11/13 09:00</td>
                                        <td><input type="checkbox"></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
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
