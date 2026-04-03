<?php
/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 1: Simple if and if-else — Warm-Up Exercises [5 marks]
 *
 * @author     [Joshua Mativo]
 * @student    [ENE212-0071/2023]
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       [2/4/2026]
 */

echo "<h2>Task 1 — Warm-Up Exercises</h2>";
echo "<hr>";

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Temperature Alert System
// ══════════════════════════════════════════════════════════════
echo "<h3>Exercise A — Temperature Alert System</h3>";

$temperature = 34.5; // change to 36.8 and 34.5 for other test screenshots

echo "Temperature: {$temperature}°C &nbsp;→&nbsp; ";

if ($temperature >= 36.1 && $temperature <= 37.5) {
    echo "<strong>Normal</strong>";
}
if ($temperature > 37.5) {
    echo "<strong style='color:red;'>Fever</strong>";
}
if ($temperature < 36.1) {
    echo "<strong style='color:blue;'>Hypothermia Warning</strong>";
}
echo "<br>";

// ══════════════════════════════════════════════════════════════
// EXERCISE B — Even or Odd
// ══════════════════════════════════════════════════════════════
echo "<h3>Exercise B — Even or Odd</h3>";

$number = 47;

if ($number % 2 === 0) {
    echo "$number is <strong>EVEN</strong><br>";
} else {
    echo "$number is <strong>ODD</strong><br>";
}

// Divisibility checks
if ($number % 3 === 0) {
    echo "$number is divisible by 3<br>";
} else {
    echo "$number is NOT divisible by 3<br>";
}

if ($number % 5 === 0) {
    echo "$number is divisible by 5<br>";
} else {
    echo "$number is NOT divisible by 5<br>";
}

if ($number % 3 === 0 && $number % 5 === 0) {
    echo "$number is divisible by both 3 and 5<br>";
} else {
    echo "$number is NOT divisible by both 3 and 5<br>";
}

// ══════════════════════════════════════════════════════════════
// EXERCISE C — Comparison Chain
// ══════════════════════════════════════════════════════════════
echo "<h3>Exercise C — Comparison Chain</h3>";
echo "<pre>";

$x = 10; $y = "10"; $z = 10.0;

echo "x = 10 (int),  y = \"10\" (string),  z = 10.0 (float)\n\n";

echo "A: var_dump(\$x == \$y)  → "; var_dump($x == $y);   // bool(true)
echo "B: var_dump(\$x === \$y) → "; var_dump($x === $y);  // bool(false)
echo "C: var_dump(\$x == \$z)  → "; var_dump($x == $z);   // bool(true)
echo "D: var_dump(\$x === \$z) → "; var_dump($x === $z);  // bool(false)
echo "E: var_dump(\$y === \$z) → "; var_dump($y === $z);  // bool(false)
echo "F: var_dump(\$x <=> \$y) → "; var_dump($x <=> $y); // int(0)

echo "</pre>";

// ══════════════════════════════════════════════════════════════
// EXERCISE D — Null & Default Values
// ══════════════════════════════════════════════════════════════
echo "<h3>Exercise D — Null Coalescing Operator (??)</h3>";

$username = null;
$display  = $username ?? "Guest";
echo "Welcome, $display<br>";

// Chained null coalescing
$config_val = null;
$env_val    = null;
$default    = "system_default";
$result     = $config_val ?? $env_val ?? $default;
echo "Config: $result<br>";

// TODO: Add one more chained ?? example of your own and explain it in your report.
// Custom example — simulating a user profile with fallback display name
$db_name      = null;   // not found in database
$session_name = null;   // not set in session
$cookie_name  = "Alice"; // found in cookie
$fallback     = "Anonymous";

$display_name = $db_name ?? $session_name ?? $cookie_name ?? $fallback;
echo "Display name (db → session → cookie → fallback): <strong>$display_name</strong><br>";
echo "<small>Explanation: \$db_name and \$session_name are null, so PHP falls through to \$cookie_name = 'Alice'.</small><br>";
