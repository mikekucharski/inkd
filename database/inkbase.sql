/*DElete database if exists and creat a new one*/
DROP DATABASE IF EXISTS inkbase;
CREAT DATABASE inkbase;

USE inkbase;

CREATE TABLE IF NOT EXISTS `user`
(
	u_id int(10) NOT NULL AUTO_INCREMENT,
	first_name VARCHAR(20) NOT NULL,
	last_name VARCHAR(20) NOT NULL,
	email VARCHAR (60) NOT NULL,
	pasword VARCHAR(25) NOT NULL,
	PRIMARY_KEY (u_id),
);

CREATE TABLE IF NOT EXISTS user_info
(
	ui_id int(10) NOT NULL AUTO_INCREMENT,
	home_town VARCHAR(30) NOT NULL,
	current_location VARCHAR(30) NOT NULL,
	school VARCHAR(50) NOT NULL,
	Work_place VARCHAR(50) NOT NULL,
	birthday DATE NOT NULL,
	u_id int(10) NOT NULL AUTO_INCREMENT
	description TEXT,
	PRIMARY_KEY (ui_id),
	FOREIGN KEY (u_id) REFERENCES `user`(u_id) ON DELETE CASCADE
);

CREAT TABLE IF NOT EXISTS friend
(
	f_id int(10) NOT NULL AUTO_INCREMENT,
	u_id int(10) NOT NULL AUTO_INCREMENT,
	u_idf int(10) NOT NULL AUTO_INCREMENT
	FOREIGN KEY (u_id) REFERENCES `user`(u_id) ON DELETE CASCADE,
	FOREIGN KEY (u_idf) REFERENCES `user`(u_id) ON DELETE CASCADE
);
 


