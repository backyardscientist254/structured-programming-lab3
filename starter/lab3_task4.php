<?php
/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 4: Nested Conditions — Loan Eligibility Checker [6 marks]
 *
 * IMPORTANT: You must complete pseudocode AND flowchart in your PDF
 * report BEFORE writing any code below.
 *
 * @author     [Joshua Mativo]
 * @student    [ENE212-0071/2023]
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       [2/4/2026]
 */

echo "<h2>Task 4 — HELB Loan Eligibility Checker</h2>";
echo "<hr>";

// ── Problem: Student Loan Eligibility System ───────────────────────────────
//
// A student applies for a HELB loan. Eligibility rules (nested):
//
// OUTER CHECK — Is the student enrolled?
//   $enrolled = true/false
//   If NOT enrolled → "Not eligible — must be an active student"
//
// INNER CHECK 1 — GPA requirement (if enrolled)
//   $gpa (float, 0.0–4.0)
//   GPA >= 2.0 → proceed to inner check 2
//   GPA < 2.0  → "Not eligible — GPA below minimum (2.0)"
//
// INNER CHECK 2 — Household income bracket (if enrolled AND GPA >= 2.0)
//   $annual_income (KES)
//   < 100000   → "Eligible — Full loan award"
//   < 250000   → "Eligible — Partial loan (75%)"
//   < 500000   → "Eligible — Partial loan (50%)"
//   >= 500000  → "Not eligible — household income exceeds threshold"
//
// ADDITIONAL RULE — Ternary for renewal vs new application:
//   $previous_loan = true/false
//   If eligible: use ternary to append "| Renewal application" or "| New application"

// ── Test data (change to test all branches) ───────────────────────────────
$enrolled       = true;
$gpa            = 2.0;
$annual_income  = 50000;
$previous_loan  = true;

// ── STEP 1: Outer enrollment check ────────────────────────────────────────
$decision      = "";
$is_eligible   = false;

if (!$enrolled) {
    $decision = "Not eligible — must be an active student";

} else {
    // INNER CHECK 1 — GPA
    if ($gpa < 2.0) {
        $decision = "Not eligible — GPA below minimum (2.0)";

    } else {
        // INNER CHECK 2 — Household income bracket
        if ($annual_income < 100000) {
            $decision    = "Eligible — Full loan award";
            $is_eligible = true;
        } elseif ($annual_income < 250000) {
            $decision    = "Eligible — Partial loan (75%)";
            $is_eligible = true;
        } elseif ($annual_income < 500000) {
            $decision    = "Eligible — Partial loan (50%)";
            $is_eligible = true;
        } else {
            $decision = "Not eligible — household income exceeds threshold";
        }

        // Ternary — renewal vs new application (only if eligible)
        if ($is_eligible) {
            $application_type = $previous_loan ? "Renewal application" : "New application";
            $decision .= " | " . $application_type;
        }
    }
}

// ── STEP 2: Display result ────────────────────────────────────────────────
$status_color = $is_eligible ? "#27ae60" : "#c0392b";
?>
<div style="font-family:Arial;max-width:480px;border:2px solid #2E75B6;border-radius:8px;padding:20px;margin:20px auto;">
    <h3 style="color:#1F3864;text-align:center;margin:0 0 12px;">HELB Loan Eligibility Report</h3>
    <hr style="border-color:#2E75B6;">
    <table style="width:100%;border-collapse:collapse;font-size:14px;">
        <tr><td><b>Enrolled:</b></td>
            <td><?= $enrolled ? "Yes" : "No" ?></td></tr>
        <tr><td><b>GPA:</b></td>
            <td><?= number_format($gpa, 2) ?> / 4.00</td></tr>
        <tr><td><b>Annual Household Income:</b></td>
            <td>KES <?= number_format($annual_income) ?></td></tr>
        <tr><td><b>Previous HELB Loan:</b></td>
            <td><?= $previous_loan ? "Yes" : "No" ?></td></tr>
        <tr><td colspan="2"><hr style="border-color:#ddd;margin:6px 0;"></td></tr>
        <tr><td><b>Decision:</b></td>
            <td style="color:<?= $status_color ?>;font-weight:bold;"><?= $decision ?></td></tr>
    </table>
</div>

<?php
// ── Required Test Data Sets — screenshot each ─────────────────────────────
// Set A: enrolled=true,  gpa=3.1, income=180000,  previous=false → Partial 75%
// Set B: enrolled=true,  gpa=1.8, income=80000,   previous=false → GPA fail
// Set C: enrolled=false, gpa=3.5, income=60000,   previous=true  → Not enrolled
// Set D: enrolled=true,  gpa=2.5, income=600000,  previous=true  → Income fail
// Set E: enrolled=true,  gpa=2.0, income=50000,   previous=true  → Full | Renewal
