USE eventimages;

SET NAMES utf8;

DROP TABLE IF EXISTS events;

CREATE TABLE events
(
    uuid varchar(64) NOT NULL,
    owner_uuid varchar(64) NOT NULL,
  title varchar(255) NOT NULL,
  created_at varchar(64) NOT NULL,
  latitude real NOT NULL,
  longitude real NOT NULL,
  radius real NOT NULL,
    PRIMARY KEY (uuid)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;