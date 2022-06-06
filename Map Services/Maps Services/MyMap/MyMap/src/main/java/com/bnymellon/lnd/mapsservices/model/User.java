package com.company.path.mapsservices.model;



import java.util.Date;

import org.springframework.stereotype.Component;
@Component
public class User {
	private int userID;
	private String userName;
	private String userEmail;
	private String userPass;
	private String fullName;
	public User() {
		super();
		
	}

	public User(int userID, String userName, String userEmail, String userPass, String fullName, String contactNo,
			Date dob, String location,int editFlag) {
		super();
		this.userID = userID;
		this.userName = userName;
		this.userEmail = userEmail;
		this.userPass = userPass;
		this.fullName = fullName;
		this.contactNo = contactNo;
		this.dob = dob;
		this.location = location;
	}

	private String contactNo;
	private Date dob;
	private String location;
	private String userPic;
	private int editFlag;

	public int getUserID() {
		return userID;
	}

	public void setUserID(int userID) {
		this.userID = userID;
	}

	public String getUserName() {
		return userName;
	}

	public void setUserName(String userName) {
		this.userName = userName;
	}

	public String getUserEmail() {
		return userEmail;
	}

	public void setUserEmail(String userEmail) {
		this.userEmail = userEmail;
	}

	public String getUserPass() {
		return userPass;
	}

	public void setUserPass(String userPass) {
		this.userPass = userPass;
	}

	public String getFullName() {
		return fullName;
	}

	public void setFullName(String fullName) {
		this.fullName = fullName;
	}

	public String getContactNo() {
		return contactNo;
	}

	public void setContactNo(String contactNo) {
		this.contactNo = contactNo;
	}

	public Date getDob() {
		return dob;
	}

	public void setDob(Date dob) {
		this.dob = dob;
	}

	public String getLocation() {
		return location;
	}

	public void setLocation(String location) {
		this.location = location;
	}

	public String getUserPic() {
		return userPic;
	}

	public void setUserPic(String userPic) {
		this.userPic = userPic;
	}
	public int getEditFlag() {
		return editFlag;
	}
public void setEditFlag(int editFlag) {
	this.editFlag = editFlag;
	
}
	 @Override
	 public String toString() {
	  StringBuilder str = new StringBuilder();
	  str.append(" User Name:- " + getFullName());
	  str.append(" Contact No:- " + getContactNo());
	  str.append(" Dob:- " + getDob());
	  str.append(" Loc:- " + getLocation());
	  return str.toString();
	 }
	 
	 
}
