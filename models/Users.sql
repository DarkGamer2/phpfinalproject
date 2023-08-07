DROP DATABASE IF EXISTS dbusers;
CREATE Database Database dbusers;
USE dbusers;

CREATE TABLE tblusers(
    email varchar(255) PRIMARY KEY NOT NULL,
    first_name varchar(255) NOT NULL,
    last_name varchar(255) NOT NULL,
    account_password varchar(255) NOT NULL
)

INSERT INTO tblusers (email, first_name, last_name, account_password);