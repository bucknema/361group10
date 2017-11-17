
DROP TABLE IF EXISTS `donor`;
DROP TABLE IF EXISTS `organization`;
DROP TABLE IF EXISTS `item`;
DROP TABLE IF EXISTS `don_order`;
DROP TABLE IF EXISTS `ord_category`;
DROP TABLE IF EXISTS `category`;


-- The "donor" table stores login and contact data for user-donors
CREATE TABLE donor (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  PRIMARY KEY  (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- The "organization" table stores login, contact, and Amazon token 
-- data for organizations
CREATE TABLE organization (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  st_addr VARCHAR(255) NOT NULL,
  city VARCHAR(255) NOT NULL,
  state VARCHAR(25) NOT NULL,
  zipcode INT(10) NOT NULL,
  access_id VARCHAR(255) NOT NULL,
  access_token VARCHAR(255) NOT NULL,
  PRIMARY KEY  (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- The "don_order" table stores data related to Amazon orders, including 
-- foreign keys org_id and don_id that reference the organization and
-- donor tables
CREATE TABLE don_order (
  id INT(11) NOT NULL AUTO_INCREMENT,
  order_date DATE,
  item_ct INT(30) NOT NULL,
  org_id INT(11) NOT NULL,
  don_id INT(11) NOT NULL,
  PRIMARY KEY  (id),
  CONSTRAINT `fk_org_id` FOREIGN KEY (org_id) REFERENCES organization(id) ON UPDATE CASCADE,
  CONSTRAINT `fk_don_id` FOREIGN KEY (don_id) REFERENCES donor(id) ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- The "item" table has the following properties stores data
-- related to individual items that make up an order
CREATE TABLE item (
  id INT(11) NOT NULL AUTO_INCREMENT,
  description VARCHAR(500),
  cost decimal(20,2) NOT NULL,
  order_id INT(11) NOT NULL,
  PRIMARY KEY  (id),
  CONSTRAINT `fk_order_id` FOREIGN KEY (order_id) REFERENCES don_order(id) ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- The "category" table tracks all categories under which an 
-- organization may fall
CREATE TABLE category (
  id INT(11) AUTO_INCREMENT,
  category VARCHAR(255) NOT NULL,
  PRIMARY KEY  (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8; 


-- The "org_cat" table models the many to many relationship
-- between organizations and categories, and has the following properties:
-- org_id - an integer which is a foreign key reference to the organization table
-- cat_id - an integer which is a foreign key reference to the category table
CREATE TABLE org_cat (
  org_id INT(11),
  cat_id INT(11),
  CONSTRAINT `fk_orgID` FOREIGN KEY (org_id) REFERENCES organization(id) ON UPDATE CASCADE,
  CONSTRAINT `fk_catID` FOREIGN KEY (cat_id) REFERENCES category(id) ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

