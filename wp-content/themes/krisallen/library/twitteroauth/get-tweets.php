<?php
session_start();
require_once("twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "krisallen";
$notweets = 1;
$consumerkey = "Shdg0RDqnoRFHiJE5l9HhA";
$consumersecret = "Rlkr9yeWZravtxncYfEBRT0prH664UuhFK2VCsp60";
$accesstoken = "25243561-dIxSyg5inDfgJceoAmpJo5HRdtETuAJ8swBx7EX0s";
$accesstokensecret = "g2kD9j4Y8z6my5aaLjgbt7WYlSNZ4ObdOoK896feeQs";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>

