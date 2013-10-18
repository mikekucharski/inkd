/*DElete database if exists and creat a new one*/
DROP DATABASE IF EXISTS inkbase;
CREATE DATABASE inkbase;

USE inkbase;

CREATE TABLE IF NOT EXISTS `user`
(
	u_id int(10) NOT NULL AUTO_INCREMENT,
	first_name VARCHAR(20) NOT NULL,
	last_name VARCHAR(20) NOT NULL,
	email VARCHAR (60) NOT NULL,
	password VARCHAR(25) NOT NULL,
	PRIMARY KEY (u_id)
);

CREATE TABLE IF NOT EXISTS user_info
(
	ui_id int(10) NOT NULL AUTO_INCREMENT,
	home_town VARCHAR(30) NOT NULL,
	current_location VARCHAR(30) NOT NULL,
	school VARCHAR(50) NOT NULL,
	Work_place VARCHAR(50) NOT NULL,
	birthday DATE NOT NULL,
	u_id int(10) NOT NULL,
	description TEXT,
	PRIMARY KEY (ui_id),
	FOREIGN KEY (u_id) REFERENCES `user`(u_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS friend
(
	f_id int(10) NOT NULL AUTO_INCREMENT,
	u_id int(10) NOT NULL,
	u_idf int(10) NOT NULL,
	PRIMARY KEY (f_id),
	FOREIGN KEY (u_id) REFERENCES `user`(u_id) ON DELETE CASCADE,
	FOREIGN KEY (u_idf) REFERENCES `user`(u_id) ON DELETE CASCADE
);
 
CREATE TABLE IF NOT EXISTS post (
	p_id int(10) NOT NULL AUTO_INCREMENT,
	u_id int(10) NOT NULL,
	repost_id int(10) NOT NULL,
	message text NOT NULL,
	post_time DATETIME NOT NULL,
	PRIMARY KEY (p_id),
	FOREIGN KEY (u_id) REFERENCES `user`(u_id) ON DELETE CASCADE,
	FOREIGN KEY (repost_id) REFERENCES post(p_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS like_post (
	lp_id int(10) NOT NULL AUTO_INCREMENT,
	u_id int(10) NOT NULL,
	p_id int(10) NOT NULL,
	PRIMARY KEY (lp_id),
	FOREIGN KEY (u_id) REFERENCES `user`(u_id) ON DELETE CASCADE,
	FOREIGN KEY (p_id) REFERENCES post(p_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `comment`(
	c_id int(10) NOT NULL AUTO_INCREMENT,
	u_id int(10) NOT NULL,
	p_id int(10) NOT NULL,
	message text NOT NULL,
	post_time DATETIME NOT NULL,
	PRIMARY KEY (c_id),
	FOREIGN KEY (u_id) REFERENCES `user`(u_id) ON DELETE CASCADE,
	FOREIGN KEY (p_id) REFERENCES post(p_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS like_comment (
	lc_id int(10) NOT NULL AUTO_INCREMENT,
	u_id int(10) NOT NULL,
	c_id int(10) NOT NULL,
	PRIMARY KEY (lc_id),
	FOREIGN KEY (u_id) REFERENCES `user`(u_id) ON DELETE CASCADE,
	FOREIGN KEY (c_id) REFERENCES `comment`(c_id) ON DELETE CASCADE
);

