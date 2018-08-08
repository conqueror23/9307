drop database uni;
create DATABASE UNI;

connect UNI;


create TABLE school (

school_ID INT(6) PRIMARY KEY,

school_name VARCHAR(30) NOT NULL

);


create TABLE students(

student_ID VARCHAR(6)  PRIMARY KEY,

student_name VARCHAR(30) NOT NULL,

password VARCHAR(30)

);


create TABLE professor (

professor_ID VARCHAR(6) PRIMARY KEY,

professor_name VARCHAR(30) NOT NULL,

school_ID INT(6)

);


create TABLE department (

department_ID VARCHAR(6) PRIMARY KEY,

department_name VARCHAR(30) NOT NULL,

school_ID INT(6)

);


create TABLE course(

course_ID VARCHAR(6)  PRIMARY KEY,

course_name VARCHAR(30) NOT NULL,

department_ID VARCHAR(6)

);


create TABLE class(

class_ID VARCHAR(6) PRIMARY KEY,

class_name VARCHAR(30) NOT NULL,

professor_ID VARCHAR(6) ,

course_ID VARCHAR(6)

);




create TABLE enrollment(

enrollment_ID VARCHAR(6) PRIMARY KEY,

class_ID VARCHAR(6),

student_ID VARCHAR(6)

);



insert into school values ('001','COMPUTER');

insert into school values ('002','ENGINEER');



insert into professor values ('COM001','JOHN','001');

insert into professor values ('COM002','KATE','001');

insert into professor values ('COM003','SNOW','001');

insert into professor values ('COM004','MARK','001');

insert into professor values ('COM005','TOME','001');

insert into professor values ('ENG001','IRIS','002');

insert into professor values ('ENG002','JOSE','002');

insert into professor values ('ENG003','SKIN','002');

insert into professor values ('ENG004','FINE','002');

insert into professor values ('ENG005','LUCY','002');



insert into department values ('COMD01','IT','001');

insert into department values ('COMD02','IT','001');

insert into department values ('COMD03','IT','001');

insert into department values ('ENGD01','ENVIRONMENT','002');

insert into department values ('ENGD02','ENVIRONMENT','002');

insert into department values ('ENGD03','ENVIRONMENT','002');



insert into course values ('WEB001','WEBPROGRAMMING','COMD01');

insert into course values ('WEB002','WEBPROGRAMMING2','COMD01');

insert into course values ('SEC001','SECURITYMANAGMENT','COMD02');

insert into course values ('MAN001','RESOURCEMANAGMENT','COMD03');



insert into class values ('IT0901','IT001','COM001','WEB001');

insert into class values ('IT0902','IT002','COM002','WEB001');

insert into class values ('IT1001','IT011','COM003','WEB002');

insert into class values ('IT1011','IT012','COM004','WEB002');

insert into class values ('IT1101','IT121','COM005','SEC001');

insert into class values ('EN0801','EN001','ENG001','SEC001');

insert into class values ('EN0901','EN010','ENG002','WEB001');

insert into class values ('EN0811','EN011','ENG003','MAN001');

insert into class values ('EN1201','EN121','ENG004','WEB001');

insert into class values ('EN1301','EN031','ENG005','MAN001');



insert into students values ('IT0001','JOHN KATE','a');

insert into students values ('IT0002','JOHN DOE','a');

insert into students values ('IT0003','SMITH KATE','a');

insert into students values ('IT0004','DOE SMITH','a');

insert into students values ('IT0005','KADEN KATE','a');

insert into students values ('IT0006','LORREN DIO','a');

insert into students values ('IT0007','SMITH KATE','a');

insert into students values ('IT0008','GARREY KATE','a');

insert into students values ('IT0009','WILLIAM KATE','a');

insert into students values ('IT0010','WILLIAM SMITH','a');

insert into students values ('EN0001','DIO KATE','a');

insert into students values ('EN0002','SEET KATE','a');

insert into students values ('EN0003','HARRY KATE','a');

insert into students values ('EN0004','TOM HARRY','a');

insert into students values ('EN0005','SEET KATE','a');

insert into students values ('EN0006','JOHN SAM','a');

insert into students values ('EN0007','JOHN LORREN','a');

insert into students values ('EN0008','GARREY DIO','a');

insert into students values ('EN0009','JOHN KADEN','a');

insert into students values ('EN0010','JOHN GARREY','a');



insert into enrollment values ('020917IT','IT0901','IT0001');

insert into enrollment values ('090217IT','IT0902','IT0003');

insert into enrollment values ('100117IT','IT1001','IT0005');

insert into enrollment values ('020918IT','IT1011','IT0009');

insert into enrollment values ('021117IT','IT1101','IT0010');

insert into enrollment values ('210918EN','EN0801','EN0001');

insert into enrollment values ('020918EN','EN0901','EN0006');

insert into enrollment values ('220917EN','EN0811','EN0007');

insert into enrollment values ('021218EN','EN1201','EN0010');

insert into enrollment values ('021119EN','EN1301','EN0009');




a) The name of departments of a specific school. say: COMPUTER

select department.department_name from department

join school on department.school_ID=school.school_ID
where school.school_name='COMPUTER';




b)The name of students of a specific course. say: backend ///

select students.student_name from students

join enrollment on students.student_ID = enrollment.student_ID

join class on enrollment.class_ID=class.class_ID

join course on class.course_ID=course.course_ID
where course.course_name = 'WEBPROGRAMMING'

group by student_name;



c)The name of professors of a specific school. say: ENGINEER

select professor.professor_name from professor

join school on professor.school_ID=school.school_ID
where school.school_name = 'ENGINEER';



d)The number of students in each course.

select course.course_name,count(*) as Numberofstudents
from course
join class on course.course_ID = class.course_ID

join enrollment on class.class_ID = enrollment.class_ID

join students on enrollment.student_ID = students.student_ID

group by course.course_name;





e) The number of professors in each school.

select school.school_name,count(*) from school

join professor on professor.school_ID=school.school_ID
group by school.school_name;



f) The name of students who have class with a specific professor. say: pro0

select students.student_name from students

join enrollment on students.student_ID =  enrollment.student_ID

join class on enrollment.class_ID = class.class_ID

join professor on  professor.professor_ID = class.professor_ID

where professor.professor_ID= 'COM003';



g) The number of students having enrolled in the classes offered by each school. say: ENGINEER;


select students.student_name,count(*) from

students join enrollment on students.student_ID = enrollment.student_ID

join class on class.class_ID = enrollment.class_ID

join course on course.course_ID = class.course_ID

group by student_name;
