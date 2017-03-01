   <?php
   include 'connection.php';
function addPoll($title, $poll, $who, $course)
{
    $db           = $_SESSION['db'];
    $document     = array(
        "type" => "poll",
        "uname" => $who,
        "what" => $poll,
        "title" => $title,
        "cname" => $course
    );
    $collection_1 = $db->Activity;
    $cursor       = $collection_1->findOne(array(
        "uname" => new MongoRegex("/$who/i"),
        "cname" => new MongoRegex("/$course/i"),
        'type' => "poll",
        'title' => $title
    ));
    if ($cursor != NULL)
        echo "<script>alert('You have already submit polling for this lecture,Re-polling is not allowed')</script>";
    else {
        $collection_1->insert($document);
        echo "<script>alert('You have polled successfully')</script>";
    }
    
}
//echo "<script>alert(".$_POST['submit_f'].")</script>";

    addPoll($_POST["lecturetitle"], $_POST["polls"], $_SESSION["uname"], $_SESSION["lund"]);

?>
