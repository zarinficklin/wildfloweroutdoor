<?php
require_once( '../../../../../wp-load.php' );
if(current_user_can('edit_posts')){
	$uploads_dir=wp_upload_dir();
	 
	$uploaddir = $uploads_dir[path];
	$uploadname=basename($_FILES['hanafile']['name']);
	
	 if(file_exists($uploaddir.'/'.$uploadname)){
	  	$uploadname=time().$uploadname;
	 }
	
	$uploadfile = $uploaddir.'/'.$uploadname;
	 
	if (move_uploaded_file($_FILES['hanafile']['tmp_name'], $uploadfile)) {
	  echo $uploadname;
	} else {
	  // WARNING! DO NOT USE "FALSE" STRING AS A RESPONSE!
	  // Otherwise onSubmit event will not be fired
	  echo "error";
	}
}else{
	echo 'you don\'t have permission to access this file';
}
