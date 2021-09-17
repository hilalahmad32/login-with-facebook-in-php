<?php 

session_start();

require "./vendor/autoload.php";

$fb=new Facebook\Facebook([
    'app_id'=>'217224857114825',
    'app_secret'=>'2b83fe2b61a6676854f614e79fcded56',
    'default_graph_version'=>"v2.10",
]);


$helper=$fb->getRedirectLoginHelper();
$login=$helper->getLoginUrl("http://localhost:3000/index.php");

try {
    $access_token=$helper->getAccessToken();
    if(isset($access_token)){
        $_SESSION["access_token"]=(string)$access_token;
        header("location:index.php");
    }
} catch (\Throwable $th) {
    //throw $th;
}


if(isset($_SESSION["access_token"])){
    $fb->setDefaultAccessToken($_SESSION["access_token"]);
    $res=$fb->get("/me?locale=en_US&field=name,email,picture");
    $user=$res->getGraphUser();
    $id=$user->getField("id");
    $image="https://graph.facebook.com/{$id}/picture?type=large";
    $name=$user->getField("name");
}

?>