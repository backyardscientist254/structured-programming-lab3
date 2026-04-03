<?php
/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 2: JKUAT Grade Classification System [8 marks]
 *
 * IMPORTANT: You must complete pseudocode AND flowchart in your PDF
 * report BEFORE writing any code below. Marks are awarded for all
 * three components: pseudocode, flowchart, and working code.
 *
 * @author     [Joshua Mativo]
 * @student    [ENE212-0071/2023]
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       [2/4/2026]
 */

echo "<h2>Task 2 — JKUAT Grade Classification System</h2>";
echo "<hr>";

// ── Test Data Set A (change values to run other test sets) ─────────────────
$name  = "Your Name";
$cat1  = 0;  // out of 10
$cat2  = 0;  // out of 10
$cat3  = 0;  // out of 10
$cat4  = 0;  // out of 10
$exam  = 15; // out of 60

// ── Grade Rules (implement using if-elseif-else, ordered highest first) ────
// A  (Distinction):    Total >= 70
// B+ (Credit Upper):   Total >= 65
// B  (Credit Lower):   Total >= 60
// C+ (Pass Upper):     Total >= 55
// C  (Pass Lower):     Total >= 50
// D  (Marginal Pass):  Total >= 40
// E  (Fail):           Total <  40

// ── Eligibility Rule (implement using nested if) ───────────────────────────
// Must have attended at least 3 of 4 CATs (CAT score > 0 counts as attended)
// AND exam score >= 20
// Otherwise: "DISQUALIFIED — Exam conditions not met"

// ── Supplementary Rule (implement using ternary) ──────────────────────────
// If grade is D: "Eligible for Supplementary Exam"
// Otherwise:     "Not eligible for supplementary"

// ── STEP 1: Compute total ─────────────────────────────────────────────────
$total = $cat1 + $cat2 + $cat3 + $cat4 + $exam;

// ── STEP 2: Count CATs attended ───────────────────────────────────────────
$cats_attended = 0;
if ($cat1 > 0) $cats_attended++;
if ($cat2 > 0) $cats_attended++;
if ($cat3 > 0) $cats_attended++;
if ($cat4 > 0) $cats_attended++;

// ── STEP 3: Eligibility check (nested if) ─────────────────────────────────
$eligibility = "";
$grade       = "";
$remark      = "";
$supplementary = "";

if ($cats_attended >= 3 && $exam >= 20) {

    // Grade classification — highest first
    if ($total >= 70) {
        $grade  = "A";
        $remark = "Distinction";
    } elseif ($total >= 65) {
        $grade  = "B+";
        $remark = "Credit Upper";
    } elseif ($total >= 60) {
        $grade  = "B";
        $remark = "Credit Lower";
    } elseif ($total >= 55) {
        $grade  = "C+";
        $remark = "Pass Upper";
    } elseif ($total >= 50) {
        $grade  = "C";
        $remark = "Pass Lower";
    } elseif ($total >= 40) {
        $grade  = "D";
        $remark = "Marginal Pass";
    } else {
        $grade  = "E";
        $remark = "Fail";
    }

    $eligibility = "ELIGIBLE";

    // Supplementary ternary
    $supplementary = ($grade === "D")
        ? "Eligible for Supplementary Exam"
        : "Not eligible for supplementary";

} else {
    $eligibility   = "DISQUALIFIED — Exam conditions not met";
    $grade         = "N/A";
    $remark        = "N/A";
    $supplementary = "N/A";
}

// ── STEP 4: Display formatted HTML report card ────────────────────────────
$eligible_color = str_starts_with($eligibility, "DISQ") ? "#c0392b" : "#27ae60";
?>
<div style="font-family:Arial;max-width:480px;border:2px solid #2E75B6;border-radius:8px;padding:20px;margin:20px auto;">
    <h3 style="color:#1F3864;text-align:center;margin:0 0 12px;">JKUAT Grade Report Card</h3>
    <hr style="border-color:#2E75B6;">
    <table style="width:100%;border-collapse:collapse;font-size:14px;">
        <tr><td><b>Student:</b></td><td><?= htmlspecialchars($name) ?></td></tr>
        <tr><td><b>CAT 1:</b></td><td><?= $cat1 ?> / 10</td></tr>
        <tr><td><b>CAT 2:</b></td><td><?= $cat2 ?> / 10</td></tr>
        <tr><td><b>CAT 3:</b></td><td><?= $cat3 ?> / 10</td></tr>
        <tr><td><b>CAT 4:</b></td><td><?= $cat4 ?> / 10</td></tr>
        <tr><td><b>Final Exam:</b></td><td><?= $exam ?> / 60</td></tr>
        <tr><td><b>Total:</b></td><td><?= $total ?> / 100</td></tr>
        <tr><td><b>CATs Attended:</b></td><td><?= $cats_attended ?> of 4</td></tr>
        <tr><td><b>Status:</b></td>
            <td style="color:<?= $eligible_color ?>;font-weight:bold;"><?= $eligibility ?></td></tr>
        <tr><td><b>Grade:</b></td><td style="font-size:1.3em;color:#2E75B6;"><b><?= $grade ?></b></td></tr>
        <tr><td><b>Remark:</b></td><td><?= $remark ?></td></tr>
        <tr><td><b>Supplementary:</b></td><td><?= $supplementary ?></td></tr>
    </table>
</div>

<?php
// ── Required Test Data Sets — screenshot each ─────────────────────────────
// Set A: cat1=8, cat2=7, cat3=9, cat4=6,  exam=52  → expect grade B
// Set B: cat1=9, cat2=8, cat3=0, cat4=9,  exam=55  → expect grade A (check cats_attended)
// Set C: cat1=0, cat2=0, cat3=7, cat4=0,  exam=48  → expect DISQUALIFIED
// Set D: cat1=5, cat2=4, cat3=6, cat4=3,  exam=22  → expect grade D + supp eligible
// Set E: cat1=0, cat2=0, cat3=0, cat4=0,  exam=15  → expect DISQUALIFIED
