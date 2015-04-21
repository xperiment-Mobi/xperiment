<?php
header('Content-type: text');
foreach (glob("*.sav") as $filename) {
    echo file_get_contents($filename);
}
?>