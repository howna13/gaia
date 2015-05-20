<?php
  if (isset($_GET['active'])) {
    loggout_redirect();
  }
?>

<div id="m_login">
	<li id="text">
		Hola , <a id="top_username" href="user.php"><?php echo strtoupper($user_data['nom'])?></a>! 
	</li>
	<li id="text" style="padding-left: 10px;">
		<a href="<?php echo $_SERVER["REQUEST_URI"] . "?active="; ?>">Sortir</a>
	</li>
</div>