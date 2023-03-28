<?php

// Define the grammar for the programming language
$grammar = array(
    'start' => 'stmt*',
    'stmt' => array(
        'if_stmt',
        'while_stmt',
        'for_stmt',
        'func_def',
        'return_stmt',
        'expr ;'
    ),
    'if_stmt' => array(
        'if ( expr ) stmt ( else stmt )?'
    ),
    'while_stmt' => array(
        'while ( expr ) stmt'
    ),
    'for_stmt' => array(
        'for ( var in expr ) stmt'
    ),
    'func_def' => array(
        'func name ( params ) stmt'
    ),
    'return_stmt' => array(
        'return expr ;'
    ),
    'expr' => array(
        'term ((+|-) term)*'
    ),
    'term' => array(
        'factor ((*|/) factor)*)'
    ),
    'factor' => array(
        'number',
        'string',
        'true',
        'false',
        'var',
        'func_call',
        '\( expr \)'
    ),
    'func_call' => array(
        'name ( args )'
    ),
    'args' => array(
        'expr (, expr)*'
    ),
    'params' => array(
        'var (, var)*'
    ),
    'var' => array(
        '[a-zA-Z_][a-zA-Z0-9_]*'
    ),
    'name' => array(
        '[a-zA-Z_][a-zA-Z0-9_]*'
    ),
    'number' => array(
        '-?\d+(\.\d+)?'
    ),
    'string' => array(
        '".*"'
    )
);

// Define a symbol table to keep track of variables and their values
$symbol_table = array();

// Define a function to parse an expression using the grammar
function parse_expression($expression) {
    global $grammar;
    $tokens = preg_split('/\s+/', $expression);
    $rules = array();
    foreach ($tokens as $token) {
        foreach ($grammar as $rule_name => $rule_body) {
            foreach ($rule_body as $rule_pattern) {
                if (preg_match('/^' . str_replace(' ', '\s+', $rule_pattern) . '$/', $token)) {
                    $rules[] = $rule_name;
                }
            }
        }
    }
    return $rules;
}

