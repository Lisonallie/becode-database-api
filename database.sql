CREATE DATABASE Notepad;

CREATE TABLE Note
(
    id              INT                     NOT NULL      PRIMARY KEY AUTO_INCREMENT,
    author         VARCHAR (70)    DEFAULT NULL,
    title          VARCHAR (255)   DEFAULT NOT NULL,
    text_entry    TEXT            DEFAULT NULL,
    date_posted     DATE            DEFAULT NULL
);