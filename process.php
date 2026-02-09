<?php
// Xavfsizlik funksiyasi
function tozalash($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$ism = tozalash($_POST['xodim_ism']);
$fam = tozalash($_POST['xodim_fam']);
$lavozim = tozalash($_POST['xodim_lavozim']);
$maosh = intval($_POST['xodim_maosh']);
$staj = intval($_POST['xodim_staj']);

echo "
<table>
    <tr>
        <th>Ism</th>
        <th>Familiya</th>
        <th>Lavozim</th>
        <th>Maosh</th>
        <th>Staj</th>
    </tr>
    <tr>
        <td>$ism</td>
        <td>$fam</td>
        <td>$lavozim</td>
        <td>$maosh so‘m</td>
        <td>$staj yil</td>
    </tr>
</table>
";
?>
