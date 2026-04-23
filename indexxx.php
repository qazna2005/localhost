<?php
function minMax($arr) {

    if (empty($arr)) {
        return null;
    }

    $min = $arr[0];
    $max = $arr[0];

    foreach ($arr as $son) {
        if ($son < $min) {
            $min = $son;
        }
        if ($son > $max) {
            $max = $son;
        }
    }

    return [
        'min' => $min,
        'max' => $max
    ];
}

// Input qiymatini saqlab qolish
$oldValue = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldValue = $_POST["sonlar"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Min Max Topish</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
    <h2>Min/Max Topish Dasturi</h2>

    <form method="post">
        <input 
            type="text" 
            name="sonlar" 
            placeholder="Masalan: 5,8,2,10"
            value="<?php echo htmlspecialchars($oldValue); ?>"
            required>
        <button type="submit">Hisoblash</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $array = array_map('intval', explode(",", $oldValue));
        $natija = minMax($array);

        echo "<div class='result'>";
        echo "<p><strong>Eng kichik son:</strong> " . $natija['min'] . "</p>";
        echo "<p><strong>Eng katta son:</strong> " . $natija['max'] . "</p>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>
