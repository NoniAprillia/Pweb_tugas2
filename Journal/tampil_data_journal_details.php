<?php
include('koneksi.php');

$journalDetails = new JournalDetails();
$data = $journalDetails->fetchData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Course Classes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Data Course Classes</h1>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Material</th>
                    <th>Has Acc Student</th>
                    <th>Has Acc Lecturer</th>
                    <th>Attendance List Detail Id</th>
                    <th>Journal Id</th>
                    <th>Deleted At</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): ?>
                    <?php foreach ($data as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['material']); ?></td>
                            <td><?php echo htmlspecialchars($row['has_acc_student']); ?></td>
                            <td><?php echo htmlspecialchars($row['has_acc_lecturer']); ?></td>
                            <td><?php echo htmlspecialchars($row['attendence_list_detail_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['journal_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['deleted_at']); ?></td>
                            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                            <td><?php echo htmlspecialchars($row['updated_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center">No data available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>