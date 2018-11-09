<html>
<body>
<p>
<?php
session_start();
if(isset($_SESSION['centerInf']) and $_SESSION['centerInf']!='empty')
echo $_SESSION['centerInf'];
$_SESSION['centerInf']="empty";
?>
</p>
</body>
</html>
