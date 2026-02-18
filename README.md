
## This program processes data from a CSV file. It calculates the total revenue from all orders and identifies which product (SKU) sold the most units. The results are returned in JSON format.

To run this program, use:
```bash
php test.php
```

## Output

The JSON output should be:
```json
{
    "total_revenue": 710,
    "best_selling_sku": {
        "sku": "SKU-A123",
        "total_quantity": 5
    }
}
```

## File Structure
```
project/
├── test.php                              # Main program
├── allsome_interview_test_orders.csv     # Input data
├── README.md                             # Documentation
└── output.json                           # Example output
```

