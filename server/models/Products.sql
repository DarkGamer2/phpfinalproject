DROP DATABASE IF EXISTS dbproducts;
CREATE Database Database dbproducts;
USE dbproducts;

CREATE TABLE tblproduct(
    product_id INTEGER PRIMARY KEY AUTOINCREMENT,
    productName VARCHAR(255) NOT NULL,
    productDescription VARCHAR(255) NOT NULL,
    productPrice INTEGER NOT NULL,
    productImageUrl VARCHAR(255) NOT NULL,
)

INSERT INTO tblproduct (product_id, product_name, productDescription, productPrice, productImageUrl)