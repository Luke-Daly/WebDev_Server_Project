CREATE database bookstore;
USE bookstore;

DROP TABLE IF EXISTS US;
DROP TABLE IF EXISTS USERPROFILE;
DROP TABLE IF EXISTS ORDERS;
DROP TABLE IF EXISTS PRODUCTS;
DROP TABLE IF EXISTS PAYMENT;
DROP TABLE IF EXISTS CARD;

CREATE TABLE US (
 US_ID             INT(5) auto_increment,
 USERNAME          VARCHAR(25),
 US_PASSWORD  	 VARCHAR(15),
 EMAIL		 VARCHAR(35),
 PHONE		 VARCHAR(15),
 EMPID		 VARCHAR(25),
 CONSTRAINT US_PRIMARY_KEY PRIMARY KEY (US_ID));

INSERT INTO US VALUES (NULL, 'LukeDaly', 'WebDev', 'lDaly@gmail.com', '087-35-88-124', NULL);

CREATE TABLE USERPROFILE (
 PROFILEID              INT(5) auto_increment,
 FIRSTNAME              VARCHAR(25),
 LASTNAME  			VARCHAR(15),
 US_ID			INT NOT NULL,
 CONSTRAINT USERPROFILE_US_ID_FK FOREIGN KEY (US_ID) REFERENCES US (US_ID),
 CONSTRAINT USERPROFILE_PRIMARY_KEY PRIMARY KEY (PROFILEID));

CREATE TABLE PRODUCTS (
 PRODUCTID              INT(5) auto_increment,
 TITLE               	VARCHAR(40),
 PRICE  			DOUBLE,
 AUTHOR			VARCHAR(30),
 ISBN				VARCHAR(20),
 DISCOUNT			DOUBLE,
 CONSTRAINT PRODUCTS_PRIMARY_KEY PRIMARY KEY (PRODUCTID));

INSERT INTO PRODUCTS VALUES (NULL, 'The Hunger Games', '15.00', 'Suzanne Collins', '978-3-16-148410-0', '0.9');
INSERT INTO PRODUCTS VALUES (NULL, 'Diary of a Wimpy Kid', '10.00', 'Jeff Kinney', '978-0-7334-2609-4', '1');
INSERT INTO PRODUCTS VALUES (NULL, 'Harry Potter and the Goblet of Fire', '20.00', 'J.K Rowling', '989-2-16-133510-0', '1');
INSERT INTO PRODUCTS VALUES (NULL, 'Wonder', '10.00', 'R.J Palacio', '978-92-95055-02-5', '0.85');
INSERT INTO PRODUCTS VALUES (NULL, 'Catching Fire', '15.00', 'Suzanne Collins', '978-0-9767736-6-0', '0.9');
INSERT INTO PRODUCTS VALUES (NULL, 'The Great Gatsby', '20.00', 'F. Scott Fitzgerald', '978-1-78280-808-4', '1');

CREATE TABLE CARD (
 CARDNUM             	VARCHAR(20) NOT NULL,
 EXPDATE               	DATE,
 CCV  			INT NOT NULL,
 NAME				VARCHAR(25),
 CONSTRAINT RD_PRIMARY_KEY PRIMARY KEY (CARDNUM));

CREATE TABLE PAYMENT (
 PAYMENTID              INT(5) auto_increment,
 AMOUNT  			DOUBLE,
 ONLINEPAYMENT		BOOLEAN,
 CARDNUM			VARCHAR(20),
 CONSTRAINT PAYMENT_CARDNUM_FK FOREIGN KEY (CARDNUM) REFERENCES CARD (CARDNUM),
 CONSTRAINT PAYMENT_PRIMARY_KEY PRIMARY KEY (PAYMENTID));

CREATE TABLE ORDERS (
 ORDERNUM            	INT NOT NULL,
 ORDERDATE              DATE,
 US_ID			INT NOT NULL,
 PRODUCTID			INT NOT NULL,
 PAYMENTID			INT NOT NULL,
 CONSTRAINT ORDERS_US_ID_FK FOREIGN KEY (US_ID) REFERENCES US (US_ID),
 CONSTRAINT ORDERS_PRODUCTID_FK FOREIGN KEY (PRODUCTID) REFERENCES PRODUCTS (PRODUCTID),
 CONSTRAINT ORDERS_PAYMENTID_FK FOREIGN KEY (PAYMENTID) REFERENCES PAYMENT (PAYMENTID),
 CONSTRAINT ORDERS_PRIMARY_KEY PRIMARY KEY (ORDERNUM));