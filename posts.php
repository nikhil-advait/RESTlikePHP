<?php 
define("APP_DIR", "");
include "db.php" ;

parse_str($_SERVER['QUERY_STRING'], $query_params);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($query_params['action']) && $query_params['action'] === 'create' && !isset($query_params['id'])){
		Model::save("INSERT INTO posts (title, body) values ('". $_POST['post']['title'] . "', '" . $_POST['post']['body'] . "')"); 
		$posts = Model::find_many("select * from posts");
		include "views/posts/index.html.php";
	}else if(isset($query_params['action']) && $query_params['action'] === 'update' && isset($query_params['id'])){
		Model::save("UPDATE posts SET title = '". $_POST['post']['title'] . "', body = '". $_POST['post']['body'] . "'");
		$post = Model::find_one("select * from posts where id=". $query_params['id']);
		include "views/posts/show.html.php";
	}else if(isset($query_params['action']) && $query_params['action'] === 'delete' && isset($query_params['id'])){
		echo $query_params['action'];
		Model::save("DELETE FROM posts WHERE id=" . $query_params['id']); 
		$posts = Model::find_many("select * from posts");
		include "views/posts/index.html.php";
	}else{
		echo "'action' 'id' combination is not right";
		exit();
	}
}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($query_params['action']) && $query_params['action'] === 'index' && !isset($query_params['id'])){
		$posts = Model::find_many("select * from posts");
		include "views/posts/index.html.php";
	}else if(isset($query_params['action']) && $query_params['action'] === 'new' && !isset($query_params['id'])){
		include "views/posts/new.html.php";
	}else if(isset($query_params['action']) && $query_params['action'] === 'edit' && isset($query_params['id'])){
		$post = Model::find_one("select * from posts where id=". $query_params['id']);
		include "views/posts/edit.html.php";
	}else if(isset($query_params['action']) && $query_params['action'] === 'show' && isset($query_params['id'])){
		$post = Model::find_one("select * from posts where id=". $query_params['id']);
		include "views/posts/show.html.php";
	}else{
		echo "'action' 'id' combination is not right";
		exit();
	}
}else {
	echo $_SERVER['REQUEST_METHOD'] . " request method is not handled!";
	exit();
}


/*if(isset($query_params['action']) && !isset($query_params['id'])) {
	$action = $query_params['action'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($action == 'create'){
			echo $action;
		}else{
			echo "action is not proper";
		}
	}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(in_array($action, array('index', 'new'))){
			echo $action;
		}else{
			echo "action is not proper";
		}	
	}else{
		echo $_SERVER['REQUEST_METHOD'] . " request method is not handled in code!";
		exit();
	}		
	
}else if(isset($query_params['action']) && isset($query_params['id'])){
	$action = $query_params['action'];	$id = $query_params['id'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($action == 'update'){
			echo $action;
		}else{
			echo "action is not proper";
		}
	}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(in_array($action, array('edit', 'show'))){
			echo $action.$id;
		}else{
			echo "action is not proper";
		}	
	}else{
		echo $_SERVER['REQUEST_METHOD'] . " request method is not handled in code!";
		exit();
	}

}else if (!isset($query_params['action'])){
	echo "action is not set";
	exit();
}
*/