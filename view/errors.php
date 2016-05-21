<?php foreach ($errors as $error => $value): ?>
	<div id="error" class="alert alert-<?=$value['type']; ?> error">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong><?=$value['head']; ?>!</strong> <?=$value['body']; ?>
	</div>
<?php endforeach; ?>