--------------------------------------------------------
--  File created - Tuesday-March-14-2017   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table XBBNHF9_USERS_INFO
--------------------------------------------------------
	DROP TABLE "XBBNHF9_USERS_INFO";
   CREATE TABLE "XBBNHF9_USERS" ("USERID" NUMBER, "USERNAME" VARCHAR2(100), "USEREMAIL" VARCHAR2(100), "USERPASS" VARCHAR2(100), "EDIT_FLAG" NUMBER DEFAULT 0);

--------------------------------------------------------
--  DDL for Table XBBNHF9_USERS
--------------------------------------------------------
	DROP TABLE "XBBNHF9_USERS";
  CREATE TABLE "XBBNHF9_USERS_INFO" ("USERID" NUMBER, "FULLNAME" VARCHAR2(200), "CONTACT_NO" VARCHAR2(15), "DATE_OF_BIRTH" DATE, "LOCATION" VARCHAR2(50), "USERPIC" VARCHAR2(50));
 