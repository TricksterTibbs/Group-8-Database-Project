<html>
<body>
<h3>Enter Book Information to add to the database:</h3>
<br>
<form action="php_insert_book.php" method="post">
	Author: <input type="text" name="author"><br>
	Title: <input type="text" name="title"><br>
	ISBN: <input type="number" name="ISBN"><br>
	Category: <input type="text" name="category"><br>
	Publisher: <input type="text" name="publisher"><br>
	Price: <input type="number" name="price"><br>
	<input name="submit" type="submit" >
</form>
<br><br>

</body>
</html>

<?php

include '/home/jh062/public_html/group8_db.php';//path where this file is, replace USERNAME with yours (assuming this is on turing)

function insert_book ($author, $title, $ISBN, $category, $publisher, $price)
{
	$connection = connect();
	echo '<br> Table Books before: ';
	$query = 'SELECT * from Books';
	query($query, $connection);
	
	$values = $ISBN . ', \'' . $author . '\', ' . $year . ', \'' . $title . '\', ' . $price . ', '
			  .	$edition . ', \'' . $category . '\', \'' . $publisher . '\', ' . $quantity;
	echo 'author:' . $author . ', title:' . $title . ', ISBN:' . $ISBN . ', category:' . $category . ', publisher:' . $publisher . ', price:' . $price . 'Values: ';
	echo $values . '<br>';
	
	insert("Books", $values, $connection);
	
	echo '<br> Table Books after: ';
	$query = 'SELECT * from Books';
	query($query, $connection);
}

if (isset($POST['submit']))
{	
	insert_book($_POST[author],$_POST[title], $_POST[ISBN], $_POST[category], $_POST[publisher], $_POST[price]);
}

?>