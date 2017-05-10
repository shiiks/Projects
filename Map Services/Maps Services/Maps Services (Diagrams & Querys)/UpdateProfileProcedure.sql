--------------------------------------------------------
--  File created - Tuesday-March-14-2017   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Procedure UPDATEMAPUSER
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "UPDATEMAPUSER" (
  p_userid IN XBBNHF9_users_info.userID%TYPE,
  p_fullname IN XBBNHF9_users_info.fullName%TYPE,
  p_contact_no IN XBBNHF9_users_info.contact_no%TYPE,
  p_dob IN XBBNHF9_users_info.date_of_birth%TYPE,
  p_location IN XBBNHF9_users_info.location%TYPE,
  p_userpic IN XBBNHF9_users_info.userPic%TYPE
  )
  IS
  
  BEGIN
  
  INSERT INTO XBBNHF9_users_info VALUES(p_userid,p_fullname,p_contact_no,p_dob,p_location,p_userpic);
   
END;
