<?php

// Filename to write to (needs to be writable by the web server)
define( 'CSV_FILENAME', 'trail-register.csv' );

// Handle POST
if( isset( $_POST[ 'submit_btn' ] ) ) {
	// Create the file and add the header if the file doesn't exist
    if( !file_exists( CSV_FILENAME ) ) {
        $csvHeader = "name,age,email,phone,address,emergency_contact,emergency_contact_phone,course_selection,tshirt_size,charity,other_charity,how_did_you_hear,cycling_club\n";
        $success = file_put_contents( CSV_FILENAME, $csvHeader );
        if( !$success ) {
        	throw new Exception( "Failed to write to file " . CSV_FILENAME . ". Please check permissions." );
        }
    }
    $charity = '';
    if( !empty( $_POST[ 'other_charity' ] ) ) {
    	$charity = $_POST[ 'other_charity' ];
    }
    
    // Undo magic quotes
    if( get_magic_quotes_gpc() == 1 ) {
    	foreach( $_POST as $key => $val ) {
    		$_POST[ $key ] = stripslashes( $val );
    	}
    }
    
    // Remove backslashes and double quotes and escape single quotes
    $post = $_POST;
	foreach( $_POST as $key => $val ) {
		$post[ $key ] = str_replace( array( "\\", "'", "\"" ), array( "", "\\'", "" ), $val );
	}
    
    $csvLine = '"' . $post[ 'name' ] . '","' . $post[ 'age' ] . '","' . $post[ 'email' ] . '","' . $post[ 'phone' ] . '","' . 
      	$post[ 'address' ] . '","' . $post[ 'emergency_contact' ] . '","' .	$post[ 'emergency_contact_phone' ] . '","' . 
      	$post[ 'course_selection' ] . '","' . $post[ 'tshirt_size' ] . '","' . 
    	$post[ 'charity' ] . '","' . $charity . '","' . $post[ 'how_did_you_hear' ] . '","' . $post[ 'cycling_club' ] . "\"\n";
    
    // Write to the file
    $success = file_put_contents( CSV_FILENAME, $csvLine, FILE_APPEND );
    if( !$success ) {
    	throw new Exception( "An error occured durring your registration. <a href='../forms/feedback_form.html'>Please let us know!</a>" );
    }
    
    // Redirect to checkout
    header( "Location:../store/?product=wildflower-trail-registration" );
    exit();
}

// Options for select
$tshirtSizeOptions = array( 'xs', 's', 'm', 'l', 'xl', 'xxl', 'xxxl', 'xxxxl' );
$charityOptions = array( 'Morgan County Share the Road Signs', 'The Christmas Box House', 'Hess Cancer Foundation', 'Girls on the Run', 'Other' );
$courseOptions = array( 'beginner', 'sport', 'expert' );

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Wildflower</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="chrome=1">
	<meta name="description" content="">
	
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
	<!-- styles -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="../css/style.css">
	
	<!-- fonts, favicon, and touch icons -->
	<link rel="shortcut icon" href="img/favicon.png">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
	
	<!-- javascripts at the bottom for faster page loads -->
</head> 
<body> 



<div class="wf-header">
	<div class="container">
		<div class="logo">
			<a href="http://wildfloweroutdoor.com"><img src="../img/logo.png" /></a>
		</div>
		<div class="cart-search-wrap">
			<div class="cart-nav">
				<p><a href="http://wildfloweroutdoor.com/store/?page_id=1436">My Account</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://wildfloweroutdoor.com/store/?page_id=1433">Shopping Cart</a></p>
			</div>
			<div class="wf-search">
				<!-- <input type="text" class="input" id="name" name="name" placeholder="Search" > -->
			</div>
		</div>
	</div>
</div>




