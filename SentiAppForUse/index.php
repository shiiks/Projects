<?php
use MonkeyLearn\Client  as  MonkeyLearn;
use Codebird\Codebird;

require 'vendor/autoload.php';

Codebird::setConsumerKey('4sSH3x79k3aHJ7uVPP4jOdtSp','oySVGxI9InSzGRLDBoOTObwENT4y6TgJVmKBoiJQBHmSB1qev5');

$db = new PDO('mysql:host=localhost;dbname=tracking','root','');
$ml = new MonkeyLearn('a7ec6d074275c16ad50cb39286c3e73d0322db3a');
$cb = Codebird::getInstance();

$cb->setReturnFormat(CODEBIRD_RETURNFORMAT_ARRAY);

$cb->setToken('142302038-coViv3Sgacvdbg3krPl92Q4jeRvFaLIcQgg3KTAD','pxWFKSY1PtcRKvckhA0dkAyKcOqg1Y6VdCmh1XApDCTww');

$lastId = $db->query("
    SELECT  * FROM  tracking
    ORDER BY  twitter_id
    DESC
    LIMIT 1
")->fetch(PDO::FETCH_OBJ);

$mentions = $cb->statuses_mentionsTimeline($lastId  ? 'since_id=' . $lastId->twitter_id : '');

if(!isset($mentions[0]))  {
  return;
}

  $happyset = [
    '&#x1F601;',
    '&#x1F602;',
    '&#x1F603;',
    '&#x1F604;',
    '&#x1F605;',
    '&#x1F606;',
    '&#x1F609;',
    '&#x1F60A;',
    '&#x1F60C;',
  ];
  $sadset = [
    '&#x1F612;',
    '&#x1F613;',
    '&#x1F614;',
    '&#x1F61E;',
    '&#x1F622;',
    '&#x1F623;',
    '&#x1F625;',
    '&#x1F629;',
    '&#x1F62A;',
  ];
  $neutralset = [
    '&#x1F610;',
    '&#x1F611;',
    '&#x1F636;',
    '&#x1F644;',
  ];

$tweets = [];

foreach($mentions as $index =>  $mention) {
  if(isset($mention['id'])) {
    $tweets[] = [
      'id'  =>  $mention['id'],
      'user_screen_name'  =>  $mention['user']['screen_name'],
      'text'  =>  $mention['text'],
    ];
  }
}

$tweetsText = array_map(function($tweet){
  return  $tweet['text'];
},  $tweets);

$analysis = $ml->classifiers->classify('cl_qkjxv9Ly',$tweetsText,true);

foreach($tweets as  $index  =>  $tweet) {
  switch(strtolower($analysis->result[$index][0]['label'])){
    case 'positive':
      $emojiset = $happyset;
      break;
    case 'neutral':
      $emojiset = $neutralset;
      break;
    case 'negative':
      $emojiset = $sadset;
      break;
  }

  $cb->statuses_update([
    'status'  =>  '@' . $tweet['user_screen_name']  . ' ' . html_entity_decode($emojiset[rand(0,count($emojiset)-1)],0,'UTF-8'),
    'in_reply_to_status_id' =>  $tweet['id'],
  ]);

  $track  = $db->prepare("INSERT INTO tracking  (twitter_id)  VALUES  (:twitter_Id)");
  $track->execute([
    'twitter_Id'  =>  $tweet['id'],
  ]);
}
 ?>
