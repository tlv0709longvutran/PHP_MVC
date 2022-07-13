<?php
$data = $_REQUEST;
foreach ($data as $name => $value) {
    echo $name . ' => ' . $value;
}