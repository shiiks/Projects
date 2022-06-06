/*
* 	SHIKHAR SARAN SRIVASTAVA
*	201268
*/

package com.company.path.mapsservices.service;

import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.Date;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;




import org.springframework.stereotype.Service;

import com.company.path.mapsservices.model.User;
import com.company.path.mapsservices.utility.DBUtility;

@Service
public class MapService {
	 String msg=null;
		int ids=0;
	 private Connection connection;
	 public MapService() {
	  connection = DBUtility.getConnection();
	 }
	 
	 public String register(User user) {
		  try {
		   CallableStatement stmt = connection.prepareCall("call INSERTMAPUSER(?, ?, ?, ?, ?)");
		   stmt.setInt(1, user.getUserID());
		   stmt.setString(2, user.getUserName());   
		   stmt.setString(3, user.getUserEmail());
		   stmt.setString(4, user.getUserPass());
		   stmt.setInt(5, 0);
		   stmt.execute();
		  } catch (SQLException e) {
		   msg="Already Registered, Please Login!!!";
		  }
		return msg;
		 }

	public User login(User user) {
		 try {
			   CallableStatement stmt = connection.prepareCall("call LOGINMAPUSER(?, ?, ?, ?)");  
			   stmt.setString(1, user.getUserEmail());
			   stmt.setString(2, user.getUserPass());
			   stmt.registerOutParameter(1, java.sql.Types.VARCHAR);
			   stmt.registerOutParameter(3, java.sql.Types.VARCHAR);
			   stmt.registerOutParameter(4, java.sql.Types.INTEGER);
			   stmt.executeUpdate();
			   String userEmail = stmt.getString(1);
			   String userName = stmt.getString(3);
			   int userid=stmt.getInt(4);
			   user.setUserID(userid);
			   user.setUserEmail(userEmail);
			   user.setUserName(userName);
			  if(userEmail==null || userName==null)
			  {
				  user=null;
			  }
			  else{
				  
			  }
			  } catch (SQLException e) {
			   e.printStackTrace();
			  }
		return user;
		
		
	}

	public void editProfile(User user,int id) {
		try {
			   CallableStatement stmt = connection.prepareCall("call UPDATEMAPUSER(?, ?, ?, ?, ?, ?)");
			   stmt.setInt(1, id);
			   stmt.setString(2, user.getFullName());   
			   stmt.setString(3, user.getContactNo());
			   stmt.setDate(4, (Date) user.getDob());
			   stmt.setString(5, user.getLocation());
			   stmt.setString(6, user.getUserPic());
			   stmt.execute();
				   PreparedStatement stmt2=connection.prepareStatement("update XBBNHF9_USERS set edit_flag=? where userid=?");  
				   stmt2.setInt(1,1);
				   stmt2.setInt(2,id);  
				     
				  stmt2.executeUpdate();  
	
			  } catch (SQLException e) {
			   e.printStackTrace();
			  }
		
	}

	public void updateProfile(User user) {
		try {
			   CallableStatement stmt = connection.prepareCall("call UPDATEMAPUSER2(?, ?, ?, ?, ?, ?)");
			   stmt.setInt(1,user.getUserID());
			   stmt.setString(2, user.getFullName());   
			   stmt.setString(3, user.getContactNo());
			   stmt.setDate(4,  (Date) user.getDob());
			   stmt.setString(5, user.getLocation());
			   stmt.setString(6, user.getUserPic());
			   stmt.execute();
			  } catch (SQLException e) {
			   e.printStackTrace();
			  }
		
		
	}

	public User getEverything(int id) {
		User user=new User();
		try{
			PreparedStatement stmt=connection.prepareStatement("SELECT * FROM XBBNHF9_USERS_INFO WHERE userID=?"); 
			PreparedStatement stmt1=connection.prepareStatement("SELECT * FROM XBBNHF9_USERS WHERE userID=?");
			stmt.setInt(1, id);
			stmt1.setInt(1, id);
			ResultSet rs=stmt.executeQuery();
			ResultSet rs1=stmt1.executeQuery();
			while(rs.next() && rs1.next()){
				user.setUserEmail(rs1.getString(3));
				user.setFullName(rs.getString(2));
				user.setContactNo(rs.getString(3));
				user.setDob(rs.getDate(4));
				user.setLocation(rs.getString(5));
				user.setUserPic(rs.getString(6));
			}
		}catch(SQLException e){
			e.printStackTrace();
		}
		return user;		
	}

	public int checkEverything(int id) {
		try{
			PreparedStatement stmt=connection.prepareStatement("SELECT edit_flag FROM XBBNHF9_USERS WHERE userID=?"); 
			stmt.setInt(1, id);
			ResultSet rs=stmt.executeQuery();
			while(rs.next()){
				ids=rs.getInt("edit_flag");
			}
		}catch(SQLException e){
			e.printStackTrace();
		}

		return ids;
	}

	

	
}
