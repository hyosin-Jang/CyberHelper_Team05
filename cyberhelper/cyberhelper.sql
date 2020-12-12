create database cyberhelper;

use cyberhelper;

CREATE table tbl_subjectdetail(
id_subject int auto_increment,
num_subject varchar(15),
prof_subject varchar(10),
name_subject varchar(15),
depart_subject varchar(10),
time_subject varchar(15),
year_subject int,
room_subject varchar(10),
grade_subject varchar(5),
file_subject text,
primary key(id_subject)
);

INSERT into tbl_subjectdetail
(num_subject,prof_subject,name_subject,depart_subject,time_subject,year_subject,room_subject,grade_subject,file_subject)
VALUES('38426-01','오유란','오픈sw플랫폼','컴퓨터공학','목 6~7',2,'공학A125','3.0','https://eureka.ewha.ac.kr/eureka/my/hssg4008q.do?YEAR=2020&TERM_CD=20&GROUP_CD=20&SUBJECT_CD=38426&CLASS_NUM=01');

CREATE table tbl_lecturedetail(
id_lecture int auto_increment,
name_lecture varchar(20),
category_lecture bool,
id_subject int,
start_lecture timestamp NULL,
end_lecture timestamp NULL,
finish_lecture bool,
week_lecture int,
name_subject varchar(255),
title varchar(255),
color varchar(255),
primary key(id_lecture),
foreign key(id_subject) references tbl_subjectdetail(id_subject)
);

INSERT into tbl_lecturedetail
(name_lecture,category_lecture,id_subject,start_lecture,end_lecture,finish_lecture,week_lecture,name_subject)
VALUES
('firebase',true,1,'2020-11-26 15:30:00','2020-12-10 12:30:00',true,12,'오소플'),
('크롤링',true,1,'2020-11-26 15:30:00','2020-12-10 17:59:00',false,11,'시소실'),
('php',true,2,'2020-11-26 15:30:00','2020-12-16 23:59:00',false,10,'오소플');

//title 병합
UPDATE tbl_lecturedetail SET title = CONCAT(name_subject,"-",week_lecture,"-",name_lecture);

//강의테이블 color 데이터 삽입
UPDATE  tbl_lecturedetail SET  color = "#ff6f69";

CREATE table tbl_homeworkdetail(
id_homework int auto_increment,
name_homework varchar(20),
category_homework bool,
id_subject int,
end_homework timestamp,
finish_homework bool,
name_subject varchar(255),
category varchar(255),
title varchar(255), 
color varchar(255),
primary key(id_homework),
foreign key(id_subject) references tbl_subjectdetail(id_subject)
);

INSERT into tbl_homeworkdetail
(name_homework,category_homework,id_subject,end_homework,finish_homework,name_subject)
VALUES
('firebase',false,0,'2020-12-10 23:59:00',false,'오소플'),
('허프만코드',false,1,'2020-12-10 08:59:00',false,'자구');

//1이면 팀, 0이면 개인
UPDATE tbl_homeworkdetail SET category=’팀’ WHERE category_homework=1;
UPDATE tbl_homeworkdetail SET category=’개인’ WHERE category_homework=0;

//title 병합
UPDATE tbl_homeworkdetail SET title = CONCAT(category,"-",name_subject,"-",name_homework);

CREATE table tbl_user(
id_user int auto_increment,
name_user varchar(10),
email_user varchar(20),
passwd_user varchar(20),
primary key(id_user)
);

INSERT into tbl_user
(name_user,email_user,passwd_user)
VALUES('최찬미','judith0616@gmail.com','cksal33');

CREATE table tbl_subjectlist(
id_subjectlist int auto_increment,
id_subject int,
id_user int,
primary key(id_subjectlist),
foreign key(id_subject) references tbl_subjectdetail(id_subject),
foreign key(id_user) references tbl_user(id_user)
);

INSERT into tbl_subjectlist
(id_subject,id_user)
VALUES(1,1);

CREATE table tbl_lecturelist(
id_lecturelist int auto_increment,
id_lecture int,
id_user int,
primary key(id_lecturelist),
foreign key(id_lecture) references tbl_lecturedetail(id_lecture),
foreign key(id_user) references tbl_user(id_user)
);

INSERT into tbl_lecturelist
(id_lecture,id_user)
VALUES(1,1);

CREATE table tbl_homeworklist(
id_homeworklist int auto_increment,
id_homework int,
id_user int,
primary key(id_homeworklist),
foreign key(id_homework) references tbl_homeworkdetail(id_homework),
foreign key(id_user) references tbl_user(id_user)
);

INSERT into tbl_homeworklist
(id_homework,id_user)
VALUES(1,1);