<?php

$config = parse_ini_file('../config/db.ini');

$db = new PDO("mysql:host=$config[hostname];dbname=$config[database]", $config['username'], $config['password']);

$query = "SELECT * FROM employees WHERE gender = 'M' AND birth_date = '1965-02-01' AND hire_date > '1990-01-01' ORDER BY last_name, first_name";

$stmt = $db->query($query );
 
echo "<html>
 <body>
  <table border='1'>
   <tr>
    <th>emp_no</th>
    <th>first name</th>
    <th>last name</th>
    <th>gender</th>
    <th>hire_date</th>
    <th>birth_date</th>        
   </tr>";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td>$row[emp_no]</td><td>$row[first_name]</td><td>$row[last_name]</td><td>$row[gender]</td><td>$row[hire_date]</td><td>$row[birth_date]</td></tr>";
}

echo "</table></body></html>";

?>
