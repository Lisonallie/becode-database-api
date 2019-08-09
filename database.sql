CREATE DATABASE Notepad;

CREATE TABLE Note
(
    id              INT                     NOT NULL      PRIMARY KEY AUTO_INCREMENT,
    author          VARCHAR (140)    DEFAULT NULL,
    title           VARCHAR (500)   DEFAULT NOT NULL,
    text_entry      TEXT            DEFAULT NULL,
    date_posted     DATE            DEFAULT NULL
);