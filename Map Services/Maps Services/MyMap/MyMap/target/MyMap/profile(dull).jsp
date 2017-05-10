<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
    <%@ page import="javax.servlet.http.HttpSession" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Profile</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<%
if(session!=null){
String name=(String)session.getAttribute("username");
String email=(String)session.getAttribute("useremail");
if(name==null || email==null){
	RequestDispatcher rd=request.getRequestDispatcher("login.jsp");
	rd.forward(request,response);
}
%>
This is your profile!!!!
<a href="editprofile.jsp">Edit Profile</a>
<a href="logout.jsp">Logout</a>

<%
out.print(name + " ");
out.print(email);
}
else{
	RequestDispatcher rd=request.getRequestDispatcher("login.jsp");
	rd.forward(request,response);
}
%>

<script>
$(document).keydown(function(event){
    if(event.keyCode==123){
    return false;
   }
else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
      return false;  //Prevent from ctrl+shift+i
   }
});
$(document).on("contextmenu",function(e){        
	   e.preventDefault();
	});
</script>
</body>
</html>