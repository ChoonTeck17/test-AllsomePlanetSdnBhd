This program processes data from a CSV file. It calculates the total revenue from all orders and identifies which product (SKU) sold the most units. The results are returned in JSON format.

to run this program, use "php test.php" in terminal

the json output should be 

{
    "total_revenue": 710,
    "best_selling_sku": {
        "sku": "SKU-A123",
        "total_quantity": 5
    }
}

project/
├── test.php                              # Main program that also has the explaination
├── allsome_interview_test_orders.csv     # Input data
├── README.md                             # Documentation
└── output.json                           # Example output
