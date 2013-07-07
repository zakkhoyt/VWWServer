USE eventimages;

SET NAMES utf8;

DROP TABLE IF EXISTS event_images;

CREATE TABLE event_images
(
    event_uuid varchar(64) NOT NULL,
    image_uuid varchar(64) NOT NULL
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;