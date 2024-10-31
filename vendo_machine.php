<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .form-check-label {
            font-weight: 500;
        }
        .summary {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header text-center bg-primary text-white">Vendo Machine</div>
        <div class="card-body">
            <form method="post" action="">
                <fieldset class="mb-4">
                    <legend class="mb-3">Products:</legend>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="products[]" value="Coke-15" id="coke">
                        <label class="form-check-label" for="coke">Coke - ₱15</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="products[]" value="Sprite-20" id="sprite">
                        <label class="form-check-label" for="sprite">Sprite - ₱20</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="products[]" value="Royal-20" id="royal">
                        <label class="form-check-label" for="royal">Royal - ₱20</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="products[]" value="Pepsi-15" id="pepsi">
                        <label class="form-check-label" for="pepsi">Pepsi - ₱15</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="products[]" value="MountainDew-20" id="mountain-dew">
                        <label class="form-check-label" for="mountain-dew">Mountain Dew - ₱20</label>
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="mb-3">Options:</legend>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="size" class="form-label">Size:</label>
                            <select name="size" id="size" class="form-select">
                                <option value="Regular">Regular</option>
                                <option value="Up-Size">Up-Size (add ₱5)</option>
                                <option value="Jumbo">Jumbo (add ₱10)</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="0" min="1">
                        </div>
                    </div>
                    <button type="submit" name="checkout" class="btn btn-primary w-100">Check Out</button>
                </fieldset>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['checkout']) && isset($_POST['products']) && $_POST['quantity'] > 0) {
        $products = $_POST['products'];
        $size = $_POST['size'];
        $quantity = (int)$_POST['quantity'];
        $totalItems = 0;
        $totalAmount = 0;
        
        echo "<div class='summary mt-4'>";
        echo "<h4>Purchase Summary:</h4><ul>";
        
        foreach ($products as $product) {
            list($productName, $basePrice) = explode("-", $product);
            $basePrice = (int)$basePrice;
            
            // Calculate price based on size
            if ($size == "Up-Size") {
                $basePrice += 5;
            } elseif ($size == "Jumbo") {
                $basePrice += 10;
            }
            
            // Total for this item
            $itemTotal = $basePrice * $quantity;
            $totalItems += $quantity;
            $totalAmount += $itemTotal;

            // Display item summary
            echo "<li>{$quantity} piece(s) of {$size} {$productName} amounting to ₱{$itemTotal}</li>";
        }
        
        echo "</ul>";
        echo "<p><strong>Total Number of Items:</strong> {$totalItems}</p>";
        echo "<p><strong>Total Amount:</strong> ₱{$totalAmount}</p>";
        echo "</div>";
    } elseif (isset($_POST['checkout'])) {
        echo "<div class='alert alert-warning mt-4' role='alert'>No Selected Product. Try Again.</div>";
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