// Define a function to evaluate an expression using the parsed rules
function evaluate_expression($rules) {
    global $symbol_table;
    $stack = array();
    foreach ($rules as $rule) {
        if (preg_match('/^\d+(\.\d+)?$/', $rule)) {
            array_push($stack, (float) $rule);
        } else if (preg_match('/^"(.*)"$/s', $rule, $matches)) {
            array_push($stack, $matches[1]);
        } else if ($rule == 'true') {
            array_push($stack, true);
        } else if ($rule == 'false') {
            array_push($stack, false);
        } else if (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $rule)) {
            array_push($stack, $symbol_table[$rule]);
        } else if ($rule == '+' || $rule == '-') {
            $b = array_pop($stack);
            $a = array_pop($stack);
            if ($rule == '+') {
                array_push($stack,


<?php

// Define the grammar for the programming language
$grammar = array(
    'start' => 'expr',
    'expr' => array(
        'term ([+-] term)*'
    ),
    'term' => array(
        'factor ([*/] factor)*'
    ),
    'factor' => array(
        'number',
        '\( expr \)'
    )
);

// Define a function to parse an expression using the grammar
function parse_expression($expression) {
    global $grammar;
    $tokens = preg_split('/\s+/', $expression);
    $rules = array();
    foreach ($tokens as $token) {
        foreach ($grammar as $rule_name => $rule_body) {
            foreach ($rule_body as $rule_pattern) {
                if (preg_match('/^' . str_replace(' ', '\s+', $rule_pattern) . '$/', $token)) {
                    $rules[] = $rule_name;
                }
            }
        }
    }
    return $rules;
}

// Define a function to evaluate an expression using the parsed rules
function evaluate_expression($rules) {
    $stack = array();
    foreach ($rules as $rule) {
        if (preg_match('/^\d+$/', $rule)) {
            array_push($stack, $rule);
        } else if ($rule == '+' || $rule == '-') {
            $b = array_pop($stack);
            $a = array_pop($stack);
            if ($rule == '+') {
                array_push($stack, $a + $b);
            } else {
                array_push($stack, $a - $b);
            }
        } else if ($rule == '*' || $rule == '/') {
            $b = array_pop($stack);
            $a = array_pop($stack);
            if ($rule == '*') {
                array_push($stack, $a * $b);
            } else {
                array_push($stack, $a / $b);
            }
        }
    }
    return array_pop($stack);
}

// Test the parser and interpreter with some sample expressions
$expression1 = '1 + 2 * 3';
$expression2 = '( 1 + 2 ) * 3';
$expression3 = '1 + 2 * ( 3 - 4 )';
$rules1 = parse_expression($expression1);
$rules2 = parse_expression($expression2);
$rules3 = parse_expression($expression3);
$result1 = evaluate_expression($rules1);
$result2 = evaluate_expression($rules2);
$result3 = evaluate_expression($rules3);
echo $expression1 . ' = ' . $result1 . "\n";
echo $expression2 . ' = ' . $result2 . "\n";
echo $expression3 . ' = ' . $result3 . "\n";

?>
<?php

// Define the grammar for the programming language
$grammar = array(
    'start' => 'expr',
    'expr' => array(
        'term ([+-] term)*'
    ),
    'term' => array(
        'factor ([*/] factor)*'
    ),
    'factor' => array(
        'number',
        'var',
        '\( expr \)'
    ),
    'assign' => array(
        'var = expr'
    ),
    'var' => array(
        '[a-zA-Z_][a-zA-Z0-9_]*'
    )
);

// Define a symbol table to keep track of variables and their values
$symbol_table = array();

// Define a function to parse an expression using the grammar
function parse_expression($expression) {
    global $grammar;
    $tokens = preg_split('/\s+/', $expression);
    $rules = array();
    foreach ($tokens as $token) {
        foreach ($grammar as $rule_name => $rule_body) {
            foreach ($rule_body as $rule_pattern) {
                if (preg_match('/^' . str_replace(' ', '\s+', $rule_pattern) . '$/', $token)) {
                    $rules[] = $rule_name;
                }
            }
        }
    }
    return $rules;
}

// Define a function to evaluate an expression using the parsed rules
function evaluate_expression($rules) {
    global $symbol_table;
    $stack = array();
    foreach ($rules as $rule) {
        if (preg_match('/^\d+$/', $rule)) {
            array_push($stack, $rule);
        } else if (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $rule)) {
            array_push($stack, $symbol_table[$rule]);
        } else if ($rule == '+' || $rule == '-') {
            $b = array_pop($stack);
            $a = array_pop($stack);
            if ($rule == '+') {
                array_push($stack, $a + $b);
            } else {
                array_push($stack, $a - $b);
            }
        } else if ($rule == '*' || $rule == '/') {
            $b = array_pop($stack);
            $a = array_pop($stack);
            if ($rule == '*') {
                array_push($stack, $a * $b);
            } else {
                array_push($stack, $a / $b);
            }
        }
    }
    return array_pop($stack);
}

// Define a function to compile a source code string into executable instructions
function compile_source($source) {
    $instructions = array();
    $lines = preg_split('/\r?\n/', $source);
    foreach ($lines as $line) {
        $tokens = preg_split('/\s+/', $line);
        if (count($tokens) == 3 && $tokens[1] == '=') {
            $var = $tokens[0];
            $expr = implode(' ', array_slice($tokens, 2));
            $rules = parse_expression($expr);
            $instructions[] = array('type' => 'assign', 'var' => $var, 'expr' => $rules);
        } else if (count($tokens) > 0) {
            $expr = implode(' ', $tokens);
            $rules = parse_expression($expr);
            $instructions[] = array('type' => 'eval', 'expr' => $rules);
        }
    }
    return $instructions;
}

// Define
<?php

// Define the grammar for the programming language
$grammar = array(
    'start' => 'stmt*',
    'stmt' => array(
        'if_stmt',
        'while_stmt',
        'for_stmt',
        'foreach_stmt',
        'func_def',
        'return_stmt',
        'expr ;'
    ),
    'if_stmt' => array(
        'if ( expr ) stmt ( else stmt )?'
    ),
    'while_stmt' => array(
        'while ( expr ) stmt'
    ),
    'for_stmt' => array(
        'for ( var = expr ; expr ; expr ) stmt'
    ),
    'foreach_stmt' => array(
        'foreach ( expr as var ) stmt'
    ),
    'func_def' => array(
        'func name ( params ) stmt'
    ),
    'return_stmt' => array(
        'return expr ;'
    ),
    'expr' => array(
        'term ((+|-|*|/) term)*'
    ),
    'term' => array(
        'factor (\. factor)*'
    ),
    'factor' => array(
        'number',
        'string',
        'true',
        'false',
        'var',
        'func_call',
        '\( expr \)'
    ),
    'func_call' => array(
        'name ( args )'
    ),
    'args' => array(
        'expr (, expr)*'
    ),
    'params' => array(
        'var (, var)*'
    ),
    'var' => array(
        '[a-zA-Z_][a-zA-Z0-9_]*'
    ),
    'name' => array(
        '[a-zA-Z_][a-zA-Z0-9_]*'
    ),
    'number' => array(
        '-?\d+(\.\d+)?'
    ),
    'string' => array(
        '".*"'
    )
);

// Define a symbol table to keep track of variables and their values
$symbol_table = array();

// Define a function to parse an expression using the grammar
function parse_expression($expression) {
    global $grammar;
    $tokens = preg_split('/\s+/', $expression);
    $rules = array();
    foreach ($tokens as $token) {
        foreach ($grammar as $rule_name => $rule_body) {
            foreach ($rule_body as $rule_pattern) {
                if (preg_match('/^' . str_replace(' ', '\s+', $rule_pattern) . '$/', $token)) {
                    $rules[] = $rule_name;
                }
            }
        }
    }
    return $rules;
}

// Define a function to evaluate an expression using the parsed rules
function evaluate_expression($rules) {
    global $symbol_table;
    $stack = array();
    foreach ($rules as $rule) {
        if (preg_match('/^\d+(\.\d+)?$/', $rule)) {
            array_push($stack, (float) $rule);
        } else if (preg_match('/^"(.*)"$/s', $rule, $matches)) {
            array_push($stack, $matches[1]);
        } else if ($rule == 'true') {
            array_push($stack, true);
        } else if ($rule == 'false') {
            array_push($stack, false);
        } else if (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $rule)) {
            array_push($stack, $symbol_table[$rule]);
        } else if ($rule == '+' || $rule == '-' || $rule
