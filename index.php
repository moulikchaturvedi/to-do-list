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
        <style>
            <?php include "styles.css" ?>
        </style>
    </head>
<body>
<div class="maincontainer">
    <header>MY TO-DO LIST</header>
    <form class="addtask" action="./addtask.php" method="POST">
        <input type="text" name="inputtask" placeholder="Enter a New Task">
        <!--<button>ADD TASK</button>-->
    </form>
    <div>
        <?php

            foreach ($tasksarray as $taskname => $task)
            { ?>

        <div class="taskcontainer">
                <form action="./checkbox.php" method="POST" style="display: inline-block;">
                    <input type="hidden" name="task_name" value="<?php echo $taskname ?>">
                    <input type="checkbox" <?php echo $task['completed'] ? 'checked' : '' ?> >
                </form>
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

</div>

<script>

    const checkboxes = document.querySelectorAll('input[type=checkbox]');
    checkboxes.forEach(ch => {
        ch.onclick = function () {
            this.parentNode.submit();
        };
    })

</script>

</body>
</html>