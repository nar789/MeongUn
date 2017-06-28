<?
define("GOOGLE_SERVER_KEY", "AIzaSyAgt3jNc_MOzbMYGMar9wrHL4AT5lC9_CE");
function send_fcm($message, $id) {
  foreach($id as $v){
    $url = 'https://fcm.googleapis.com/fcm/send';

    $headers = array (
    'Authorization: key=' . GOOGLE_SERVER_KEY,
    'Content-Type: application/json'
    );

    $fields = array (
    'data' => array ("message" => $message),
    'notification' => array ("body" => $message,"sound"=>"default")
    );


    $fields['to'] = $v;


     $fields['priority'] = "high";

    $fields = json_encode ($fields);

    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

    echo $result = curl_exec ( $ch );
    if ($result === FALSE) {
    //die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close ( $ch );
  }
}
include("AdQuery/dbconnect.php");
$query="SELECT * FROM MeongUnAppToken";
$tokenList=array();
if($result=mysqli_query($con,$query)){
  while($row=mysqli_fetch_row($result)){
    array_push($tokenList,$row[1]);
  }
}
  send_fcm($_GET['message'], $tokenList);
?>
