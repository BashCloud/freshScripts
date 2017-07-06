<?php
// Open log file
$logfile = "log.txt";

if (file_exists($logfile)) {
    $handle = fopen($logfile, "r");
    $log = fread($handle, filesize($logfile));
    fclose($handle);
} else {
    die ("The log file doesn't exist!");
}

// Seperate each logline
$log = explode("\n", trim($log));

// Seperate each part in each logline
for ($i = 0; $i < count($log); $i++) {
    $log[$i] = trim($log[$i]);
    $log[$i] = explode('|', $log[$i]);
}


echo count($log) . " people have visited this website.";

// Show a table of the logfile
echo '<table>';
echo '<th>IP Address</th>';
echo '<th>Referrer</th>';
echo '<th>Date</th>';
echo '<th>Useragent</th>';
echo '<th>Remote Host</th>';
echo '<th>Page</th>';

foreach ($log as $logline) {
    echo '<tr>';
    echo '<td>' . $logline['0'] . '</td>';
    echo '<td>' . urldecode($logline['1']) . '</td>';
    echo '<td>' . date('d/m/Y', $logline['2']) . '</td>';
    echo '<td>' . $logline['3'] . '</td>';
    echo '<td>' . $logline['4'] . '</td>';
    echo '<td>' . $logline['5'] . '</td>';
    echo '</tr>';

}

echo '</table>';

?>
