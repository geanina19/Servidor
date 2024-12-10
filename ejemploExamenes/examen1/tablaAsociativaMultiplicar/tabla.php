<?php 

$tmulti = [];
$indice = ['uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve', 'diez'];

for ($i=0; $i < count($indice); $i++) { 
    for ($j=1; $j <= 10; $j++) { 
        $tmulti[$indice[$i]][$j] = (($i + 1) * $j);
    }
}

echo "<pre>";
print_r($tmulti);
echo "</pre>";