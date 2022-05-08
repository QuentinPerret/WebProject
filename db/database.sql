create database if not exists mystory character set utf8 collate utf8_unicode_ci;
use mystory;
flush privileges;
grant all privileges on mystory.* to 'mystory_user'@'localhost' identified by 'secret';
