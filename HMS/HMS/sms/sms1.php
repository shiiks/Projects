

                            <?php
							$string=$_POST['Message'];
							$roll=$_POST['number'];
							require_once('connect.php'); //connecting to the server
							$query  ="SELECT name,branch,permanent_mobile FROM student_copy WHERE roll=:roll";
							$sth = $dbh->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
							$excute=$sth->execute(array(':roll' => $roll));
							
							if(! $excute )
							{
							exit;
							} 
	
							$result=$sth->fetchall(); // we have to count the no of users with this email id
							
							$row = $result[0];
							$name = $row['name'];
							$branch = $row['branch'];
							$tele = $row['permanent_mobile'];
							//$string.= " ".$name.", "."welcome to kiit university. you branch is ".$branch."";
							$string.= "you have been suspended from the hostel for breaking hostel rules and smoking in the hostel. You remain suspended until further notice";
							echo '<a href="http://sms.osmosis.co.in/sendsms?uname=kiithostel&pwd=kiit1234&senderid=KIITHL&to=', urlencode($tele),'&msg=', urlencode($string),'&route=T">Send</a>';
							?>
                       