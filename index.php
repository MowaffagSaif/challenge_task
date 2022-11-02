<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge Task</title>
</head>
<body>
    <form action="" method="post">
            <h3>Write an IP to display country</h3>
            <input type="text" value="<?php if(isset($_POST["ip"])){echo $_POST["ip"];} ?>" name="ip" required />             
            <input type="submit" value="Check" name="check">
            
    </form>

</body>
</html>

<?php require "handle.php"; ?> 
