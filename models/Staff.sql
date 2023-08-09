USE shop_express;

CREATE TABLE staff(
    staff_id INTEGER PRIMARY KEY AUTOINCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    staff_email VARCHAR(255) NOT NULL,
    staff_password VARCHAR(255) NOT NULL,
)

INSERT INTO staff (staff_id, first_name, last_name,staff_email,staff_password) VALUES ("10001","Smith","Johnson","johnson@gmail.com");