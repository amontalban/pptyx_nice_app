<?php

$config = parse_ini_file('../config/db.ini');

$db = new PDO("mysql:host=$config[hostname];dbname=$config[database]", $config['username'], $config['password']);

$query = "SELECT * FROM employees WHERE gender = 'M' AND birth_date = '1965-02-01' AND hire_date > '1990-01-01' ORDER BY last_name, first_name";

$stmt = $db->query($query );
 
echo "<b>emp_no&nbsp;first_name&nbsp;last_name&nbsp;gender&nbsp;hire_date&nbsp;birth_date</b><br>"; //etc...
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "$row[emp_no]&nbsp;$row[first_name]&nbsp;$row[last_name]&nbsp;$row[gender]&nbsp;$row[hire_date]&nbsp;$row[birth_date]<br>"; //etc...
}

?>
