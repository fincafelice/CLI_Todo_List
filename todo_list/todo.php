<?php


// Create array to hold list of todo items
$items = array();

// List array items formatted for CLI
// This function accepts an array of items.
// This function will return a string of those items.
 function listItems($var)
 {

    $string = '';

    foreach ($var as $key => $value) {
        $key++;
        $string .= "[$key]" . $value . PHP_EOL;
    }

    return $string; 
 }

 // Get STDIN, strip whitespace and newlines,
 // and convert to uppercase if $upper is true
 function getInput ($lower = false)
 {

    $input = strtolower(trim(fgets(STDIN)));

    // if ($lower == true) {
    //     $input = strtolower($input);
    // }

    // Return filtered STDIN input
    return $input;
 }

// The loop!
do {
    //     // Iterate through list items
    //     foreach ($items as $key => $item) {
    //         // Display each item and a newline
                // $key++; // changes display for key
    //         // echo "[{$key}] {$item}\n";
    // // Echo the list produced by the function
    echo listItems($items);    

    // }

    // Show the menu options
    echo '(N)ew item, (R)emove item, (Q)uit : ';

        // Get the input from user
        // Use trim() to remove whitespace and newlines
    // Add function to get input from user.
    $input = getInput(true);
    // Check for actionable input
    if ($input == 'n') 
    {
        // Ask for entry
        echo 'Enter item: ';
            // Add entry to list array
            // $items[] = trim(fgets(STDIN));
        // Add function to list array
        $items[] = getInput();

    } elseif ($input == 'r') 
    {
        // Remove which item?
        echo 'Enter item number to remove: ';
            // Get array key
            // $key = trim(fgets(STDIN));
        // Add function to get array key
        $key = getInput();
        // Remove from array
        $key--; // changes display for key
        unset($items[$key]);
        $items = array_values($items);// Reindex numerical array
    }
// Exit when input is (Q)uit
} while ($input != 'q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);
