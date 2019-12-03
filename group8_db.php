<?php

function connect ()
{
	$username="USERNAME";		//change username and sqlpassword to what you use to access the database on Turing
	$password="MYSQLPASSWORD";	//remember to not upload these to Git when working on the project
	$dbname="USERNAME";
	$servername="localhost";
	
	$connection = new mysqli($servername, $username, $password, $dbname);
	if ($connection->connect_error)
		die("Connection failed: " . $connection->connect_error);
	else
		return $connection;
}

function insert($table, $values, $connection)
{
	$query = 'INSERT into ' . $table . ' values (' . $values . ')';
	$result = $connection->query($query);
}

function print_table($result)
{
   echo '<table>';
   $first_row = true;
   while ($row = mysqli_fetch_assoc($result)) 
   {
      if ($first_row) 
      {
         $first_row = false;

         // Output header row from keys.
         echo '<tr>';
         foreach($row as $key => $field) 
             echo '<th>' . $key . '</th>';
         echo '</tr>';
      }

      echo '<tr>';
      foreach($row as $key => $field) 
         echo '<td>' . $field . '</td>';

   echo '</tr>';
   }
   echo '</table>';
}

function query($q, $connection) 
{
   $result = $connection->query($q);
   echo '<br>---------------------------------<br>';
   echo 'Query: <br>' . $q . '<br><br>Result: ';
   print_table($result);
}
?>