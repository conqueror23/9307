drop database exam;

create database exam;

use exam;

CREATE TABLE `student` (
  `student_id` int(9) auto_increment,
  `exam_id` int(9),
  `password` VARCHAR(9),
  `student_name` VARCHAR(9),
  `up_time` int(9),
  `result` VARCHAR(10),
  PRIMARY KEY (`student_id`),
  KEY `FK` (`exam_id`)
);

CREATE TABLE `answer` (
  `question_id` int(9),
  `answer` VARCHAR(2),
  PRIMARY KEY (`question_id`)
);

CREATE TABLE `exam` (
  `exam_id` int(9) auto_increment,
  `question_id` int(9),
  `single_result` VARCHAR(10),
  KEY `Pk` (`exam_id`),
  KEY `FK` (`question_id`)
);



insert into student(password,student_name,up_time) values ('a','john',0),
													('a','kate',0),
													('a','doe',0),
													('a','stack',0);

insert into answer(question_id,answer) values (1,"D"),
						(2,"C"),
						(3,"A"),
						(4,"D"),
						(5,"C"),
						(6,"D"),
						(7,"C"),
						(8,"D"),
						(9,"C"),
						(10,"C"),
						(11,"D"),
						(12,"B"),
						(13,"D"),
						(14,"B"),
						(15,"A"),
						(16,"D"),
						(17,"A"),
						(18,"B"),
						(19,"B"),
						(20,"B"),
						(21,"A"),
						(22,"D"),
						(23,"D"),
						(24,"C"),
						(25,"B"),
						(26,"A"),
						(27,"A"),
						(28,"A"),
						(29,"A"),
						(30,"A"),
						(31,"D"),
						(32,"D"),
						(33,"C"),
						(34,"A"),
						(35,"B"),
						(36,"A"),
						(37,"C"),
						(38,"A"),
						(39,"D"),
						(40,"A"),
						(41,"C"),
						(42,"B"),
						(43,"A"),
						(44,"B"),
						(45,"A"),
						(46,"A"),
						(47,"C"),
						(48,"C"),
						(49,"C"),
						(50,"B");
