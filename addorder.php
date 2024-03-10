<?php
for ($i = 1; $i < 10; $i++) {
    $seats = serialize([$i * 2, $i * 2 + 1]);
    $sql = "INSERT INTO `orders` (`id`, `no`, `movie`, `date`, `session`, `qt`, `seats`) VALUES (NULL, '20240217000{$i}', '院線片0{$i}', '2024-02-17', '14:00~16:00', '2', '{$seats}');";
    echo $sql;
    echo "<br>";
}
?>
<!-- INSERT INTO `orders` (`id`, `no`, `movie`, `date`, `session`, `qt`, `seats`) VALUES (NULL, '20240217000${$i}', '院線片0{$i}', '2024-02-17', '14:00~16:00', '2', '{$seats}') -->