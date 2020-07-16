create table tbl_usertype
(
    pk_id int primary key auto_increment,
    usertypename varchar(255),
    isdeleted bit not null
);

create table tbl_user
(
    pk_id int primary key auto_increment,
    name varchar(255),
    email varchar(255),
    password varchar(255),
    constraint fk_usertype foreign key(fk_usertype) references tbl_usertype(pk_id),
    fk_usertype int,
    isdeleted bit not null
);

create table tbl_attendance
(
    pk_id int primary key auto_increment,
    constraint fk_user foreign key(fk_user) references tbl_user(pk_id),
    fk_user int,
    date datetime,
    status varchar(100), 
    isdeleted bit not null
);

create table tbl_notification
(
    pk_id int primary key auto_increment,
    constraint fk_fromuser foreign key(fk_fromuser) references tbl_user(pk_id),
    fk_fromuser int,
    constraint fk_touser foreign key(fk_touser) references tbl_user(pk_id),
    fk_touser int,
    title varchar(200),
    message varchar(2000),
    date datetime,
    status varchar(100), 
    isdeleted bit not null
);

create table tbl_subject
(
    pk_id int primary key auto_increment,
    subjectname varchar(255),
    isdeleted bit not null
);

create table tbl_exam
(
    pk_id int primary key auto_increment,
    constraint fk_subject foreign key(fk_subject) references tbl_subject(pk_id),
    fk_subject int,
    examname varchar(200),
    date datetime,
    status varchar(100), 
    isdeleted bit not null
);

create table tbl_studentexam
(
    pk_id int primary key auto_increment,
    constraint fk_exam foreign key(fk_exam) references tbl_exam(pk_id),
    fk_exam int,
    constraint fk_teacher foreign key(fk_teacher) references tbl_user(pk_id),
    fk_teacher int,
    constraint fk_student foreign key(fk_student) references tbl_user(pk_id),
    fk_student int,
    totalmarks decimal(18,2),
    gainedmarks decimal(18,2),
    date datetime,
    status varchar(100), 
    isdeleted bit not null
);