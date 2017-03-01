<?php
  try {
  	session_start();
    // connect to Compose assuming your MONGODB_URL environment
    // variable contains the connection string
    $connection_url = "mongodb://gaurav:123456@ds035846.mlab.com:35846/lecturefeedback";
     // create the mongo connection object
   
    $m = new MongoClient();


    // extract the DB name from the connection path
 /*   $url = parse_url($connection_url);
    echo $url;
    $db_name = preg_replace('/\/(.*)/', '$1', $url['path']);
    echo $db_;
*/
    // use the database we connected to
     $_SESSION['db']  = $m->lecturefeedback;
     $_SESSION['conn']  = $m;


    /* disconnect from server
    $m->close();*/
  } catch ( MongoConnectionException $e ) {
    die('Error connecting to MongoDB server '.$e->getMessage());
  } catch ( MongoException $e ) {
    die('Mongo Error: ' . $e->getMessage());
  } catch ( Exception $e ) {
    die('Error: ' . $e->getMessage());
  }
?>