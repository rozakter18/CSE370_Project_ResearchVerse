<?php
session_start();
$conn = new mysqli("localhost", "root", "", "researchverse");

$error = "";

// Handle resource upload
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $url = $conn->real_escape_string($_POST["url"]);
    $title = $conn->real_escape_string($_POST["title"]);
    $uploaded_by = $conn->real_escape_string($_POST["uploaded_by"]);
    $uploaded_date = $conn->real_escape_string($_POST["uploaded_date"]);
    $description = $conn->real_escape_string($_POST["description"]);

    // Check if the uploader exists in users table
    $user_check = $conn->query("SELECT * FROM users WHERE username = '$uploaded_by'");

    if ($user_check->num_rows > 0) {
        // User exists, proceed with insert
        $conn->query("INSERT INTO resources (url, title, uploaded_by, uploaded_date, description) 
                      VALUES ('$url', '$title', '$uploaded_by', '$uploaded_date', '$description')");
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Uploader username does not exist!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Resource</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0c0020, #2b001b);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 60px 0;
            min-height: 100vh;
        }

        .container {
            width: 500px;
            background: rgba(255,255,255,0.08);
            padding: 40px;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 25px rgba(255, 0, 100, 0.4);
        }

        h1 {
            text-align: center;
        }

        .upload-form {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .upload-form input {
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .upload-form input::placeholder {
            color: #eee;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .upload-form button,
        .view-button {
            background: #ae157d;
            padding: 10px;
            border: none;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            font-weight: bold;
            flex: 1;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .upload-form button:hover,
        .view-button:hover {
            background: #73034d;
        }

        .error-message {
            color: #ff6b6b;
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload a Resource</h1>
        <form method="POST" class="upload-form">
            <input type="url" name="url" placeholder="Resource URL" required>
            <input type="text" name="title" placeholder="Title" required>
            <input type="text" name="uploaded_by" placeholder="Username" required>
            <input type="date" name="uploaded_date" required>
            <input type="text" name="description" placeholder="Description" required>

            <div class="button-group">
                <button type="submit">Upload Resource</button>
                <a href="show_resources.php" class="view-button">View All Resources</a>
            </div>
        </form>
        <?php if ($error): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
    </div>
</body>
</html>


