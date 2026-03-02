<?php
include 'db.php';
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_num = $_POST['id_number'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $conn->query("UPDATE students SET id_number='$id_num', name='$name', email='$email', course='$course' WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student Record</title>
    <style>
        body { font-family: sans-serif; padding: 50px; }
        .form-box { max-width: 600px; }
        input { width: 100%; padding: 12px; margin: 10px 0 20px 0; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box; }
        button { padding: 10px 20px; background: white; border: 1px solid #1a1a1a; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="form-box">
        <h1>Edit Student Record</h1>
        <form method="POST">
            <label>ID Number</label><input type="text" name="id_number" value="<?php echo $row['id_number']; ?>">
            <label>Name</label><input type="text" name="name" value="<?php echo $row['name']; ?>">
            <label>Email</label><input type="email" name="email" value="<?php echo $row['email']; ?>">
            <label>Course</label><input type="text" name="course" value="<?php echo $row['course']; ?>">
            <button type="submit">Save Todo 💾</button>
        </form>
    </div>
</body>
</html>