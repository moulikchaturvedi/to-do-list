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
    <header>TO-DO LIST</header>
    <form class="addtask" action="./addtask.php" method="POST">
        <input type="text" name="inputtask" placeholder="Enter a New Task">
        <!--<button>ADD TASK</button>-->
    </form>
    <div>
        <?php

            foreach ($tasksarray as $taskname => $task)
            { ?>

        <div class="taskcontainer">
                <form action="./checkbox.php" method="POST">
                    <input type="hidden" name="task_name" value="<?php echo $taskname ?>">
                    <input class="checkboxstyle" type="checkbox" <?php echo $task['completed'] ? 'checked' : '' ?> ><label><?php echo ($taskname); ?></label>
                </form>
                <!--<div class="tasks"><?php echo ($taskname); ?></div>-->
                <form class="deletebuttonform" action="./delete.php" method="POST">
                    <input type="hidden" name="task_name" value="<?php echo $taskname ?>">
                    <button class="deletebutton"><img src="./black-24dp/1x/outline_delete_black_24dp.png"></button>
                </form>
        </div>

        <?php } ?>
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