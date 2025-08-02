<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header h2 {
            margin: 0;
            color: #333;
        }
        .header a {
            text-decoration: none;
            color: #d9534f;
            font-weight: bold;
        }
        .header a:hover {
            text-decoration: underline;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            max-width: 600px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Welcome <?php echo htmlspecialchars($_SESSION['uname']); ?></h2>
        <a href="logout.php">Logout</a>
    </div>

    <table>
        <tr>
            <th colspan="2">User Details</th>
        </tr>
        <tr>
            <td><strong>Username</strong></td>
            <td><?php echo htmlspecialchars($_SESSION['uname']); ?></td>
        </tr>
        <tr>
            <td><strong>Gender</strong></td>
            <td><?php echo htmlspecialchars($_SESSION['gender']); ?></td>
        </tr>
        <tr>
            <td><strong>Mobile No.</strong></td>
            <td><?php echo htmlspecialchars($_SESSION['mobile_no']); ?></td>
        </tr>
        <tr>
            <td><strong>Session ID</strong></td>
            <td><?php echo htmlspecialchars(session_id()); ?></td>
        </tr>
        <tr>
            <td><strong>Session Status</strong></td>
            <td><?php echo session_status() == 2 ? "Active" : "Not Active"; ?></td>
        </tr>
    </table>
</body>
</html>