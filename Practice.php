
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
include("server.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<title>Simpla Admin</title>

	<?php include("Scripts.php"); ?>
	<!-- Internet Explorer .png-fix -->

		<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
			<![endif]-->
			<script type="text/javascript">
			$(document).ready(function(){
				$("#parent").click(function(){
					if($("#parent").is(':checked')){
						$('.child').attr('checked', true);
					}else{
						$('.child').attr('checked', false);
					}
				});

			});
			</script>

			<?php 
			if (isset($_GET['msg'])) {
				$type = $_GET['msg'];
				if ($type == "0") {
					$_GET['msg'] = "Successfully created...";
					$color = "green";
				}
				else if($type == "1"){
					$_GET['msg'] = "Successfully Deleted...";
					$color = "green";
				}
				else if ($type == "2") {
					$_GET['msg'] = "Successfully updated...";
					$color = "green";
					 session_destroy();
				}
				else if ($type == "3") {
					$_GET['msg'] = "Error...";
					$color = "red";
				}
				else if ($type == "6") {
					$_GET['msg'] = "Successfully Logged In";
					$color = "green";
				}

				?>


				<?php } ?>

				<?php unset($_SESSION['post_data']); ?>

			</head>

			<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->

				<div id="sidebar"><div id="sidebar-wrapper"><!-- Sidebar with logo and menu -->

					<h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>

					<!-- Logo (221px wide) -->
					<a href="#"><img id="logo" src="assets/Images/icons/AnchorLogo.png" Style = "height:100px;margin:60px" alt="Simpla Admin logo" /></a>

					<!-- Sidebar Profile links -->
					<div id="profile-links">
						Hello, <a href="#" title="Edit your profile"><?php echo $_SESSION['username']; ?></a>, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br />
						<br />
						<a href="#" title="View the Site">View the Site</a> | <a href="logout.php" title="Sign Out">Sign Out</a>
					</div>        

					<ul id="main-nav">  <!-- Accordion Menu -->

						<li>
							<a href="http://www.google.com" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
								Dashboard
							</a>       
						</li>

						<li> 
							<a href="#" class="nav-top-item current"> <!-- Add the class "current" to current menu item -->
								Articles
							</a>
							<ul>
								<li><a href="#">Write a new Article</a></li>
								<li><a class="current" href="#">Manage Articles</a></li> <!-- Add class "current" to sub menu items also -->
								<li><a href="#">Manage Comments</a></li>
								<li><a href="#">Manage Categories</a></li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-top-item">
								Pages
							</a>
							<ul>
								<li><a href="#">Create a new Page</a></li>
								<li><a href="#">Manage Pages</a></li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-top-item">
								Image Gallery
							</a>
							<ul>
								<li><a href="#">Upload Images</a></li>
								<li><a href="#">Manage Galleries</a></li>
								<li><a href="#">Manage Albums</a></li>
								<li><a href="#">Gallery Settings</a></li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-top-item">
								Events Calendar
							</a>
							<ul>
								<li><a href="#">Calendar Overview</a></li>
								<li><a href="#">Add a new Event</a></li>
								<li><a href="#">Calendar Settings</a></li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-top-item">
								Settings
							</a>
							<ul>
								<li><a href="#">General</a></li>
								<li><a href="#">Design</a></li>
								<li><a href="#">Your Profile</a></li>
								<li><a href="#">Users and Permissions</a></li>
							</ul>
						</li>      

					</ul> <!-- End #main-nav -->

					<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->

						<h3>3 Messages</h3>

						<p>
							<strong>17th May 2009</strong> by Admin<br />
							Hi Mr. Binod Lamsal. Glad to meet you sir.
							<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
						</p>

						<p>
							<strong>2nd May 2009</strong> by Jane Doe<br />
							And I got some session problems and i will fix it.
							<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
						</p>

						<p>
							<strong>25th April 2009</strong> by Admin<br />
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
							<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
						</p>

						<form action="" method="post">

							<h4>New Message</h4>

							<fieldset>
								<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
							</fieldset>

							<fieldset>

								<select name="dropdown" class="small-input">
									<option value="option1">Send to...</option>
									<option value="option2">Everyone</option>
									<option value="option3">Admin</option>
									<option value="option4">Jane Doe</option>
								</select>

								<input class="button" type="submit" value="Send" />

							</fieldset>

						</form>

					</div> <!-- End #messages -->

				</div></div> <!-- End #sidebar -->

				<div id="main-content"> <!-- Main Content Section with everything -->

					<noscript> <!-- Show a notification if the user has disabled javascript -->
						<div class="notification error png_bg">
							<div>
								Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
							</div>
						</div>
					</noscript>

					<!-- Page Head -->
					<h2>Welcome <?php echo $_SESSION['username']; ?></h2>
					<p id="page-intro">What would you like to do?</p>

					<ul class="shortcut-buttons-set">

						<li><a class="shortcut-button" href="#"><span>
							<img src="assets/Images/icons/pencil_48.png" alt="icon" /><br />
							Write an Article
						</span></a></li>

						<li><a class="shortcut-button" href="#"><span>
							<img src="assets/Images/icons/paper_content_pencil_48.png" alt="icon" /><br />
							Create a New Page
						</span></a></li>

						<li><a class="shortcut-button" href="#"><span>
							<img src="assets/Images/icons/image_add_48.png" alt="icon" /><br />
							Upload an Image
						</span></a></li>

						<li><a class="shortcut-button" href="#"><span>
							<img src="assets/Images/icons/clock_48.png" alt="icon" /><br />
							Add an Event
						</span></a></li>

						<li><a class="shortcut-button" href="#messages" rel="modal"><span>
							<img src="assets/Images/icons/comment_48.png" alt="icon" /><br />
							Open Modal
						</span></a></li>

						<li><a class="shortcut-button" href="loginshow.php"><span>
							<img src="assets/Images/icons/loginUsers.jpg" style = "height:70px;" alt="icon" /><br />
							See Users
						</span></a></li>

					</ul><!-- End .shortcut-buttons-set -->

					<div class="clear"></div> <!-- End .clear -->

					<div class="content-box"><!-- Start Content Box -->

						<div class="content-box-header">

							<h3>Guestbook Table</h3>

							<ul class="content-box-tabs">
								<li><a href="#tab1" class="default-tab">Table</a></li> <!-- href must be unique and match the id of target div -->
								<li><a href="#tab2">Forms</a></li>
							</ul>

							<div class="clear"></div>

						</div> <!-- End .content-box-header -->

						<div class="content-box-content">

							<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
								<div class="notification success png_bg">
									<a href="#" class="close"><img src="assets/Images/cross_grey_small.png" title="Close this notification" alt="close" /></a>
									<div class = "msg">
										<?php   
										if ($color == "green"){ ?>

										<strong><?php echo $_GET['msg']; ?></strong>


										<?php	
									}else{ ?>

									<strong><?php echo $_GET['msg']; ?></strong>
									<?php }
									?>

								</div>
							</div>
							<form method = "post" action = "server.php">
								<table id = "myTable">

									<thead>
										<tr>
											<th>Select all <input type = "checkbox" id = "parent"><input type = "submit" name = "deleteSelected" class = "btn btn-danger" value = "Delete Selected"></th>
											<th>Name</th>
											<th>Address</th>
											<th>Email</th>
											<th>Mobile number</th>
											<th>Status</th>
											<th>Action</th>
										</tr>

									</thead>

									<tfoot>
										<tr>
											<td colspan="6">
												<div class="bulk-actions align-left">
													<select name="dropdown">
														<option value="option1">Choose an action...</option>
														<option value="option2">Edit</option>
														<option value="option3">Delete</option>
													</select>
													<a class="button" href="#">Apply to selected</a>
												</div>

												<div class="pagination align-right" style = "display:none">
													<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
													<a href="#" class="number" title="1">1</a>
													<a href="#" class="number" title="2">2</a>
													<a href="#" class="number current" title="3">3</a>
													<a href="#" class="number" title="4">4</a>
													<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
												</div> <!-- End .pagination -->
												<div class="clear"></div>
											</td>
										</tr>
									</tfoot>

									<tbody>
										<?php
										while ($row = mysqli_fetch_array($result)){


											?>
											<tr>
												<td><input type = "checkbox" class = "child" name = "checkbox[]" value = "<?php echo $row['id']; ?>"></td>
												<td><?php echo $row['name']; ?></td>
												<td><?php echo $row['address']; ?></td>
												<td><?php echo $row['email']; ?></td>
												<td><?php echo $row['Mobile_number']; ?></td>
												<td><?php if($row['status']){ echo 'Active'; }else{ echo 'Inactive'; } ?></td>
												<td><a class = "btn btn-danger" title = "Delete" data-toggle="modal" data-target="#myModal" data-id = "<?php echo $row['id']; ?>"href = "#"><img src="assets/Images/cross.png"></a>
													<a class = "btn btn-info" title = "Edit" href = "server.php?edit=<?php echo $row['id']; ?>"><img src="assets/Images/pencil.png"></button></a></td>


												</tr>
												<?php
											}
											?>
										</tbody>
										<!-- Modal -->
										<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
<!--         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
-->        <h4 class="modal-title" id="myModalLabel">Deleting an account.</h4>
</div>
<div class="modal-body">
	Are you sure you want to delete this user from the list?
</div>
<div class="modal-footer">
	<a class="btn btn-default" data-dismiss="modal">No</a>
	<a class="btn btn-primary" id = "modalDelete" href ="server.php?delete=<?php echo $row['id']; ?>">Yes. Delete this</a>
</div>
</div>
</div>
</div> 

<script type="text/javascript">
$(document).ready(function() {
	$('#myModal').on('show.bs.modal', function(e) {
		var id = $(e.relatedTarget).data('id');
		$('#modalDelete').attr('href', 'server.php?delete=' + id);
	});
	$(document).ready(function(){
		$('#myTable').DataTable();
	});
});

// setTimeout(function(){ jQuery('.msg').fadeOut("slow") }, 3000);

</script>


</table>
</form>

</div> <!-- End #tab1 -->

<div class="tab-content" id="tab2">

						<!-- <form action="" method="post">
							
							<fieldset> Set class to "column-left" or "column-right" on fieldsets to divide the form into columns
								
								<p>
									<label>Small form input</label>
										<input class="text-input small-input" type="text" id="small-input" name="small-input" /> <span class="input-notification success png_bg">Successful message</span>  Classes for input-notification: success, error, information, attention
										<br /><small>A small description of the field</small>
								</p>
								
								<p>
									<label>Medium form input</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input" /> <span class="input-notification error png_bg">Error message</span>
								</p>
								
								<p>
									<label>Large form input</label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p>
								
								<p>
									<label>Checkboxes</label>
									<input type="checkbox" name="checkbox1" /> This is a checkbox <input type="checkbox" name="checkbox2" /> And this is another checkbox
								</p>
								
								<p>
									<label>Radio buttons</label>
									<input type="radio" name="radio1" /> This is a radio button<br />
									<input type="radio" name="radio2" /> This is another radio button
								</p>
								
								<p>
									<label>This is a drop down list</label>              
									<select name="dropdown" class="small-input">
										<option value="option1">Option 1</option>
										<option value="option2">Option 2</option>
										<option value="option3">Option 3</option>
										<option value="option4">Option 4</option>
									</select> 
								</p>
								
								<p>
									<label>Textarea with WYSIWYG</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
								</p>
								
								<p>
									<input class="button" type="submit" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div>End .clear
							
						</form> -->
						<form class = "form-horizontal" method = "post" action = "server.php">
							<fieldset>
								<legend><h3>Create form</h3></legend>

								<div class = "form-group">
									<label for = "name">Name</label>
									<div class = "col-sm-10">
										<input type = "text" class="text-input small-input" name = "name" class = "form-control" placeholder = "Enter your name here" value="<?php echo isset($_SESSION['post_data']['name'])? $_SESSION['post_data']['name'] : $name; ?>">
										<span style = "color:red"><p><?php echo isset($_SESSION['nameErr'])?$_SESSION['nameErr']:'' ?></p></span>
									</div></div>
									<div class = "form-group">
										<label for = "address">Address</label>
										<div class = "col-sm-10">
											<input type = "text" class="text-input small-input" name = "address" class = "form-control" placeholder = "Enter your address here" value = "<?php echo isset($_SESSION['post_data']['address'])? $_SESSION['post_data']['address'] : $address; ?>">
											<span style = "color:red"><p><?php echo isset($_SESSION['addressErr'])?$_SESSION['addressErr']:'' ?></p></span>
										</div></div>
										<div class = "form-group">
											<label for = "email">Email</label>
											<div class = "col-sm-10">
												<input type = "text" class="text-input small-input" name = "email" class = "form-control" placeholder = "Enter your email here" value = "<?php echo isset($_SESSION['post_data']['email'])? $_SESSION['post_data']['email'] : $email; ?>">
												<span style = "color:red"><p><?php echo isset($_SESSION['emailErr'])?$_SESSION['emailErr']:'' ?></p></span>
											</div></div>
											<div class = "form-group">
												<label for = "Mobile_number">Mobile Number</label>
												<div class = "col-sm-10">
													<input type = "text" class="text-input small-input" name = "number" class = "form-control" placeholder = "Enter your number here" value = "<?php echo isset($_SESSION['post_data']['number'])? $_SESSION['post_data']['number'] : $number; ?>">
													<span style = "color:red"><p><?php echo isset($_SESSION['numberErr'])?$_SESSION['numberErr']:'' ?></p></span>
												</div></div>
												<div class = "form-group">
													<label for = "status">Status</label>
													<div class = "col-sm-10">
														<div class = "radio">
															<label>
																<input type = "radio" name = "status" value = "1" checked>Active
															</label>
														</div>

														<div class = "radio">
															<label>
																<input type = "radio" name = "status" value = "0">Inactive
															</label>
														</div>
													</div>
												</div>
												<div class = "form-group">
													<div class = "col-sm-offset-2 col-sm-10">
														<input type = "submit" class = "button" value = "send" name = "send">
													</div>
												</div>



											</fieldset>
										</form>

									</div> <!-- End #tab2 -->        

								</div> <!-- End .content-box-content -->

							</div> <!-- End .content-box -->





							<div id="footer">
								<small> <!-- Remove this notice or replace it with whatever you want -->
									&#169; Copyright 2009 Your Company | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
								</small>
							</div><!-- End #footer -->

						</div> <!-- End #main-content -->

					</div></body>

					</html>
