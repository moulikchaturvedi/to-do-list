<?php



    if (isset($_POST['inputtask']))
    {
        $newtask = $_POST['inputtask'];
        $newtask = trim($newtask);
    }

    else {
        $newtask = false;
    }

    if ($newtask)
    {   
        if (file_exists('tasks.json')) {
            $jsonfile = file_get_contents('tasks.json');
            $jsonarray = json_decode($jsonfile, true);
        }
        else {
            $jsonarray = [];
        }
        $jsonarray[$newtask] = ['completed' => false];
        file_put_contents('tasks.json', json_encode($jsonarray, JSON_PRETTY_PRINT));
    }


    header('Location: index.php');

?>