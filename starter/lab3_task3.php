<?php
/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 3: switch-case and match Expression [6 marks]
 *
 * @author     [Joshua Mativo]
 * @student    [ENE212-0071/2023]
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       [2/4/2023]
 */

echo "<h2>Task 3 — switch-case and match Expression</h2>";
echo "<hr>";

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Day of Week Classifier
// ══════════════════════════════════════════════════════════════
echo "<h3>Exercise A — Day of Week Classifier</h3>";

$day = 6; // change this to test all cases (1=Monday … 7=Sunday)

echo "Day number: <strong>$day</strong> &nbsp;→&nbsp; ";

switch ($day) {
    case 1:
        echo "Monday — Lecture day";
        break;
    case 2:
        echo "Tuesday — Lecture day";
        break;
    case 3:
        echo "Wednesday — Lecture day";
        break;
    case 4:
        echo "Thursday — Lecture day";
        break;
    case 5:
        echo "Friday — Lecture day";
        break;
    case 6:
    case 7:
        echo "Weekend";
        break;
    default:
        echo "Invalid day number — must be 1 to 7";
}
echo "<br>";

// ══════════════════════════════════════════════════════════════
// EXERCISE B — HTTP Status Code Explainer (switch-case)
// ══════════════════════════════════════════════════════════════
echo "<h3>Exercise B — HTTP Status Code (switch-case)</h3>";

$status_code = 404; // change to test: 200, 301, 400, 401, 403, 404, 500

echo "Status code: <strong>$status_code</strong> &nbsp;→&nbsp; ";

switch ($status_code) {
    case 200:
        echo "OK — request succeeded";
        break;
    case 301:
        echo "Moved Permanently — resource relocated";
        break;
    case 400:
        echo "Bad Request — client error";
        break;
    case 401:
        echo "Unauthorized — authentication required";
        break;
    case 403:
        echo "Forbidden — access denied";
        break;
    case 404:
        echo "Not Found — resource missing";
        break;
    case 500:
        echo "Internal Server Error — server fault";
        break;
    default:
        echo "Unknown status code";
}
echo "<br>";

// ══════════════════════════════════════════════════════════════
// EXERCISE C — PHP 8 match Expression
// ══════════════════════════════════════════════════════════════
echo "<h3>Exercise C — HTTP Status Code (match expression)</h3>";

echo "Status code: <strong>$status_code</strong> &nbsp;→&nbsp; ";

$http_message = match($status_code) {
    200     => "OK — request succeeded",
    301     => "Moved Permanently — resource relocated",
    400     => "Bad Request — client error",
    401     => "Unauthorized — authentication required",
    403     => "Forbidden — access denied",
    404     => "Not Found — resource missing",
    500     => "Internal Server Error — server fault",
    default => "Unknown status code",
};

echo $http_message . "<br>";

// ══════════════════════════════════════════════════════════════
// EXERCISE D — Rewrite comparison
// ══════════════════════════════════════════════════════════════
// Answers in PDF report. Key difference demonstration below:
echo "<h3>Exercise D — switch vs match difference demo</h3>";

$val = 0; // integer zero

echo "Testing \$val = 0 (integer):<br>";

echo "switch result: ";
switch ($val) {
    case "active":   // == comparison: 0 == "active" is true in older PHP, false in PHP 8
        echo "matched 'active' (loose ==)<br>";
        break;
    case 0:
        echo "matched 0 (integer)<br>";
        break;
    default:
        echo "no match<br>";
}

echo "match result: ";
$match_result = match($val) {
    0       => "matched integer 0 (strict ===)",
    "active"=> "matched string 'active'",
    default => "no match",
};
echo $match_result . "<br>";
echo "<small><em>match uses === so 0 and \"active\" are never confused.</em></small><br>";
