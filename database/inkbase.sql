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
