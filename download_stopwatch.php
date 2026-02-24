<?php
session_start();
$number_of = intval($_POST['stopWatch_last_name'] ?? 0);

// Send CSV with semicolon separator and UTF-8 BOM so Excel opens columns correctly
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="data.csv"');
$output = fopen('php://output', 'w');
// UTF-8 BOM
fwrite($output, "\xEF\xBB\xBF");
// Header row
fputcsv($output, ['Lp', 'Czas', 'Różnica', 'Opis'], ';');

for ($i = 1; $i <= $number_of; $i++) {
    $c1 = $_POST[$i . '_cell1'] ?? '';
    $c2 = $_POST[$i . '_cell2'] ?? '';
    $c3 = $_POST[$i . '_cell3'] ?? '';
    // remove trailing 's' if present and trim
    $c1 = trim(rtrim($c1, "s"));
    $c2 = trim(rtrim($c2, "s"));
    // replace dot decimal separator with comma for Polish Excel
    $c1 = str_replace('.', ',', $c1);
    $c2 = str_replace('.', ',', $c2);
    // sanitize description: remove newlines and tabs
    $c3 = str_replace(["\r", "\n", "\t"], ' ', $c3);
    fputcsv($output, [$i, $c1, $c2, $c3], ';');
}

fclose($output);
exit;
?>