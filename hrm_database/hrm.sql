/* create database hrm */
create  database hrm;
use hrm;

/* human resource board members table */
create table hrm_board_members(
board_member_id  int(11) primary key auto_increment,
board_member_first_name varchar(20),
board_member_last_name varchar(20),
board_member_position varchar(20),
email_address varchar(40) unique,
board_member_password varchar(20)
);
describe hrm_board_members;
/* add members to the hrm_board_members table */
insert into hrm_board_members(board_member_first_name,board_member_last_name,
board_member_position,email_address,board_member_password)values('justice','ankomah','senior hrm','justiceankomah12@gmail.com',
'justice12');
insert into hrm_board_members(board_member_first_name,board_member_last_name,
board_member_position,email_address,board_member_password)values('eva','amankona',
'assistance hrm','evaamankona12@gmail.com','amankona12');

/* create the employee details table */
create table employee_details(
employee_id int(11) primary key auto_increment,
employee_first_name varchar(20),
employee_last_name varchar(20),
employee_email varchar(40),
employee_position varchar(20),
employee_branch varchar(20),
salary_id int(11),
branch_id int(11),
constraint p_k foreign key(salary_id) references salary(salary_id),
constraint pp foreign key(branch_id) references branches(branch_id)
);

describe working_days;


ALTER TABLE employee_details ADD FOREIGN KEY (salary_id) REFERENCES salary(salary_id); 

/* create branch table */
create table branches(
branch_id int(11) primary key auto_increment,
branch_name varchar(30)
);
alter table employee_details add column salary_id varchar(20);

select * from working_days;

create table working_days(
days_id int(11) primary key auto_increment,
monday varchar(20),
tuesday varchar(10),
wednessday varchar(10),
thursday varchar(10),
friday varchar(10),
saturday varchar(10),
sunday varchar(10)
);
describe leave_category;
insert into branches(branch_name) values('swedru');
select * from branches;

/*create holiday tablbe*/
create table holiday_list(
holiday_id int(11) primary key auto_increment,
event_name varchar(40),
start_date varchar(40),
end_date varchar(40)
);

/*create salary table*/
create table salary(
salary_id int(11) primary key auto_increment,
salary_amount varchar(20),
tax_amount varchar(20)
);

describe salary;

/*create leave table*/
create table leave_category(
leave_id int(11) primary key auto_increment,
category_name varchar(40)
);

select * from leave_category;
truncate table leave_category;

select * from holiday_list;

/* insert into employee details */
INSERT INTO `hrm`.`employee_details` (`employee_id`, `employee_first_name`, `employee_last_name`, `employee_email`, `employee_position`, `employee_branch`) VALUES ('1', 'divine', 'kushiator', 'divinekushiator@gmail.com', 'cleaner', 'accra');
INSERT INTO `hrm`.`employee_details` (`employee_id`, `employee_first_name`, `employee_last_name`, `employee_email`, `employee_position`, `employee_branch`) VALUES ('2', 'edna', 'ankomah', 'ednaankomah@gmail.com', 'marketer', 'swedru');
INSERT INTO `hrm`.`employee_details` (`employee_id`, `employee_first_name`, `employee_last_name`, `employee_email`, `employee_position`, `employee_branch`) VALUES ('3', 'felix', 'amanfor', 'felixamanfor@gmail.com', 'cleaner', 'swdru');
INSERT INTO `hrm`.`employee_details` (`employee_id`, `employee_first_name`, `employee_last_name`, `employee_email`, `employee_position`, `employee_branch`) VALUES ('4', 'patience', 'baidoo', 'patiencebaidoo@gmail.com', 'marketer', 'accra');
INSERT INTO `hrm`.`employee_details` (`employee_id`, `employee_first_name`, `employee_last_name`, `employee_email`, `employee_position`, `employee_branch`) VALUES ('5', 'vicent', 'abu', 'vicentabu@gmail.com', 'accountant', 'accra');
INSERT INTO `hrm`.`employee_details` (`employee_id`, `employee_first_name`, `employee_last_name`, `employee_email`, `employee_position`, `employee_branch`) VALUES ('6', 'jonnathan', 'biney', 'jonnathanbiney@gmail.com', 'accountant', 'swedru');
INSERT INTO employee_details(employee_first_name, employee_last_name, employee_email, employee_position, employee_branch)
values('divine', 'kushiator', 'divinekushiator@gmail.com', 'cleaner', 'accra');


/* update employees details*/
update employee_details 
set employee_first_name = 'james', employee_last_name = 'annane', employee_email = 'jamesannane@gmail.com', 
employee_position ='accountant', employee_branch='accra' where employee_id=3;

delete  from employee_details where employee_id=2;
/* selections  */
select * from hrm_board_members;


select employee_id,  employee_first_name,employee_last_name,
employee_email, employee_position,employee_branch  from employee_details;

select * from employee_details;
select count(*) from branches;
describe employee_details;
select * from branches;
DESCRIBE branches;
/*dont forget to add unique to the employee_details email colum after everything woking out*/
select employee_details.employee_id, employee_details.employee_first_name, employee_details.employee_last_name, 
employee_details.employee_position,
salary.salary_amount,salary.tax_amount 
from employee_details,salary where employee_details.salary_id = salary.salary_id and 
employee_details.employee_position='cleaner';

update employee_details,salary set salary.salary_amount=100,salary.tax_amount='10%' where
 employee_details.salary_id = salary.salary_id and 
employee_details.employee_position='accountant';