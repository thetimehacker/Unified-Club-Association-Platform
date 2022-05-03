<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="normalize.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"> -->

	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="student_coordinator.php">Student Coordinator</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="student_coordinator.php">Home</a></li>
      <li class="active"><a href="add_activity.php"> Add</a></li>
      <li><a href="delete_activity.php">Remove</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="fa fa-sign-out "></span>Logout</a></li>
    </ul>
  </div>
</nav>

	<!-- shubham kumar rawat -->
	<section id="adminform" class="section_class">
		<div class="col-sm-12">
			<div class="col-sm-4"></div>
			
			<div class="col-sm-4">
				<div class="admin_heading">
					<h1 style="text-align: center;">Student Coordinator</h1>
				</div>
				<div class="add_club_coordinator" style="margin-bottom: 20px;">
					<h4 style="text-align: center;">Add New Activity</h4>
					<form id="activityform">
						<div class="form-group">
							<input type="text" id="title" placeholder="Title" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="date" placeholder="dd/mm/yyyy"id="date" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="text" id="venue" placeholder="Venue" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="text" id="eligibility" placeholder="Eligibility" class="form-control" required>
						</div>
						<div class="form-group">
							<textarea id="description" placeholder="Description" class="form-control" required rows="4"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Submit" class="btn btn-success btn-block" onclick="savedata();">
						</div>	
					</form>
				</div>

				
				<div class="sign_out">
					<a href="index.php" style="
						padding: 10px 10px;
					    border: 1px solid black;
					    background: black;
					    color: white;
					    border-radius: 10px;
					    text-decoration: none;
					    display: inherit;
					    text-align: center;
					    text-decoration: none;
					    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
					    margin-bottom: 30px;">

						Sign Out

					</a>
				</div>

			</div>

			<div class="col-sm-4"></div>
		</div>
	</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

	function savedata(){
		var title=document.getElementById('title').value;
		var date=document.getElementById('date').value;
		var venue=document.getElementById('venue').value;
		var eligibility=document.getElementById('eligibility').value;
		var description=document.getElementById('description').value;

		if(title!="" && date!="" && venue!="" && eligibility!="" && description!=""){
			
	
			$.ajax(
			{
				type:"POST",
				url:"ajax/add_activity.php",
				data:{title:title,date:date,venue:venue,eligibility:eligibility,description:description}, //cvalue will be passed in ajax
				success:function(data){
					if(data == 0){
						alert('Activity already exists!');
					}
					else if(data == 1){
						//account created
						alert('Successfully created activity!!!');
						open("student_coordinator.php","_self"); //refresh the page

					}
					else if(data == 2){
						alert('Some problem encountered!');
					}
					else{
						alert(data);
					}
				}
			}
			);

		}
		else 
		{
			alert("Invalid Input!");
		}
		
	}
	
</script>
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>
</body>
</html>	