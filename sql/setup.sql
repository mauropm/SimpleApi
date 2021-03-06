-- SimpleAPI SQL 
-- (c) 2011 Mauro Parra-Miranda <mauropm@gmail.com>
-- This will setup the new db, with tables and such. 

CREATE DATABASE IF NOT EXISTS messages 
       CHARACTER SET = latin1; 

USE messages; 

-- IID Inbound Message ID 
-- NUM Origin ID NUMBER
-- MSG The Actual message
-- TSTAMP The timestamp of the message
-- PROC Did we process the message already? N - NO, Y - YES. 

CREATE TABLE inbound 
(
	IID int NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (IID), 
	NUM char(10) NOT NULL, 
	MSG varchar(160) NOT NULL, 
	TSTAMP TIMESTAMP NOT NULL,
	PROC char(1) DEFAULT 'N'
); 

