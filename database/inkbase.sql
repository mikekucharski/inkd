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
	password VARCHAR(64) NOT NULL,
	salt VARCHAR(20) NOT NULL,
	PRIMARY KEY (u_id)
);

CREATE TABLE IF NOT EXISTS user_info
(
	ui_id int(10) NOT NULL AUTO_INCREMENT,
	u_id int(10) NOT NULL,
	hometown VARCHAR(30) NOT NULL,
	location VARCHAR(30) NOT NULL,
	school VARCHAR(50) NOT NULL,
	workplace VARCHAR(50) NOT NULL,
	birthday DATE NOT NULL,
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
	FOREIGN KEY (u_id) REFERENCES `user`(u_id) ON DELETE CASCADE
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

/* TESTING DATA */
/* MIKE */
INSERT INTO user(first_name, last_name, email, password, salt) VALUES('Mike', 'Kucharski', 'mike@gmail.com', '6cfa24d2749f77631027589ed25e48c028158896bb8674db0731622b8af24d49', 'RyWE2qf6kzjdmGswc1wV');
INSERT INTO user_info(u_id,hometown,location, school, workplace, birthday, description) VALUES((select max(u_id) from user),'hometown','location','school','workplace','birthday','Hi there');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Mikes Post Fake Post 1', '2013-11-09 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Mikes Post Fake Post 2', '2013-11-10 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Mikes Post Fake Post 3', '2013-11-11 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Mikes Post Fake Post 4', '2013-11-12 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Mikes Post Fake Post 5', '2013-11-13 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Mikes Post Fake Post 6', '2013-11-14 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Mikes Post Fake Post 7', '2013-11-15 14:52:54');

/* Dhruv */
INSERT INTO user(first_name, last_name, email, password, salt) VALUES('Dhruv', 'Patel', 'dhruv@gmail.com', '6cfa24d2749f77631027589ed25e48c028158896bb8674db0731622b8af24d49', 'RyWE2qf6kzjdmGswc1wV');
INSERT INTO user_info(u_id,hometown,location, school, workplace, birthday, description) VALUES((select max(u_id) from user),'hometown','location','school','workplace','birthday','Hi there');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Dhruv Post Fake Post 1', '2013-11-09 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Dhruv Post Fake Post 2', '2013-11-10 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Dhruv Post Fake Post 3', '2013-11-11 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Dhruv Post Fake Post 4', '2013-11-12 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Dhruv Post Fake Post 5', '2013-11-13 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Dhruv Post Fake Post 6', '2013-11-14 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Dhruv Post Fake Post 7', '2013-11-15 14:52:54');

/* Ahsley */
INSERT INTO user(first_name, last_name, email, password, salt) VALUES('Ashley', 'Packard', 'ashley@gmail.com', '6cfa24d2749f77631027589ed25e48c028158896bb8674db0731622b8af24d49', 'RyWE2qf6kzjdmGswc1wV');
INSERT INTO user_info(u_id,hometown,location, school, workplace, birthday, description) VALUES((select max(u_id) from user),'hometown','location','school','workplace','birthday','Hi there');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Ashley Post Fake Post 1', '2013-11-09 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Ashley Post Fake Post 2', '2013-11-10 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Ashley Post Fake Post 3', '2013-11-11 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Ashley Post Fake Post 4', '2013-11-12 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Ashley Post Fake Post 5', '2013-11-13 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Ashley Post Fake Post 6', '2013-11-14 14:52:54');
INSERT INTO post(u_id, repost_id, message, post_time) VALUES((select max(u_id) from user), -1, 'Ashley Post Fake Post 7', '2013-11-15 14:52:54');


