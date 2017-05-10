<?php
include_once 'dbconfig.php';
if(!$user->is_loggedin())
{
	$user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>welcome - <?php print($userRow['user_email']); ?></title>
<style>

.lefttab
{
	margin-left: 20px;
	width: 100px;
	
}
.middle
{
	display:inline-block;
	position:absolute;
	top:300px;
	left:330px;
}

img
{
	width:200px;
	height:197px;
	margin-left:3px;
	
}
img:hover
{
	cursor:pointer;
	border:1px solid #00a2d1;
}
.middle a
{
	text-decoration:none;
	margin-top:20px;
}
.down{
	margin-right:-550px;
margin-top:-200px;	
margin-bottom:90px;
border:3px solid #00a2d1;
height:203px;
}

</style>
<script>
var selectedBox = null;

$(document).ready(function() {
    $(".chb").click(function() {
        selectedBox = this.id;

        $(".chb").each(function() {
            if ( this.id == selectedBox )
            {
                this.checked = true;
            }
            else
            {
                this.checked = false;
            };        
        });
    });    
});
</script>

</head>

<body oncontextmenu="return false">

	<?php include('header.php'); ?>

<div class="content">
<h1>Notice Board</h1>
<div class="lefttab">
<h4>Select Hostel,Branch,Year</h4>
<form action="home.php" method="POST">
<label>Hostel</label><br/>
<input type="checkbox" name="hostel[]" value="K.P-6" class="chb">K.P-6</input><br/>
<input type="checkbox" name="hostel[]" value="K.P-9" class="chb">K.P-9</input><br/>
<input type="checkbox" name="hostel[]" value="Q.C-4" class="chb">Q.C-4</input><br/>
<label>Branch</label><br/>
<input type="checkbox" name="branch[]" value="CSE" class="chb">CSE</input><br/>
<input type="checkbox" name="branch[]" value="I.T" class="chb">I.T</input><br/>
<label>YEAR</label><br/>
<input type="checkbox" name="year[]" value="2011" class="chb">2011</input><br/>
<input type="checkbox" name="year[]" value="2012" class="chb">2012</input><br/>
<input type="checkbox" name="year[]" value="2013" class="chb">2013</input><br/>
<input type="submit" value="See Notices"/>
</form>
</div>
<?php
if(isset($_POST['hostel']) && isset($_POST['branch']) && isset($_POST['year']))
{
	if(!empty($_POST['hostel']) && !empty($_POST['branch']) && !empty($_POST['year']))
	{
				$arrayName = $_POST['hostel'];
				$arrayName2 = $_POST['branch'];
				$arrayName3 = $_POST['year'];
				$hostel=implode(",",$arrayName);
				$branch=implode(",",$arrayName2);
				$year=implode(",",$arrayName3);
				$stmt2=$DB_con->prepare("SELECT doc,summary FROM doc WHERE find_in_set(:hostel, hostel) > 0 AND find_in_set(:branch, branch) AND find_in_set(:year, year);");
				$stmt2->execute(array(":hostel"=>$hostel,":branch"=>$branch,":year"=>$year));
					?>
					<div class="middle">
					<?php
					while($userRow2=$stmt2->fetch(PDO::FETCH_ASSOC)) {
					if (!empty($userRow2['doc'])){
						?>						
						<img src="<?php print($userRow2['doc']); ?>"/>
						<div class="down">
						<h3>Description</h3><br/>
						<div class="matter"><?php print($userRow2['summary']); ?></div>
						<a href="<?php print($userRow2['doc']); ?>" target="_blank" class="btn btn-primary btn-xl" >View</a>
						<a href="<?php print($userRow2['doc']); ?>" class="btn btn-primary btn-xl" download>Download</a>
						</div>
						<?php
					}
					else 
					{
						echo "No records.";
					}
				}?>
					</div>
					<?php
				
			}
			else {
				echo "No Notice Found.";
			}
}
else {
	echo "Please fill in all fields.";
}

?>

</div>
</body>
</html>
