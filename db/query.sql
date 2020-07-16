

create table tbl_usertype(
    pk_id int primary key auto_increment,
    usertypename nvarchar(255),
    isdeleted boolean not null,
)

create table tbl_user(
pk_id int primary key auto_increment,
name nvarchar(255),
email nvarchar(255),
password nvarchar(255),


)