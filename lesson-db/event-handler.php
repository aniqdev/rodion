<?php



if (isset($_POST['post-toogle-private'])) {
	post_toogle_private($_POST['post_id']);
}

if (isset($_GET['likes-count']) && $_GET['likes-count'] === 'increase') {
	increase_post_likes_count();
}

if (isset($_GET['dislikes-count']) && $_GET['dislikes-count'] === 'increase') {
	increase_post_dislikes_count();
}

if (isset($_POST['add-post-comment'])) {
	add_post_comment($_POST['post_id'], $_POST['user_id'],  $_POST['comment']);
}