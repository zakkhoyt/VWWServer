
//username: eventimages
//host: localhost
//password: 9994sussex


USE eventimages;

SET NAMES utf8;

DROP TABLE IF EXISTS users;

CREATE TABLE users
(
    first_name varchar(64) NOT NULL,
    last_name varchar(64) NOT NULL,
    email varchar(64) NOT NULL,
    passcode varchar(64) NOT NULL,
    uuid varchar(64) NOT NULL,
    created_at varchar(64) NOT NULL,
    PRIMARY KEY (uuid)
)
ENGINE=InnoDB DEFAULT CHARSET=latin1;
