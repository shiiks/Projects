--------------------------------------------------------
--  File created - Tuesday-March-14-2017   
--------------------------------------------------------
--------------------------------------------------------
--  Constraints for Table XBBNHF9_USERS
--------------------------------------------------------

   ALTER TABLE "XBBNHF9_USERS" MODIFY ("USERNAME" NOT NULL);
  ALTER TABLE "XBBNHF9_USERS" MODIFY ("USEREMAIL" NOT NULL);
  ALTER TABLE "XBBNHF9_USERS" MODIFY ("USERPASS" NOT NULL);
  ALTER TABLE "XBBNHF9_USERS" ADD UNIQUE ("USEREMAIL");
  ALTER TABLE "XBBNHF9_USERS" ADD UNIQUE ("USERNAME");
  ALTER TABLE "XBBNHF9_USERS" ADD UNIQUE ("USERID");
  
--------------------------------------------------------
--  Constraints for Table XBBNHF9_USERS_INFO
--------------------------------------------------------

 ALTER TABLE "XBBNHF9_USERS_INFO" ADD UNIQUE ("CONTACT_NO");
  ALTER TABLE "XBBNHF9_USERS_INFO" ADD UNIQUE ("USERID");
  
--------------------------------------------------------
--  Ref Constraints for Table XBBNHF9_USERS_INFO
--------------------------------------------------------

  ALTER TABLE "XBBNHF9_USERS_INFO" ADD FOREIGN KEY ("USERID") REFERENCES "XBBNHF9_USERS" ("USERID");

