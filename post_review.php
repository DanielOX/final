<?php
$conn = mysqli_connect('127.0.0.1','root','','community');
session_start();
$uid = $_SESSION['user_id'];
$pid = $_GET['pid'];
$type = $_GET['type'];
$type_cat = $_GET['type_cat'];
$QUERY = "SELECT * FROM post_review WHERE user_id = $uid AND post_id = $pid";
$RESULT = mysqli_query($conn,$QUERY);
$COUNT  = mysqli_num_rows($RESULT);
if($COUNT == 0)
{
  if($type == '1')
  {
    $QUERY = "INSERT INTO post_review (id,post_id,review,type,user_id) VALUES (NULL,$pid,1,'$type_cat',$uid)";
    $RESULT = mysqli_query($conn,$QUERY);
    if($RESULT)
    {
        $QUERY = "SELECT count(*) as total_likes FROM post_review  WHERE post_id =$pid AND review = 1 AND type='$type_cat' ";
        $RESULT = mysqli_query($conn,$QUERY);
        $ROW = mysqli_fetch_assoc($RESULT);
        $arr = ['count'=>$ROW['total_likes'],'type'=>'like','post_id'=>$pid];
        echo json_encode($arr);
    }
  }
  else
  {

    $QUERY = "INSERT INTO post_review (id,post_id,review,type,user_id) VALUES (NULL,$pid,0,'$type_cat',$uid)";
    $RESULT = mysqli_query($conn,$QUERY);
    if($RESULT)
    {
      $QUERY = "SELECT count(*) as total_likes FROM post_review  WHERE post_id =$pid AND review = 0 AND type='$type_cat' ";
      $RESULT = mysqli_query($conn,$QUERY);
      $ROW = mysqli_fetch_assoc($RESULT);
      $arr = ['count'=>$ROW['total_likes'],'type'=>'dislike','post_id'=>$pid];
      echo json_encode($arr);
    }

  }

}
else {
    $arr = ['type' => 'error'];
  echo json_encode($arr);
}









?>
