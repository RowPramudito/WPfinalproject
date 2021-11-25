-- CREATE DATABASE final_project;

CREATE TABLE user_data(
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    user_first_name VARCHAR(20) NOT NULL,
    user_last_name VARCHAR(20) NOT NULL,
    user_password VARCHAR(20) NOT NULL
);

CREATE TABLE notes(
    note_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    note_title VARCHAR(30) NOT NULL,
    note_content TINYTEXT NOT NULL,
    user_id INT REFERENCES user_data(user_id)
);

INSERT INTO `user_data`(`user_id`, `username`, `user_first_name`, `user_last_name`, `user_password`) VALUES (NULL,'qibran','qibran','idza','12345678');
INSERT INTO `user_data`(`user_id`, `username`, `user_first_name`, `user_last_name`, `user_password`) VALUES (NULL,'rowang','rowang','pram','12345678');
INSERT INTO `notes`(`note_id`, `note_title`, `note_content`, `user_id`) VALUES (NULL, 'note 1 title', 'note by qibran content', '1');
INSERT INTO `notes`(`note_id`, `note_title`, `note_content`, `user_id`) VALUES (NULL, 'note 2 title', 'note by rowang content', '2');