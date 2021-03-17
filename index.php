<?php

    $tasksarray = [];
    if (file_exists('tasks.json'))
    {
        $jsonfile = file_get_contents('tasks.json');
        $tasksarray = json_decode($jsonfile, true);
    }

?>

<html>
    <head>
    <title>To-do List</title>
        <link rel="stylesheet" href="./styles.css">
    </head>
<body>
    <form action="./addtask.php" method="POST">
        <input type="text" name="inputtask" placeholder="Enter a New Task">
        <button>ADD TASK</button>
    </form>
    <div>
        <?php

            foreach ($tasksarray as $taskname => $task)
            { ?>

        <div>
                <input type="checkbox" <?php echo $task['completed'] ? 'checked' : '' ?> >
                <?php echo ($taskname); ?>
                <form action="./delete.php" method="POST" style="display: inline-block;">
                    <input type="hidden" name="task_name" value="<?php echo $taskname ?>">
                    <button>Delete</button>
                </form>
        </div>

        <?php
            }

        ?>
    </div>
</body>
</html>