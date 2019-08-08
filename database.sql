CREATE DATABASE IF NOT EXISTS Notes;

CREATE TABLE IF NOT EXISTS Notepad
(
    ID              int             NOT NULL        PRIMARY KEY AUTO_INCREMENT,
    Note_authors    varchar (70)    DEFAULT NULL,
    Note_titles     varchar (255)   DEFAULT NOT NULL,
    Text_entries    text    (2048)  DEFAULT NULL,
    Date_posted     date            DEFAULT NULL
);