CREATE DATABASE Notes;

CREATE TABLE Notepad
(
    id              INT                     NOT NULL      PRIMARY KEY AUTO_INCREMENT,
    authors         VARCHAR (70)    DEFAULT NULL,
    titles          VARCHAR (255)   DEFAULT NOT NULL,
    text_entries    TEXT            DEFAULT NULL,
    date_posted     DATE            DEFAULT NULL
);