<ul class="main-nav container">
	<div class="dd-item">
		<a href="http://wildfloweroutdoor.com/"><ul style="padding:0;">HOME</ul></a>
	</div>
	<div class="dropdown dd-item">
		<a class="dropdown-toggle nav-btn green" style="cursor:pointer;" data-toggle="dropdown">MOUNTAIN <br/>BIKING</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=mountain-biking">View All</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=tops">Tops</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=bottoms">Bottoms</a></li>
		</ul>
	</div>
	<div class="dropdown dd-item">
		<a class="dropdown-toggle nav-btn green" data-toggle="dropdown" href="#">ROAD <br/>BIKING</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=road-biking">View All</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=tops-road-biking">Tops</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=bottoms-road-biking">Bottoms</a></li>
		</ul>
	</div>
	<div class="dd-item">
		<a href="http://wildfloweroutdoor.com/store/?product_cat=skiing-and-snowboading ">SKIING &amp; <br/>SNOWBOARDING</a>
	</div>
	<div class="dropdown dd-item">
		<a class="dropdown-toggle nav-btn green" data-toggle="dropdown" href="#">SHOES &amp; <br/>ACCESSORIES</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=shoes-and-accessories">View All</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=jewelry">Jewelry</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=cold-weather-gear">Cold weather gear</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=headwear">Headwear</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=electronics">Electronics</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=socks">Socks</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=water-bottles">Water Bottles</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=other">Other</a></li>
			
		</ul>
	</div>
	<div class="dropdown dd-item">
		<a href="http://wildfloweroutdoor.com/store/?product_cat=bags-and-packs">BAGS &amp; <br/>PACKS</a>
	</div>
	<div class="dropdown dd-item">
		<a class="dropdown-toggle nav-btn green" data-toggle="dropdown" href="#">APR&Egrave;S <br/>SPORT</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=tops-apres-sport">Tops</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/store/?product_cat=bottoms-apres-sport">Bottoms</a></li>
		</ul>
	</div>
	<div class="dropdown dd-item">
		<a href="http://wildfloweroutdoor.com/store/?product_cat=training">TRAINING</a>
	</div>
	<div class="dropdown dd-item">
		<a class="dropdown-toggle nav-btn green" data-toggle="dropdown" href="#">EVENT<br/>REGISTRATION</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/pedalfest-register/index.php">Wildflower Pedalfest</a></li>
			<li><a tabindex="-1" href="http://wildfloweroutdoor.com/trail-register/index.php">Wildflower Trailfest</a></li>
		</ul>
	</div>
	<div class="dropdown dd-item last">
		<a href="http://wildfloweroutdoor.com/store/?product_cat=sale">SALE</a>
	</div>
</ul>





