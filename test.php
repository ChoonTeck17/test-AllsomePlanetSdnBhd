<?php

$csvFile = 'allsome_interview_test_orders.csv';

//to ensure got csv file
if (!file_exists($csvFile)) {
    die(json_encode(['error' => 'File not found']));
}
//to loop through each rows
$rows = array_map(function($line) {
    return str_getcsv($line, ',', '"', '\\');
}, file($csvFile));

//remove headers
array_shift($rows);

$totalRevenue = 0;
$skuQuantities = [];

//loop each row to get their column values
foreach ($rows as $row) {
    if (count($row) < 4) {
        continue;
    }

//to define which row is which variable
    $sku = $row[1];
    $quantity = (int)$row[2];
    $price = (float)$row[3];
    
    $totalRevenue += $quantity * $price;

//finding best selling sku by checking previously exist or not? if no then 0, then store it, if exist later then use $skuQuantities[$sku] + $quantity
    $skuQuantities[$sku] = ($skuQuantities[$sku] ?? 0) + $quantity;
}

//to get the best selling sku from the operation above
$maxQuantity = max($skuQuantities);
//to find the $maxQuantity inside $skuQuantities
$bestSellingSku = array_search($maxQuantity, $skuQuantities);

//build output according to requirements
$result = [
    'total_revenue' => round($totalRevenue, 2),
    'best_selling_sku' => [
        'sku' => $bestSellingSku,
        'total_quantity' => $maxQuantity
    ]
];

//return output as json
header('Content-Type: application/json');
echo json_encode($result, JSON_PRETTY_PRINT);

?>
