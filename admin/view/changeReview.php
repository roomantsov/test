<?php
	if(isset($_SESSION['role'])){
		if(isset($_GET['action']) && $_GET['action'] == 'accept'){
			Reviews::acceptReview($_GET['id']);
			header("Location: index.php");
		}
		if(isset($_GET['action']) && $_GET['action'] == 'decline'){
			Reviews::declineReview($_GET['id']);
			header("Location: index.php");
		}
		if(isset($_GET['action']) && $_GET['action'] == 'change'): 
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			Reviews::updateReview(intval($_GET['id']), $_POST['content']);
			header('Location: index.php');
		}
			$review_assoc = $DB->query("SELECT * FROM reviews WHERE id=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
			?>
			<div style="width: 50%; margin: 0 auto; margin-top: 10%;">
				<form action="index.php?page=changeReview.php&action=change&id=<?=$review_assoc['id']; ?>" method="POST" role="form">
					<legend>Change content</legend>
					<div class="form-group">
						<label for="">Content</label>
						<textarea type="text" name="content" class="form-control" id="" placeholder="Input field"><?=$review_assoc['content']; ?></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		<?php endif;


	}
?>