START TRANSACTION;
DROP DATABASE IF EXISTS miniBrief;
CREATE DATABASE IF NOT EXISTS miniBrief;
USE miniBrief;
CREATE TABLE IF NOT EXISTS task(
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(50) NOT NULL,
    description varchar(150) NOT NULL DEFAULT '',
    important boolean NOT NULL DEFAULT false
);
COMMIT;
INSERT INTO task (title, description, important) value("work", "i have to go to work at 9h00", 0),
    ("gym", "working out at 17h00", 0);