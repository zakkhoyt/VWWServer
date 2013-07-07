

USE eventimages;

SET NAMES utf8;

DROP TABLE IF EXISTS images;

CREATE TABLE images
(
    uuid varchar(64) NOT NULL,
    owner_uuid varchar(64) NOT NULL,
    image_type varchar(64) NOT NULL,
    width integer NOT NULL,
    height integer NOT NULL,
    created_at varchar(64) NOT NULL,
    url varchar(255) NOT NULL,
    PRIMARY KEY (uuid)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;
