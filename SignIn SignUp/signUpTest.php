<!DOCTYPE html>
<html>
<head>
  <title>REGISTRATION PAGE</title>
  <meta name="description" content="A description of this web page">
  <link rel="stylesheet" type="text/css" href="register.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="register.js"></script>
</head>
<body>
  <!-- [HEADER] -->
  <header id="header">HEADER</header>

  <!-- [BODY] -->
  <div id="body">
    <h3>REGISTRATION</h3>
    <form onsubmit="return register();">
    <label for="name">Username: </label>
    <input type="text" id="name" name="name" placeholder="Full name" required autofocus><br>
    <label for="email">Email: </label>
    <input type="email" id="email" name="email" placeholder="Email" required><br>
    <label for="password">Password: </label>
    <input type="password" id="password" name="password" placeholder="Password" required><br>
    <input type="submit" value="Register"/>
    </form>
  </div>

  <!-- [FOOTER] -->
  <footer id="footer">
    FOOTER<br>
    &copy; Copyright My Awesome Site
  </footer>
</body>
</html>
