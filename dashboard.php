<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome - RESEARCHVERSE</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family:italic;
      color: white;
      background: url('background.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    .container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      height: 100vh;
      padding: 20px;
    }

    .welcome-message h1 {
      font-size: 90px;
      margin-bottom: 20px;
      font-weight: 1000;
      
      text-shadow: 2px 2px 4px #000;
    }

    .welcome-message p {
      font-size: 80px;
      font-weight: 600;
      max-width: 800px;
      text-shadow: 1px 1px 3px #000;
    }

    .hamburger {
      position: absolute;
      top: 20px;
      right: 30px;
      font-size: 30px;
      cursor: pointer;
      user-select: none;
      background-color: rgba(0, 0, 0, 0.6);
      padding: 10px 15px;
      border-radius: 6px;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      top: 60px;
      right: 30px;
      background-color: rgba(0, 0, 0, 0.85);
      border-radius: 8px;
      overflow: hidden;
      min-width: 180px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      z-index: 10;
    }

    .dropdown-content a {
      display: block;
      color: white;
      padding: 12px 16px;
      text-decoration: none;
    }

    .dropdown-content a:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .show {
      display: block;
    }
  </style>
  <script>
    function toggleDropdown() {
      const menu = document.getElementById("dropdown-menu");
      menu.classList.toggle("show");
    }
  </script>
</head>
<body>
  <div class="hamburger" onclick="toggleDropdown()">☰</div>
  <div id="dropdown-menu" class="dropdown-content">
    <a href="profile.php">Profile</a>
    <a href="connection.php">Find peer</a>
    <a href="resources.php">Resources</a>
    <a href="appointment.php">Appointment</a>
    <a href="wishlist.php">Wishlist</a>
    <a href="tracker.php">Progress Tracker</a>
    <a href="logout.php">Logout</a>
  </div>

  <div class="container">
    <div class="welcome-message">
      <h1>WELCOME TO RESEARCHVERSE</h1>
      <pre>       Your research journey begins with knowledge, support, and the courage to take the first step.</pre>
    </div>
  </div>
</body>
</html>
