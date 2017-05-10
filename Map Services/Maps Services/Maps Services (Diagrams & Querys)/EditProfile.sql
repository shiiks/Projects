 --------------------------------------------------------
--  DDL for Procedure UPDATEMAPUSER2
--------------------------------------------------------
set define off;

 CREATE OR REPLACE PROCEDURE "UPDATEMAPUSER2" (
  p_userid IN XBBNHF9_users_info.userID%TYPE,
  p_fullname IN XBBNHF9_users_info.fullName%TYPE,
  p_contact_no IN XBBNHF9_users_info.contact_no%TYPE,
  p_dob IN XBBNHF9_users_info.date_of_birth%TYPE,
  p_location IN XBBNHF9_users_info.location%TYPE,
  p_userpic IN XBBNHF9_users_info.userPic%TYPE
  )
  IS
  
  BEGIN
  
  UPDATE XBBNHF9_users_info SET fullName=p_fullname,contact_no=p_contact_no,date_of_birth=p_dob,location=p_location,userPic=p_userpic where userID=p_userid;
   
END;