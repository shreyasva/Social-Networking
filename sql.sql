//person table created
create table person(
ID mediumint UNSIGNED NOT NULL AUTO_INCREMENT,
username varchar(10) NOT NULL,
password VARCHAR(20) NOT NULL,
sex CHAR(1) NOT NULL,
email varchar(30) NOT NULL,
DOB VARCHAR(8),
About_Me VARCHAR(300) NOT NULL,
Status_Message VARCHAR(150) NOT NULL,
PRIMARY KEY(ID)
);

// favorite_tv_shows
create table favorite_tv_shows(
ID MEDIUMINT UNSIGNED NOT NULL,
music VARCHAR(10) NOT NULL,
PRIMARY KEY(ID),
FOREIGN KEY(ID) references person);