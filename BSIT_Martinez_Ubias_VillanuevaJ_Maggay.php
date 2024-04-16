<?php
// Define a class to represent each menu item
class MenuItem {
    public $name; // Name of the menu item
    public $price; // Price of the menu item
    public $quantity; // Quantity of the menu item available in inventory
}

// Define a class to represent the McDonald's kiosk
class McDonaldsKiosk {
    private $menu = []; // Array to store menu items
    private $totalAmountPHP = 0; // Variable to store the total amount of orders in Peso

    // Method to add a new menu item to the kiosk
    public function addMenuItem($name, $price, $quantity) {
        $item = new MenuItem(); // Create a new MenuItem object
        $item->name = $name; // Set the name of the menu item
        $item->price = $price; // Set the price of the menu item
        $item->quantity = $quantity; // Set the quantity of the menu item available in inventory
        $this->menu[] = $item; // Add the menu item to the menu array
    }

       // Method to get the total amount of orders in PHP
       public function getTotalAmountPHP() {
        return $this->totalAmountPHP;
    }

    // Method to display the menu
    public function displayMenu() {
        echo "Menu:<br>"; // Display a header for the menu
        foreach ($this->menu as $item) { // Loop through each menu item
            echo "$item->name - ₱" . number_format($item->price, 2) . "<br>"; // Display the name and price of the menu item
        }
        echo "<br>";
    }

    // Method to place an order for a menu item
    public function placeOrder($itemName, $quantity) {
        $itemFound = false; // Variable to track whether the requested item is found in the menu
        foreach ($this->menu as $item) { // Loop through each menu item
            if ($item->name === $itemName) { // Check if the current menu item matches the requested item
                $itemFound = true; // Set the flag to indicate that the item is found
                if ($item->quantity >= $quantity) { // Check if there is enough quantity available in inventory
                    $item->quantity -= $quantity; // Reduce the quantity of the menu item in inventory
                    $totalPrice = $item->price * $quantity; // Calculate the total price of the order using multiplication
                    echo "Ordered $quantity $item->name. Price: ₱" . number_format($totalPrice, 2) . "<br>"; // Display order details
                    $this->totalAmountPHP += $totalPrice; // Add the total price to the total amount in PHP using addition
                } else {
                    echo "Sorry, $item->name is out of stock.<br>"; // Display a message if the item is out of stock
                }
                break; // Exit the loop since the item is found
            }
        }
        if (!$itemFound) { // Check if the requested item is not found in the menu
            echo "Sorry, $itemName is not on the menu.<br>"; // Display a message indicating that the item is not on the menu
        }
    }    
}

// Example usage:
$kiosk = new McDonaldsKiosk(); // Create a new instance of the McDonaldsKiosk class

// Add menu items
// Group Meals Menu
$kiosk->addMenuItem("McShare Bundle for 4", 809, 20);//Name, Price and Quantity.
$kiosk->addMenuItem("Snack Burger McShare", 380, 15);
$kiosk->addMenuItem("BFF Fries N' McFloat Combo", 282, 10);
// Chicken Menu
$kiosk->addMenuItem("Mega Meal - Spicy Chicken McDo w/ Rice & McSpaghetti", 207, 30);
$kiosk->addMenuItem("McCrispy Chicken Fillet w/ Fries Meal", 143, 25);
$kiosk->addMenuItem("Chicken McNuggets (10-pc)", 175, 20);
// Burgers Menu
$kiosk->addMenuItem("Triple Cheeseburger Meal", 259, 15);
$kiosk->addMenuItem("Quarter Pounder w/ Cheese, Lettuce, & Tomatoes Meal", 281, 20);
$kiosk->addMenuItem("Big Mac Meal", 256, 15);
// McSpaghetti Menu
$kiosk->addMenuItem("McSpaghetti Platter Good for 10", 440, 15);
$kiosk->addMenuItem("Mega Meal - Spicy Chicken McDo w/ Rice & McSpaghetti", 207, 30);
$kiosk->addMenuItem("McSpaghetti w/ Fries Meal", 150, 10);
// Rice Bowls Menu
$kiosk->addMenuItem("2-pc. Mushroom Pepper Steak & Fries Meal", 197, 20);
$kiosk->addMenuItem("2-pc. Mushroom Pepper Steak Meal", 130, 15);
$kiosk->addMenuItem("1-pc. Mushroom Pepper Steak Solo", 79, 15);
// Desserts & Drinks Menu
$kiosk->addMenuItem("McFlurry with Oreo", 57, 15);
$kiosk->addMenuItem("Apple Pie", 43, 15);
$kiosk->addMenuItem("Coke McFloat", 72, 15);
// McCafé Menu
$kiosk->addMenuItem("McCafé Coffee Float", 76, 15);
$kiosk->addMenuItem("Orange Juice", 72, 15);
$kiosk->addMenuItem("Coke Zero", 72, 20);
// Fries & Extras Menu
$kiosk->addMenuItem("Fries", 79, 20);
$kiosk->addMenuItem("Extra Mayonnaise", 72, 20);
$kiosk->addMenuItem("Extra Gravy", 10, 20);
// Happy Meal Menu
$kiosk->addMenuItem("1-pc. Chicken McDo Happy Meal", 168, 20);
$kiosk->addMenuItem("McSpaghetti Happy Meal", 140, 20);
$kiosk->addMenuItem("Cheesy Burger McDo Happy Meal", 145, 20);

// Display menu
$kiosk->displayMenu();

// Place orders
$kiosk->placeOrder("2-pc. Mushroom Pepper Steak & Fries Meal", 1);
$kiosk->placeOrder("McSpaghetti w/ Fries Meal", 1);
$kiosk->placeOrder("Coke McFloat", 1);
$kiosk->placeOrder("Fries", 1);
$kiosk->placeOrder("Extra Mayonnaise", 2);
$kiosk->placeOrder("Extra Gravy", 2);

// Get total amount of orders in PHP
$totalAmountPHP = $kiosk->getTotalAmountPHP();
echo "<br>Total Amount of Orders: ₱" . number_format($totalAmountPHP, 6);
?>