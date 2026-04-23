<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Xodim ma’lumotlari | AJAX</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>👨‍💼 Xodim ma’lumotlari</h2>

    <form id="xodimForm">
        <input type="text" name="xodim_ism" placeholder="Xodim ismi" required>
        <input type="text" name="xodim_fam" placeholder="Xodim familiyasi" required>
        <input type="text" name="xodim_lavozim" placeholder="Lavozimi" required>
        <input type="number" name="xodim_maosh" placeholder="Maoshi (so‘m)" required>
        <input type="number" name="xodim_staj" placeholder="Ish staji (yil)" required>

        <button type="submit">Yuborish</button>
    </form>

    <div id="natija"></div>
</div>

<script src="script.js"></script>
</body>
</html>
