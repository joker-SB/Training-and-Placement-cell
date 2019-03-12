<?php

$db=mysqli_connect('localhost','root','','profile');
$sql="select distinct(companyname) from recruiter";
$result=mysqli_query($db,$sql);
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);


?>



<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Bootstrap Modals</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registered Companies</h4>
      </div>
      <div class="modal-body">
        <?php foreach($rows as $row):?>
		<strong><?php echo($row['companyname']);?></strong><br>
		<?php endforeach;?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
