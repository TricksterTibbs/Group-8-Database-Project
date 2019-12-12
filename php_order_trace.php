<html>
<body>
<h3>Enter Order number to trace:</h3>
<br>
<form action="php_search_book.php" method="post">
	Order Number: <input type ="number" name="order"><br>
	<input name="submit" type="submit" >
	</form>
	<br>
</body>
</html>

<?php

include '/home/jh062/public_html/group8_db.php';

function search_order ($order) 
{
	$connection = connect_db();
	$query = 'SELECT * from Orders WHERE order_id = ' . $order;
	query($query, $connection);
	echo '<br> Order with order number ' . $order . ':';
}

if (isset($_POST['submit']))
{
	search_book($_POST[order]);
}
?>