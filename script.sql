create database custom_log;
use custom_log;
create table visita(
	id int auto_increment primary key,
	hour time,
	file varchar(100),
	ip varchar(15),
	languages varchar(100),
	browser varchar(100),
	parameters varchar(500)
);