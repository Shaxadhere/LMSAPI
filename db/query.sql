create table tbl_usertype(
    pk_id int primary key identity,
    usertypename nvarchar(255),
    isdeleted bit not null,
)

create table tbl_user(
pk_id int primary key identity,
name nvarchar(255),
email nvarchar(255),
password nvarchar(255),
fk_usertype int foreign key references tbl_usertype(pk_id),
isdeleted bit not null,
)

create table tbl_attendance(
pk_id int primary key identity,
fk_user int foreign key references tbl_user(pk_id),
date datetime,
status nvarchar(100), 
isdeleted bit not null,
)

create table tbl_notification(
pk_id int primary key identity,
fk_fromuser int foreign key references tbl_user(pk_id),
fk_touser int foreign key references tbl_user(pk_id),
title nvarchar(200),
message nvarchar(max),
date datetime,
status nvarchar(100), 
isdeleted bit not null,
)

create table tbl_subject(
    pk_id int primary key identity,
    subjectname nvarchar(255),
    isdeleted bit not null,
)

create table tbl_exam(
pk_id int primary key identity,
fk_subject int foreign key references tbl_subject(pk_id),
examname nvarchar(200),
date datetime,
status nvarchar(100), 
isdeleted bit not null,
)

create table tbl_studentexam(
pk_id int primary key identity,
fk_exam int foreign key references tbl_exam(pk_id),
fk_teacher int foreign key references tbl_user(pk_id),
fk_user int foreign key references tbl_user(pk_id),
totalmarks decimal(18,2),
gainedmarks decimal(18,2),
date datetime,
status nvarchar(100), 
isdeleted bit not null,
)