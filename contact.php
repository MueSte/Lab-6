<?php include("config.php"); ?>
<?php include("header.php"); ?>
<body>
			<div class="maincontent">
				<div class="container">
				  <form>

				    <label for="fname">First Name</label>
				    <input type="text" id="fname" name="firstname" placeholder="Your name">

				    <label for="lname">Last Name</label>
				    <input type="text" id="lname" name="lastname" placeholder="Your last name">

				    <label for="subject">Subject</label>
				    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

				    <input type="submit" value="Submit">

				  </form>
				</div>
			</div>
<?php include("footer.php"); ?>