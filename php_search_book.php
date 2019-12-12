<html>
<body>
<h3>Enter ISBN to lookup a book:</h3>
<br>
<form action="php_search_book.php" method="post">
	ISBN Number: <input type ="number" name="ISBN"><br>
	<input name="submit" type="submit" >
</form>
<br>

</body>
</html>

<?php

include '/home/jh062/public_html/group8_db.php';

function search_book ($ISBN) 
{
	$connection = connect_db();
	$query = 'SELECT * from Books WHERE ISBN = ' . $ISBN;
	query($query, $connection);
	echo '<br> Book with ISBN ' . $ISBN . ':';
}

if (isset($_POST['submit']))
{
	search_book($_POST[ISBN]);
}
?>