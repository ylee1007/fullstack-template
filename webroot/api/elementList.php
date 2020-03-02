<!DOCTYPE html>
<body>
<style>
    <?php include 'css/main.css'; ?>
</style>
<div class="container">
<div id="center_button"><button onclick="window.location.href='http://localhost:8765/'">
        Back to Home</button></div>
<?php
$val_url = "https://restcountries.eu/rest/v2/all?fields=name;nativeName;alpha2Code;alpha3Code";
$val_json=file_get_contents($val_url);
$val_array = json_decode($val_json, true);
$table = '<table border="1"><tr><th>Full Name</th><th>Native Name</th><th>Alpha Code2</th><th>Alpha Code3</th></tr>';
// Parse the result set, and adds each row and colums in HTML table
foreach($val_array as $row) {
    $table .= '<tr><td>' .$row['name']. '</td><td>' .$row['nativeName']. '</td><td>' .$row['alpha2Code']. '</td>
<td>' .$row['alpha3Code']. '</td></tr>';
}
$table .= '</table>';
echo $table;
?>
</div>
</body>
</html>