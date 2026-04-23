<?php
// Boshlang‘ich qiymatlar
$foydalanuvchi = $email = $telefon = $kasb = $izoh = "";
$showResult = false;

// Tozalash tugmasi bosilsa
if (isset($_POST['tozalash'])) {
    // hamma narsa bo‘sh qoladi
}

// Yuborish tugmasi bosilsa
elseif (isset($_POST['yuborish'])) {
    $foydalanuvchi = $_POST['foydalanuvchi'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $kasb = $_POST['kasb'];
    $izoh = $_POST['izoh'];
    $showResult = true;
}
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>PHP Forma</title>
    <style>
        body {
            font-family: Arial;
            margin: 30px;
              font-family: Arial;
             margin: 30px;
             background: #f9f9f9;
        }
        
        form {
            width: 400px;
        }
        input, textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 6px;
        }
        button {
            padding: 8px 15px;
            margin-right: 5px;
        }
        .natija {
            margin-top: 20px;
            background: #f2f2f2;
            padding: 15px;
        }
       
        .btn-yuborish {
    background: #28a745; /* yashil */
    color: white;
    border: none;
    padding: 8px 18px;
    cursor: pointer;
    border-radius: 4px;
}

.btn-tozalash {
    background: #dc3545; /* qizil */
    color: white;
    border: none;
    padding: 8px 18px;
    cursor: pointer;
    border-radius: 4px;
}

.btn-yuborish:hover {
    background: #218838;
}

.btn-tozalash:hover {
    background: #c82333;
}
    </style>
</head>
<body>

<h2>Foydalanuvchi Ma'lumotlari</h2>

<form method="POST">
    <label>Foydalanuvchi:</label>
    <input type="text" name="foydalanuvchi" value="<?= htmlspecialchars($foydalanuvchi) ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required>

    <label>Telefon:</label>
    <input type="tel" name="telefon" value="<?= htmlspecialchars($telefon) ?>" required>

    <label>Kasb:</label>
    <input type="text" name="kasb" value="<?= htmlspecialchars($kasb) ?>" required>

    <label>Izoh:</label>
    <textarea name="izoh" rows="4"><?= htmlspecialchars($izoh) ?></textarea>

   <button type="submit" name="yuborish" class="btn-yuborish">Yuborish</button>
<button type="submit" name="tozalash" class="btn-tozalash">Tozalash</button>

</form>

<?php if ($showResult): ?>
<div class="natija">
    <h3>Kiritilgan ma'lumotlar:</h3>
    Foydalanuvchi: <b><?= htmlspecialchars($foydalanuvchi) ?></b><br>
    Email: <b><?= htmlspecialchars($email) ?></b><br>
    Telefon: <b><?= htmlspecialchars($telefon) ?></b><br>
    Kasb: <b><?= htmlspecialchars($kasb) ?></b><br>
    Izoh: <b><?= htmlspecialchars($izoh) ?></b>
</div>
<?php endif; ?>

</body>
</html>
