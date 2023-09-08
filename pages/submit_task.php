<?php
// require_once 'includes/settings_view.inc.php';
include 'includes/tasks_list.inc.php';
include 'includes/employee_list.inc.php';
require_once 'includes/task_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/submit_task.css?v=<?php echo time(); ?>">
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <title>Submit Task</title>
</head>

<body>
    <main class="main-content">
        <div class="profile_container">
            <h2>Submit Task</h2>
            <div class="profile_details">
                <div class="form_box">
                    <form id="form1" action="./includes/task_file.inc.php" method="post" enctype="multipart/form-data">
                        <div class="assign-container">
                            <label for="tasks">Select A Task</label>
                            <div class="drop-container">
                                <div class="select-container">
                                    <select name="task_id" id="tasks">
                                        <?php show_task_options();
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <label for="tasks">Select A File</label>
                            <div class="input__image" onclick="document.getElementById('file').click();">
                                <i class="fa-solid fa-file-pdf"></i>
                                <span id="file-name">No file selected</span>
                                <input type="file" id="file" name="task_file" accept=".pdf" onchange="displayFileName(this);">
                            </div>
                        </div>
                    </form>
                </div>
                <button type="submit" form="form1">Submit Task</button>
            </div>
            <button class="back-button" onclick="window.location.href='index.php?page=tasks'"><i class="fa-solid fa-angle-left"></i></button>
        </div>
    </main>
    <script>
        function displayFileName(input) {
            const fileNameSpan = document.getElementById('file-name');
            const fileInput = input;
            const selectedFile = fileInput.files[0];

            if (selectedFile && selectedFile.type === 'application/pdf') {
                fileNameSpan.textContent = selectedFile.name;
            } else {
                fileNameSpan.textContent = 'No file selected';
            }
        }

        //dropdown
    </script>

</body>

</html>