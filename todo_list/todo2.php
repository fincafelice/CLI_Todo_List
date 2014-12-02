<?php

// 12/2/14 Add a (S)ort option to your menu. 
// When it is chosen, it should call a function 
// called sort_menu().


// Create array to hold list of todo items
$items = array();

// List array items formatted for CLI
// This function accepts an array of items.

 function listItems($var)
 {

    $string = '';

    foreach ($var as $key => $value) {
        $key++;
        $string .= "[$key]" . $value . PHP_EOL;
    }

    return $string; 
 }
// When a sort type is selected, order the TODO list accordingly and display 
// the results.

// 12/2/14 Add sort function.  When sort menu is opened, show the
// following options "(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered".
// This function will return a string of those items.
function sort_menu ($items, $userInput) 
{
    if ($userInput == 'a') 
    {
        sort($items);
    }
    elseif ($userInput == 'z') 
    {
        rsort($items);
    }
    elseif ($userInput == 'o')    
    {
        ksort ($items);
    }  
    elseif ($userInput == 'r') 
    {
        krsort ($items);
    }
    return $items;
}
// sort_menu($string);


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
    echo (listItems($items));

    // }

    // Show the menu options
    echo '(N)ew item, (R)emove item, (Q)uit, (S)ort : ';

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
    } else if ($input == 's')
    {
        echo '(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered: ' . PHP_EOL;
        $sortOption = getInput ();
        $items = sort_menu ($items, $sortOption);
    }
// Exit when input is (Q)uit
} while ($input != 'q');


// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);
