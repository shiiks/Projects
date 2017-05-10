/*
* 	SHIKHAR SARAN SRIVASTAVA
*	201268
*/

package com.bnymellon.lnd.mapsservices.controller;



import java.io.IOException;
import java.text.ParseException;


import javax.servlet.ServletException;
import javax.servlet.http.HttpSession;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import org.springframework.web.bind.annotation.RequestBody;

import org.springframework.web.bind.annotation.RestController;

import com.bnymellon.lnd.mapsservices.model.User;
import com.bnymellon.lnd.mapsservices.service.MapService;



@RestController
public class RegisterLoginController {

	MapService mapservice=new MapService();
	 
	 
	  @PostMapping("/register")
	  public String register(@RequestBody User user) throws ParseException { 
	  user.setUserID(user.getUserID());
	  user.setUserName(user.getUserName());
	  user.setUserEmail(user.getUserEmail());
	  user.setUserPass(user.getUserPass());
	  if(mapservice.register(user)==null){
		  return "Registered";
	  }else{
		  return "Already Registered";
	  }

	  } 
	 
	 @PostMapping("/login")
	 public String login(HttpSession session,@RequestBody User user)  throws ParseException, ServletException, IOException {
		
		 user.setUserEmail(user.getUserEmail());
		 user.setUserPass(user.getUserPass());
		 if(mapservice.login(user)==null)
		 {
			 return "Not Found";
		 }
		 else{
			 session.setAttribute("username",user.getUserName());
			 session.setAttribute("useremail",user.getUserEmail());
			 session.setAttribute("userid", user.getUserID());
			 	return "Found";
		 }
	 }
	 
	 @PostMapping("/edit")
	  public void editProfile(@RequestBody User user) throws ParseException { 
	  user.setUserID(user.getUserID());
	  user.setFullName(user.getFullName());
	  user.setContactNo(user.getContactNo());
	  java.util.Date utilStartDate = user.getDob();
	  java.sql.Date sqlStartDate = new java.sql.Date(utilStartDate.getTime());
	  user.setDob(sqlStartDate);
	  user.setLocation(user.getLocation());
	  user.setUserPic(user.getUserPic()); 
	  mapservice.editProfile(user,user.getUserID());
	  } 
	 
	  @PostMapping("/update")
	  public void updateProfile(@RequestBody User user) throws ParseException { 
	  user.setUserID(user.getUserID());
	  user.setFullName(user.getFullName());
	  user.setContactNo(user.getContactNo());
	  java.util.Date utilStartDate = user.getDob();
	  java.sql.Date sqlStartDate = new java.sql.Date(utilStartDate.getTime());
	  user.setDob(sqlStartDate);
	  user.setLocation(user.getLocation());
	  user.setUserPic(user.getUserPic()); 
	  mapservice.updateProfile(user);

	  } 
	 	
	 @GetMapping("/view/{id}")
	 public User showEverything(HttpSession session,@PathVariable int id){
		try{int i=(Integer)session.getAttribute("userid");
		if(i==id)
		 return mapservice.getEverything(id);
		else
			return null;}
		catch(Exception e){
			System.out.println("Not Allowed");
		}
		return null;
	 }
	 
	 @GetMapping("/viewd/{id}")
	 public int checkEverything(HttpSession session,@PathVariable int id){
		 try{int i=(Integer)session.getAttribute("userid");
			if(i==id)
		 return mapservice.checkEverything(id);
			else
				return 0;}
			catch(Exception e){
				System.out.println("Not Allowed");
			}
			return 0;
	 }
}
