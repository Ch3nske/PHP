-- auto-generated definition
create table user
(
    UID   int auto_increment
        primary key,
    UName varchar(40)  null,
    label varchar(255) null
);

-- auto-generated definition
create table labels
(
    uid   int auto_increment
        primary key,
    label varchar(255) null,
    foreign key (label) references user(label)
);

