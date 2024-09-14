<?php
include('koneksi.php');

$Student = new Student();
$studentId = $_GET['student'] ?? null; // Get student ID from query parameter
$data = $Student->fetchData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jurnal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Student</h1>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Attendance List Id</th>
                    <th>Has Finished</th>
                    <th>Has Acc Head Department</th>
                    <th>Lecturer Id</th>
                    <th>Course Id</th>
                    <th>Student Class Id</th>
                    <th>Created At</th>
                    <th>Deleted At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): ?>
                    <?php foreach ($data as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['attendence_list_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['has_finished']); ?></td>
                            <td><?php echo htmlspecialchars($row['has_acc_head_departement']); ?></td>
                            <td><?php echo htmlspecialchars($row['lecturer_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['course_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['student_class_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                            <td><?php echo htmlspecialchars($row['deleted_at']); ?></td>
                            <td><?php echo htmlspecialchars($row['updated_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="10" class="text-center">No data found for student ID <?php echo htmlspecialchars($studentId); ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>