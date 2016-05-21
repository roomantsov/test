<?php for($i = count($reviews)-1 ; $i >= 0; $i--): ?>
	<tr>
		<td><?=$reviews[$i]['author_name'] ?></td>
		<td><?=$reviews[$i]['email'] ?></td>
		<td><?=$reviews[$i]['telephone'] ?></td>
		<td><?=$reviews[$i]['content'] ?></td>
		<td><a href="index.php?page=changeReview.php&action=change&id=<?=$reviews[$i]['id']; ?>" type="button" class="btn btn-xs btn-success">Update</a></td>
		<td>
		<?php if($reviews[$i]['is_moderated']): ?>
			<?php if($reviews[$i]['is_accepted']): ?>
				<a type="button" class="btn btn-xs btn-success disabled">Accepted</a>
			<?php else: ?>
				<a type="button" class="btn btn-xs btn-danger disabled">Declined</a>
			<?php endif; ?>
		<?php else: ?>
			<a type="button" class="btn btn-xs btn-primary disabled">Waiting</a>
		<?php endif; ?>
		</td>
		<td><a href="index.php?page=changeReview.php&action=accept&id=<?=$reviews[$i]['id']; ?>" type="button" class="btn btn-xs btn-success">Accept</a></td>
		<td><a href="index.php?page=changeReview.php&action=decline&id=<?=$reviews[$i]['id']; ?>" type="button" class="btn btn-xs btn-danger">Decline</a></td>	
	</tr>	
<?php endfor; ?>