<div class="container">
	<div class="padding register-form">
	<form class="form-horizontal" action="index.php" method="POST" enctype="multipart/form-data" id="register_form">
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="name">Name:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="name" name="name" value="<?php if( !empty( $_POST[ 'name' ] ) ) { echo( $_POST[ 'name' ] ); } ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="age">Age on Sept 14, 2013:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="age" name="age"  value="<?php if( !empty( $_POST[ 'age' ] ) ) { echo( $_POST[ 'age' ] ); } ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="age">E-mail Address:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="email" name="email" value="<?php if( !empty( $_POST[ 'email' ] ) ) { echo( $_POST[ 'email' ] ); } ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="age">Phone Number:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="phone" name="phone"  value="<?php if( !empty( $_POST[ 'phone' ] ) ) { echo( $_POST[ 'phone' ] ); } ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="age">Address:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="address" name="address"  value="<?php if( !empty( $_POST[ 'address' ] ) ) { echo( $_POST[ 'address' ] ); } ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="emergency_contact">Emergency Contact Name:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="emergency_contact" name="emergency_contact"  value="<?php if( !empty( $_POST[ 'emergency_contact' ] ) ) { echo( $_POST[ 'emergency_contact' ] ); } ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="emergency_contact_phone">Emergency Contact Phone:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="emergency_contact_phone" name="emergency_contact_phone"  value="<?php if( !empty( $_POST[ 'emergency_contact_phone' ] ) ) { echo( $_POST[ 'emergency_contact_phone' ] ); } ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="course_selection">Course Selection:</label>
				<div class="controls">
					<select name="course_selection">
						<option class="muted" disabled value="" selected>Please select...</option>
						<?php 
						// Outputs the options for course_selection
						foreach( $courseOptions as $opt ) {
							if( !empty( $_POST[ 'course_selection' ] ) && $_POST[ 'course_selection' ] == $opt ) {
								echo( "<option selected>$opt</option>" );
							}
							else {
								echo( "<option>$opt</option>" );
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="tshirt_size">Women's Regular T Shirt Size:</label>
				<div class="controls">
					<select name="tshirt_size">
						<option class="muted" disabled value="" selected>Please select...</option>
						<?php 
						// Outputs the options for t-shirt size
						foreach( $tshirtSizeOptions as $opt ) {
							if( !empty( $_POST[ 'tshirt_size' ] ) && $_POST[ 'tshirt_size' ] == $opt ) {
								echo( "<option selected>$opt</option>" );
							}
							else {
								echo( "<option>$opt</option>" );
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="charity">Charity you would like to support:</label>
				<div class="controls">
					<select name="charity" class="input-xlarge" onchange="if( this.selectedIndex == <?php echo( count( $charityOptions ) ); ?> ) $('#other_charity_group').show(); else $('#other_charity_group').hide();">
						<option class="muted" disabled value="" selected>Please select...</option>
						<?php 
						// Outputs the options for Charity
						foreach( $charityOptions as $opt ) {
							if( !empty( $_POST[ 'charity' ] ) && $_POST[ 'charity' ] == $opt ) {
								echo( "<option selected>$opt</option>" );
								if( $opt == 'Other' ) {
									echo( '
											<script type="text/javascript">
											$( document ).ready( function() {
												$("#other_charity_group").show();
											});
											</script> ' );
								}
							}
							else {
								echo( "<option>$opt</option>" );
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="control-group" id="other_charity_group">
				<label class="control-label" for="other_charity">Other:</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="other_charity" name="other_charity"  value="<?php if( !empty( $_POST[ 'other_charity' ] ) ) { echo( $_POST[ 'other_charity' ] ); } ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="how_did_you_hear">How did you hear about us?</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="how_did_you_hear" name="how_did_you_hear"  value="<?php if( !empty( $_POST[ 'how_did_you_hear' ] ) ) { echo( $_POST[ 'how_did_you_hear' ] ); } ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="cycling_club">Cycling Club Affiliation</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="cycling_club" name="cycling_club"  value="<?php if( !empty( $_POST[ 'cycling_club' ] ) ) { echo( $_POST[ 'cycling_club' ] ); } ?>">
				</div>
			</div>
			<div class="control-group">
				<p>By clicking continue, you agree to the terms on <a href="pedalfest-waiver.doc" target="_blank">our waiver</a>.</p>
				<p>After completing this form, click continue and add the event registration to your cart to complete registration.</p>
				<button class="btn btn-large btn-warning" name="submit_btn">Continue</button>
			</div>
		</fieldset>
	</form>
	</div>
	
</div>

<div class="newsletter-signup container">
	<form class="form-inline" action="forms/mailinglist.php" method="POST" enctype="multipart/form-data" name="contact-form">
		<label class="checkbox">For more information about Wildflower events, group rides, &amp; clinics, sign up here:
			<input type="text" class="input" placeholder="Email" name="email" style="width:150px;">
		</label>
		<button type="submit" class="btn">Sign Up</button>
	</form>
	<div class="connect">
		<a href="http://www.youtube.com/user/wildfloweroutdoor"><img src="../img/youtube.png" /></a>
		<a href="http://www.pinterest.com/wfoutdoor"><img src="../img/pinterest.png" /></a>
		<a href="http://www.facebook.com/wildfloweroutdoor"><img src="../img/facebook.png" /></a>
	</div>
</div>



<div class="wf-footer">
	<div class="container">
		<ul class="footer-nav container">
			<li><script language="JavaScript"> document.write('&copy;' + (new Date()).getFullYear()); </script> Wildflower Outdoor</li>
			<a href="http://wildfloweroutdoor.com/store/?page_id=1449"><li>ABOUT US</li></a>
			<a href="http://wildfloweroutdoor.com/store/?page_id=78"><li class="last">CONTACT US</li></a>
			<a href="http://wildfloweroutdoor.com/store/?page_id=1454"><li>PRIVACY POLICY</li></a>
			<a href="http://wildfloweroutdoor.com/store/?page_id=1454"><li>REFUND POLICY</li></a>
			<a href="http://wildfloweroutdoor.com/store/?p=1488"><li>SHIPPING POLICY</li></a>
		</ul>
	</div>
</div>



<!-- scripts & modals below -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/jquery.validate.additional-methods.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<script>
$(function() {
    $('.carousel').carousel({
	  interval:6000
	})
});

$(document).ready(function(){
	$("#other_charity_group").hide();
	
	$('#register_form').validate( {
		rules: {
			name: {
				required: true
			},
			age: {
				required: true,
				number: true,
				maxlength: 2
			},
			email: {
				required: true,
				email: true
			},
			phone: {
				required: true,
				phoneUS: true
			},
			address: {
				required: true
			},
			emergency_contact: {
				required: true
			},
			emergency_contact_phone: {
				required: true,
				phoneUS: true
			},
			course_selection: {
				required: true
			},
			tshirt_preference: {
				required: true
			},
			tshirt_size: {
				required: true
			},
			charity: {
				required: true
			}
		},
		highlight: function(element) {
			$(element).closest('.control-group').removeClass('success').addClass('error');
		},
		success: function(element) {
			element.addClass('valid').closest('.control-group').removeClass('error').addClass('success');
		},
		errorPlacement: function(error, element) {
			error.insertAfter(element);
		}
	});
});
</script>

<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7 ]>
<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->

</body>
</html> 


</body>
</html>