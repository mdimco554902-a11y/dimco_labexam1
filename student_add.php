<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_num = $_POST['id_number'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $conn->query("INSERT INTO students (id_number, name, email, course) VALUES ('$id_num', '$name', '$email', '$course')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Student Record</title>
    <style>
        body { font-family: sans-serif; padding: 50px; }
        .form-box { max-width: 600px; }
        input { width: 100%; padding: 12px; margin: 10px 0 20px 0; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box; background: #f3f7ff; }
        button { padding: 10px 20px; background: white; border: 1px solid #1a1a1a; border-radius: 4px; cursor: pointer; }
        .cancel { margin-left: 20px; color: black; text-decoration: none; }
    </style>
</head>
<body>
    <div class="form-box">
        <h1>Create Student Record</h1>
        <form method="POST">
            <label>ID Number</label><input type="text" name="id_number" required>
            <label>Name</label><input type="text" name="name" required>
            <label>Email</label><input type="email" name="email" required>
            <label>Course</label><input type="text" name="course" required>
            <button type="submit">Add Student ➔</button>
            <a href="index.php" class="cancel">Cancel</a>
        </form>
    </div>
</body>
</html>