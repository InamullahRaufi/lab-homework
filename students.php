<?php
$con = mysqli_connect("localhost", "root", "", "students_db") or die(mysqli_connect_error());
$sql = mysqli_query($con, "SELECT * FROM students ORDER BY id");
$row = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>

<body>
    <a href="registeration.php">Register new student</a>
    <br><br>
    <table border="1">
        <thead>
            <tr>
                <th colspan="3">
                    <h4>Students list</h4>
                </th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Full name</th>
                <th>Email Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($sql) > 0) {
                do { ?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["full_name"] ?></td>
                <td><?php echo $row["email"] ?></td>
            </tr>
            <?php } while ($row = mysqli_fetch_assoc($sql));
            } else { ?>
            <tr>
                <td colspan="3" align="center">Empty list</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>