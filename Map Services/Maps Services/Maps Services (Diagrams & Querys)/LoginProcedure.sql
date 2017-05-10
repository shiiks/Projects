--------------------------------------------------------
--  File created - Tuesday-March-14-2017   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Procedure LOGINMAPUSER
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "LOGINMAPUSER" (
  p_useremail IN OUT XBBNHF9_users.userEmail%TYPE,
  p_userpass IN XBBNHF9_users.userPass%TYPE,
  p_username OUT XBBNHF9_users.userName%TYPE,
  p_userid OUT XBBNHF9_users.userID%TYPE
  )
  IS

  BEGIN
  
  SELECT userID,userEmail,userName INTO p_userid,p_userEmail,p_userName FROM XBBNHF9_users WHERE userEmail=p_useremail AND userPass=p_userpass;
   
END;
