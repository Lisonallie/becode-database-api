CREATE DATABASE notepad;

CREATE TABLE note
(
    id              INT              UNSIGNED       NOT NULL    PRIMARY KEY AUTO_INCREMENT,
    author          VARCHAR (140)                   NULL,
    title           VARCHAR (500)                   NOT NULL,
    text_entry      TEXT                            NULL,
    date_posted     TIMESTAMP                       NULL        CURRENT_TIMESTAMP,
    UNIQUE (title)
);