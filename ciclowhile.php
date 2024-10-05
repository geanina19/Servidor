<?php
$i = 0;
while ( TRUE ) {
    $i++;

    if ($i > 10)
    break;

    if ($i%2 == 0)
    continue;

    echo " $i <br> ";
}
?>