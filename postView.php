<?php
include("assets/db.php");
include("layouts/head.php");

$userId = $_SESSION['userId'];
if(!$userId){
	header("Location: /phpmessage/loginView.php");
}

$showPost = "SELECT * FROM `posts` WHERE `user_id` = '$userId'";
$resultShow = mysqli_query($connect, $showPost);
?>

<main class="profile_main">
	<div class="container">
		<div class="row">
			<div class="col">
				<h3 style="text-align: center; color: #fff; height: 50px;">Create Post</h3>
			</div>
		</div>

		<div class="row d-flex justify-content-center">
			<div class="col-5">
				<?php if(isset($_SESSION['error'])){ ?>
				<div class="alert alert-danger">
					<ul style="list-style-type: none" class="text-center">
						<?php foreach($_SESSION['error'] as $error){ ?>
							<li><?php echo $error  ?></li>
						<?php } ?>
					</ul>
				</div>
			<?php } ?>
			</div>
		</div>

		<div class="row">
			<div class="col d-flex justify-content-center">
				<form class="form-inline" method="post" action="assets/createPost.php">
				  <div class="form-group mb-2">
				    <label for="title" class="sr-only">Title</label>
				    <input type="text" class="form-control" name="title" placeholder="Title">
				  </div>
				  <div class="form-group mx-sm-3 mb-2">
				    <label for="content" class="sr-only">Content</label>
				    <textarea class="form-control" name="content" rows="1" placeholder = "Content"></textarea>
				  </div>
				  <input type="submit" class="btn btn-primary mb-2" name="create" value="Create">
				</form>
			</div>
		</div>

		<div class="row d-flex justify-content-center">
			<div class="col-7">
				<table class="tab" border="1" width="600"  style="text-align: center">


				    <tr style="color: #fff; font-size: 15px; ">
				        <th style="text-align: center">#</th>
				        <th style="text-align: center">Title</th>
				        <th style="text-align: center">Content</th>
				        <th style="text-align: center">Options</th>
				    </tr>

				    <?php while($row = mysqli_fetch_assoc($resultShow)){ ?>
				    	<tr style="color: #fff; font-size: 15px">
				    		<td><?php echo $row['id'] ?></td>
				    		<td id="tit"><?php echo $row['title'] ?></td>
				    		<td id="cont"><?php echo $row['content'] ?></td>
				    		<td class="tabletd" style="width: 132px">
				    			<a class= "btn btn-success edit" data-toggle="modal" data-target="#editModal" data-post-id="<?php echo $row['id']; ?>" href="">edit</a>
            					<a class="btn btn-danger delete" data-post-id="<?php echo $row['id']?>" href="">delete</a>
            					<div class="modal fade post_modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
							        <div class="modal-dialog post_modal_dialog" role="document">
							            <div class="modal-content post_modal_content">
							                <div class="modal-header">
							                    <h5 class="modal-title font-italic" id="exampleModalLabel">Update Title And Content</h5>
							                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                        <span aria-hidden="true">&times;</span>
							                    </button>
							                </div>
							                <div class="modal-body post_modal_body">                
						                       <input type="text" id="title" name="title" class="form-control title"  value="<?php echo $row['title'] ?>" style="width: 200px; margin: 10px 0">
						                        <textarea rows="10" name="content" id="content" class="content form-control"><?php echo $row['content'] ?></textarea>
							                    <input type="hidden" id="postId">
							                </div>
							                <div class="modal-footer">
							                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							                    <button type="button" class="btn btn-primary save">Save changes</button>
							                </div>
							            </div>
							        </div>
						    	</div>
            				</td>
				    	</tr>
				    <?php } ?>
				</table>
			</div>
		</div> 
	</div>
</main>

<?php
include("layouts/footer.php");