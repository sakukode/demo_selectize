<?php 

$cities = [
	['value' => 'Aceh', 'text' => 'Aceh'],
	['value' => 'Bandung', 'text' => 'Bandung'],
	['value' => 'Batam', 'text' => 'Batam'],
	['value' => 'Cianjur', 'text' => 'Cianjur'],
	['value' => 'Cilacap', 'text' => 'Cilacap'],
	['value' => 'Jakarta', 'text' => 'Jakarta'],
	['value' => 'Surabaya', 'text' => 'Surabaya'],
	['value' => 'Solo', 'text' => 'Solo'],
	['value' => 'Jogjakarta', 'text' => 'Jogjakarta'],
	['value' => 'Pekalongan', 'text' => 'Pekalongan'],
];

$search = $_GET["q"];

//mencari data berdasarkan key/index 'value' pada array data kota (cities)
$matches_keys  = preg_grep ('/'.$search.'/i', array_column($cities, 'value'));

//mendapatkan data lengkap berdasarkan hasil pencarian
$response = [];

foreach($matches_keys as $k => $v) {
	$response[] = $cities[$k];
}

header('Content-Type: application/json');
//mengembalikan data berupa data json
echo json_encode($response);

?>