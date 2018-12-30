
<div class="header">
   <h1>Softlinkasia ERP Portal</h1>
    <a class="header_links" id="homepage_link" href="http://localhost:81/CRUD/home.php">HOME</a>
    <a class="header_links" id="bank" href="http://localhost:81/CRUD/home.php?view=Bank">BANK</a>
    <a class="header_links" id="invoice" name="invoice" value="Invoice" href="http://localhost:81/CRUD/home.php?view1=Invoice">INVOICE</a>
    <a class="header_links" id="help" name="help" value="help" href="http://localhost:81/CRUD/help.php">HELP?</a>
   <div class="dropdown">
    <form method="POST">
    <button class="dropbtn"><a class="username" href="#"><?php echo $_SESSION['username'] ?></a></button>
    
    <div class="dropdown-content">
    <a href="login/setting.php" id="setting_link">Settings</a>
    <a href="login/logout.inc.php">Logout</a>
    </div>
    </form>

   </div>

</div>



