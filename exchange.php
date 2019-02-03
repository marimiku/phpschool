<?php
$currency = array(500, 200, 100, 50, 20, 10, 5, 2, 1);
if (isset($argv[1])) {
    $user_request = $argv[1];
} else
    $user_request = rand(1, 100000);

if (!is_numeric("$user_request")) {
    echo "Sorry, invalid input. Only integers are required.";
} else {
    if ($user_request > 100000) {
        echo "Sorry, the maximum value you can cash is 100 000 UAH.";
    } else {
        echo $user_request . " UAH:\n";
        foreach ($currency as $value) {
            $i = 0;
            do {
                $i = intval($user_request / $value);
                $user_request = (bcmod($user_request, $value));
            } while ($user_request > $value);
            if ($i != 0) {
                echo $value . ': ' . $i . "\n";
            }
        }
    }
}



