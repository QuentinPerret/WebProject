drop table if exists user;
drop table if exists story;
drop table if exists chapter;
drop table if exists link;

create table user (
    usr_id integer not null primary key auto_increment,
    usr_login varchar(50) not null,
    usr_email varchar(50) not null,
    usr_password varchar(88) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table story(
    sto_id integer not null primary key auto_increment,
    sto_title varchar(100) not null,
    sto_description varchar(2000) not null,
    sto_writer_id varchar(150) not null,
    sto_first_ch_id integer,
    sto_image varchar(150)
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table chapter(
    ch_id integer not null primary key auto_increment,
    ch_story_id integer not null, 
    ch_title varchar(100) not null,
    ch_story varchar(2000),
    end_sto boolean
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table link(
    link_id integer not null primary key auto_increment,
    link_ch integer not null,
    link_next integer
)engine=innodb character set utf8 collate utf8_unicode_ci;