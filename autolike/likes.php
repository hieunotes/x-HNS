<?php
if(isset($_GET['id']) && !empty($_GET['type']) && isset($_GET['token'])){
$token = $_GET['token'];
$limit = $_GET['lm'];
$id= $_GET['id']; 
$type = $_GET['type'];
if($limit < 1){
$limit = "5";
};
$get_name = file_get_contents("https://graph.facebook.com/".$id."/?fields=name&access_token=" . $token);
$json = json_decode($get_name, true);
$link = file_get_contents("https://graph.facebook.com/".$id."/feed?fields=id&limit=".$limit."&access_token=".$token); 
$graph = json_decode($link); 

	echo "Đã like ". $limit . " bài viết của: <b>" .$json['name'].   "</b><br/>";
foreach($graph->data as $post_id)
         {
            $id_post = $post_id->id; 
           $loop = array($id_post);
          $typ = strtoupper($type);       
     foreach($loop as $data_id)
{
		$like = "https://graph.facebook.com/$data_id/reactions?method=POST&type=$typ&access_token=$token";
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $like);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);

		$page = curl_exec($ch);
		
	$post_id = substr($data_id, strpos($data_id, "_") + 1);

 //echo $post_id . "<br/>";		
		echo "<a href='https://m.facebook.com/story.php?story_fbid=" . $post_id . "&id=" . $id . "' target='_blank'>" . $post_id . "</a><br />";
	}
}
}else{
 echo "Bạn đã nhập 1 cái gì đó sai sai";
 }