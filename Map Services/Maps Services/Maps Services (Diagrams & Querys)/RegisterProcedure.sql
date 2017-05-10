--------------------------------------------------------
--  File created - Tuesday-March-14-2017   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Procedure INSERTMAPUSER
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "INSERTMAPUSER" (
  p_userid IN XBBNHF9_users.userID%TYPE,
  p_username IN XBBNHF9_users.userName%TYPE,
  p_useremail IN XBBNHF9_users.userEmail%TYPE,
  p_userpass IN XBBNHF9_users.userPass%TYPE
  )
  IS
  
  BEGIN
  
  INSERT INTO XBBNHF9_users VALUES(p_userid,p_username,p_useremail,p_userpass);
   
END;
