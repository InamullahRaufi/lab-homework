<?php
$con = mysqli_connect("localhost", "root", "", "students_db") or die(mysqli_connect_error());
$message = "";
if (isset($_POST["submit"])) {
    $full_name = mysqli_real_escape_string($con, trim($_POST["full_name"]));
    $email = mysqli_real_escape_string($con, trim($_POST["email"]));
    $gender = $_POST["gender"];
    if (empty($full_name) && empty($email)) {
        $message = "All fields is required!";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Please enter a valid email address";
        } else {
            $sql = mysqli_query($con, "INSERT INTO students (full_name,email,gender) VALUES('$full_name','$email','$gender')");
            if ($sql) {
                $message = "Student registred successfully!";
                header("location: students.php");
            } else {
                $message = "Error while registeration " . mysqli_error($con);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registeration</title>
</head>

<body>

    <form action="" method="post">
        <h1>Student Registeration Form</h1>
        <p><?php echo $message ?></p>
        <label>Full name:
            <input type="text" name="full_name" placeholder="Full name">
        </label><br><br>
        <label>Email address:
            <input type="email" name="email" placeholder="Email address">
        </label>
        <p>Gender: <label>Male <input type="radio" value="Male" name="gender" required></label> <label>Female <input
                    type="radio" name="gender" value="Feamle"></label></p>
        <button type="submit" name="submit">Submit</button>
        <br>
        <br>
        <a href="students.php">Students list</a>
    </form>
</body>

</html>