<?php

// type declaration
declare(strict_types=1);

function is_input_empty(...$inputs)
{
    foreach ($inputs as $input) {
        if (empty($input)) {
            return true;
        }
    }
    return false;
}
