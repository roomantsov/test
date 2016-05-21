<?php
	$DB = AdminDB::getConnection();
	class Reviews{
		public static function acceptReview($id){
			AdminDB::getConnection()->exec("UPDATE reviews SET is_accepted=TRUE, is_moderated=TRUE WHERE id={$id}");
		}

		public static function declineReview($id){
			AdminDB::getConnection()->exec("UPDATE reviews SET is_accepted=FALSE, is_moderated=TRUE WHERE id={$id}");
		}

		public static function updateReview($id, $content){
			AdminDB::getConnection()->exec("UPDATE reviews SET content='{$content}', is_changed=TRUE WHERE id={$id}");
		}
	}
	$reviews = AdminDB::getReviews();
?>