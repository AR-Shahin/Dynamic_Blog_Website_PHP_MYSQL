<?php
function connectDB() {
	$con = mysqli_connect('localhost', 'root', '', 'blog_project');
	return $con;
}
?>