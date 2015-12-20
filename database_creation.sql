create database CheapoMail;
use CheapoMail;

create table User
(
	id int auto_increment not null,
	firstname varchar(20) not null,
	lastname varchar(20) not null,
	username varchar(20) not null,
	password varchar(50) not null,
	type varchar(5) not null,
	primary key(id) 
);

create table Message
(
	id int auto_increment not null,
	body varchar(1000) not null,
	subject varchar(50) not null,
	user_id int not null,
	recipient_id int not null,
	primary key(id),
	foreign key(user_id) references User(id) on delete cascade on update cascade
);

create table Message_Read
(
	id int auto_increment not null,
	message_id int not null,
	reader_id int not null,
	r_date date not null,
	primary key(id),
	foreign key(message_id) references Message(id) on delete cascade on update cascade,
	foreign key(reader_id) references User(id) on delete cascade on update cascade
);