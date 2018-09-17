<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app = new \Slim\App;
//get all activities

$app->get('/api/activities',function(Request $req,Response $res){

  $sql = "SELECT * FROM activities";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->query($sql);
        $activitys = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($activitys);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Get Single activity
$app->get('/api/activity/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $sql = "SELECT * FROM activity WHERE id = $id";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->query($sql);
        $activity = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($activity);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
// Add activity
$app->post('/api/activity/add', function(Request $request, Response $response){
    $title = $request->getParam('title');
    $status = $request->getParam('status');

    $sql = "INSERT INTO activitys (title,status) VALUES
    (:title,:status)";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title);

        $stmt->bindParam(':status',$status);
        $stmt->execute();
        echo '{"notice": {"text": "activity Added"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
// Update activity
$app->put('/api/activity/update/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $title = $request->getParam('title');
    $status = $request->getParam('status');

    $sql = "UPDATE activitys SET
				title 	= :title,
				status	= :status

			WHERE id = $id";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':status',  $status);

        $stmt->execute();
        echo '{"notice": {"text": "activity Updated"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
// Delete activity
$app->delete('/api/activity/delete/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $sql = "DELETE FROM activitys WHERE id = $id";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "activity Deleted"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
?>
