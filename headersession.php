  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">VIRGINIA LIBRARY</a>
      </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
          <li><a>About us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li id="welcome"><a> WELCOME <?php echo $login_session; ?> !</a></li>
          <li id="logout"><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Log Out</a></li>
        </ul>
    </div>
  </nav>
