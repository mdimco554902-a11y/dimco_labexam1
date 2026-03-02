<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Student Records</h1>
        <a href="student_add.php" class="add-btn">Add Student +</a>

        <?php
        $res = $conn->query("SELECT * FROM students ORDER BY id DESC");
        
        if ($res && $res->num_rows > 0):
            while($row = $res->fetch_assoc()):
        ?>
        <div class="student-card">
            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
            <p><?php echo htmlspecialchars($row['email']); ?></p>
            <p><strong>ID:</strong> <?php echo htmlspecialchars($row['id_number']); ?></p>
            <p><strong>Course:</strong> <?php echo htmlspecialchars($row['course']); ?></p>
            
            <div class="menu-trigger" onclick="toggleMenu(event, <?php echo $row['id']; ?>)">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="1"></circle>
                    <circle cx="12" cy="5" r="1"></circle>
                    <circle cx="12" cy="19" r="1"></circle>
                </svg>

                <div id="drop-<?php echo $row['id']; ?>" class="dropdown">
                    <a href="student_edit.php?id=<?php echo $row['id']; ?>">📝 Edit Record</a>
                    <a href="student_delete.php?id=<?php echo $row['id']; ?>" class="delete-link" onclick="return confirm('Are you sure you want to delete this record?')">🗑️ Delete</a>
                </div>
            </div>
        </div>
        <?php 
            endwhile; 
        else: 
        ?>
            <div class="student-card" style="text-align: center;">
                <p>No student records found. Click the button above to add one!</p>
            </div>
        <?php endif; ?>
    </div>

    <script>
        function toggleMenu(event, id) {
            // Prevent the click from triggering window.onclick immediately
            event.stopPropagation();
            
            const dropdown = document.getElementById('drop-' + id);
            
            // Close all other open dropdowns first
            document.querySelectorAll('.dropdown').forEach(d => {
                if(d.id !== 'drop-'+id) d.classList.remove('show');
            });
            
            // Toggle the current one
            dropdown.classList.toggle('show');
        }

        // Close dropdowns if the user clicks anywhere else on the page
        window.onclick = function(event) {
            if (!event.target.closest('.menu-trigger')) {
                document.querySelectorAll('.dropdown').forEach(d => {
                    d.classList.remove('show');
                });
            }
        }
    </script>
</body>
</html>