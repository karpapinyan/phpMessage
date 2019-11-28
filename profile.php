<?php

include "assets/db.php";
include "layouts/head.php";

$userId = $_SESSION['userId'];
if(!$userId){
	header("Location: /phpmessage/loginView.php");
}


$select = "SELECT * FROM `users` WHERE id = '$userId' LIMIT 1";
$result = mysqli_query($connect, $select);

$user = mysqli_fetch_assoc($result);

$showUsers = "SELECT * FROM `users` WHERE `id` != $userId ";
$resultShowUsers = mysqli_query($connect, $showUsers);

?>
<main class="profile_main">
<div class="container">
	<div class="row">
		<div class="col">
			<?php if ($user['gender'] == "MALE") { ?>
        		<img src="img/male.png">
    		<?php } else if ($user['gender'] == "FEMALE") { ?>
        		<img src="img/female.png">
    		<?php } else { ?>
        		<img src="img/company.png">
    		<?php } ?>
    		<h3 class="user_name"><?php echo $user['firstname'] . " " . $user['lastname']  ?></h3>
		</div>

		<div class="col">
			<ul class="float-right" style="list-style-type: none">
                <h4 style="color: #fff">Registered Users</h4>
				<?php while ($row = mysqli_fetch_assoc($resultShowUsers)) {?>
					<li><h4 style="color:#fff"><a  data-post-id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#user_<?php echo $row['id'] ?>" class="sendMessage" href=""> <?php echo $row["firstname"] . " " . $row["lastname"] ?></a></h4></li>
						 <div class="modal fade profile_modal" id="user_<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            
        <div class="modal-dialog profile_modal_dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['firstname'] . " " . $row['lastname'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body profile_modal_body">

                    <?php
                    	$rowId = $row['id'];
                    	$sel = "SELECT * FROM `messages` WHERE `user_id` = '$userId' AND `user2_id` = '$rowId' OR `user_id` = '$rowId' AND `user2_id` = '$userId'";
                    	$res = mysqli_query($connect, $sel);
                    	

                    ?>
                        <div class="showItems">
                            <ul id="append_ul_<?php echo $row['id'] ?>">
                            <?php while($col = mysqli_fetch_assoc($res)){ ?>
                            	<li class="show_li_<?php echo $col['user2_id'] ?>"  id="show"  <?php if($userId == $col['user_id']){ ?>  style="display:block; font-weight: bolder; background-color: #3578E5; color: #fff;padding: 8px;  margin: 10px 0; border-radius: 15px; width: max-content; font-size: 15px"  <?php } else{ ?> style="display: block; font-weight: bolder; background-color:  #F2F3F5; color: black;padding: 10px; margin: 10px 0; border-radius: 15px; width: max-content; font-size: 15px; " <?php } ?>><?php echo $col['content'] ?>
                                    </li>
                            <?php  } ?>
                            </ul>
                        </div>

                </div>
                <div class="modal-footer" style="justify-content: flex-start;">
	                	<div class="form-group d-flex justify-content-left mx-sm-3 mb-2">
						    <textarea id="content_<?php echo $row['id'] ?>"  class="form-control" name="content" rows="1" cols="40" placeholder = "message"></textarea>
						    <button type="button" name="send" id="send" data-post-id="<?php echo $row['id'] ?>"><i class="fa fa-paper-plane" aria-hidden="true" style="font-size:25px;color:blue;"></i></button>
						     <input type="hidden" id="postId">
					  </div>
                </div>
            
            </div>
        </div>
    </div>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
</main>

<?php
include "layouts/footer.php";