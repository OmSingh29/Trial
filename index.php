<!DOCTYPE html>
<html>
<head>
  <title>Admin Home Page</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
    body {
  margin: 0;
  padding: 0;
}

header {
  background-color: #333;
  color: #fff;
  padding: 20px;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

nav ul li {
  display: inline-block;
  margin-right: 20px;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
}

nav ul li a.active {
  font-weight: bold;
}

.content {
  padding: 20px;
}

</style>
<body>
  <header>
    <h1>Admin Dashboard</h1>
    <nav>
      <ul>
        <li><a href="#" class="active">Dashboard</a></li>
        <li><a href="./productmenu.php">Products</a></li>
        <li><a href="#">Users</a></li>
      </ul>
    </nav>
  </header>
  <div class="content">
    <h2>Welcome, Admin!</h2>
    <!-- Dashboard content here -->
  </div>
  <script src="script.js"></script>
</body>
</html>
