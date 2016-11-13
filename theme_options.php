<?php 
if (isset($_POST['postback']))
{
// Create an option to the database
delete_option( 'slider_width' );
add_option( 'slider_width', $_POST['slider_width'],'', 'yes' );
delete_option( 'mydeluxkey' );
add_option( 'mydeluxkey', $_POST['mydeluxkey'] );

if(!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) 
    {
        //echo 'No upload';
    }   
    else
    {
$delete = 'yes';
$target_dir = get_template_directory()."/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 1;
    $delete = 'no';
}
if($delete == 'yes' && !file_exists($target_dir.get_option( 'footer_choice_image' )))
{ 
$delete = 'no'; 
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		if($delete == 'yes' )
		{ unlink($target_dir.get_option( 'footer_choice_image' )); }
		delete_option( 'footer_choice_image' );
		add_option( 'footer_choice_image', basename( $_FILES["fileToUpload"]["name"]),'', 'yes' );
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}




echo "<center><h2 style='color:red'>Options Added succesfully</h2></center>";
	
}
?>

<div class="wrap">
<table height="365" style="border-color:#000">
<tr><td width="214"><strong><h1>Theme Options</strong></h1></td></tr>
<form action="" method="post" enctype="multipart/form-data" name="Image_upload">
<tr>
<td>Slider </td>
<td width="489">
Full Width : <input name="slider_width" <?php if(get_option( 'slider_width' )=='full'){?>checked="checked"<?php }?> value="full" type="radio"  style="border-color:#000" <?php if(get_option( 'mydeluxkey')!='mydeluxkey'){?> disabled="disabled" <?php }?> /> 
Center : <input name="slider_width" <?php if(get_option( 'slider_width' )=='center'){?> checked="checked" <?php }?> value="center" type="radio"  style="border-color:#000" /> 
<?php if(get_option('mydeluxkey')!='mydeluxkey'){?>(Note: If you have purchased Premium deluxe Theme Please Enter your key to Enjoy Full width Feature) <?php }?> </td></tr>

<tr>
<td>Deluxe Key</td>
<td>
<input name="mydeluxkey" type="text"  style="border-color:#000" value="<?php echo get_option( 'mydeluxkey' );?>"/>

</td></tr>

<tr>
<td>Choice of Image</td>
<td>
<input name="fileToUpload" type="file"  style="border-color:#000" />
<?php if(get_option( 'footer_choice_image' )!=''){?>
<img src="<?php echo get_template_directory_uri()."/uploads/".get_option( 'footer_choice_image' );?>" style="width:200px;" />
<?php }?>
</td></tr>



<tr>
<td>Click Submit to save settings</td>
<td><input name="postback" type="submit" value="submit" style="border-color:#000"/></td>
</tr>

</form>
</table>
</div>