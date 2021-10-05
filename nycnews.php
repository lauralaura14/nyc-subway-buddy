<?php
require('db.php');
include("auth_session.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>NYC News</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta http-equiv="content-type" content="text/html; charset-iso-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--for responsiveness-->
  <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
  <?php include 'logininclude.htm';?>
	<div class="topbackground" title="Top Background Photo Subway Sign">
	</div>

	<div class="container1">
    <br><br>
    <h1>NYC News</h1>
    <br>
    <h5>Bored waiting for your Buddy? Check out the most recent headlines in NYC!</h5>
    <br>
    <br>
    <?php
    //initialize curl
    $curl = curl_init();

    //send GET request to mediastack server to get json data
    curl_setopt($curl, CURLOPT_URL, "http://api.mediastack.com/v1/news?access_key=99727d54b5ef3eeff63244375836837f&languages=en&keywords=nyc&sort=published_desc");

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $execresponse = curl_exec($curl);

    if($e = curl_error($curl)) {
      print $e;
    } else {
      $apidata = json_decode($execresponse, true);

      /*print"<pre>";
      print_r($apidata);
      print"</pre>";
      */

      /*foreach($apidata as $key=>$value) {
        print"[$key]=>$value<br>";
      }*/
    }

    curl_close($curl);

    extract($apidata);

    foreach($apidata as $arr1) {
      foreach($arr1 as $arr2) {
        if(!empty($arr2['description'])) {
          print"<strong>Title:</strong> ". $arr2['title']. "<br>";
          print"<strong>Description:</strong> " .$arr2['description']. "<br>";
          print"<strong>Date:</strong> " .$arr2['published_at']. "<br>";
          print"<strong>Link:</strong> <a href=".$arr2['url']. " target='_blank'>".$arr2['url']."<a><br>";
          print"<p><br><br>";
        }
      }
    }

    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
