<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Do'kon - Buyurtmalar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 25px 30px;
        }

        .header h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .header p {
            opacity: 0.85;
            font-size: 14px;
        }

        .table-wrapper {
            padding: 25px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead tr {
            background: #667eea;
            color: white;
        }

        thead th {
            padding: 14px 18px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        tbody tr {
            border-bottom: 1px solid #eee;
            transition: background 0.2s;
        }

        tbody tr:hover {
            background: #f5f3ff;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody td {
            padding: 13px 18px;
            font-size: 14px;
            color: #333;
        }

        .badge {
            background: #ede9fe;
            color: #6d28d9;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .narx {
            color: #059669;
            font-weight: 700;
            font-size: 15px;
        }

        .sana {
            color: #6b7280;
            font-size: 13px;
        }

        .error {
            background: #fee2e2;
            color: #dc2626;
            padding: 15px 20px;
            border-radius: 8px;
            margin: 20px;
            border-left: 4px solid #dc2626;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #9ca3af;
            font-size: 16px;
        }

        .footer {
            padding: 15px 25px;
            background: #f9fafb;
            border-top: 1px solid #eee;
            font-size: 13px;
            color: #6b7280;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>🛒 Online Do'kon</h1>
        <p>Buyurtmalar ro'yxati — mahsulot, narx, kategoriya va sana</p>
    </div>

    <?php
    // ==========================================
    // 1. PDO orqali MySQL ga ulanish
    // ==========================================
    $host     = 'localhost';
    $dbname   = 'db_shop';
    $username = 'root';
    $password = '';
    $charset  = 'utf8';

    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $username, $password, $options);

        // ==========================================
        // 2. SQL: 3 jadvalni INNER JOIN bilan bog'lash
        // ==========================================
        $sql = "
            SELECT 
                mahsulotlar.nomi        AS mahsulot_nomi,
                mahsulotlar.narx        AS narx,
                kategoriyalar.nomi      AS kategoriya,
                buyurtmalar.sana        AS sana
            FROM buyurtmalar
            INNER JOIN mahsulotlar  ON buyurtmalar.mahsulot_id   = mahsulotlar.id
            INNER JOIN kategoriyalar ON mahsulotlar.kategoriya_id = kategoriyalar.id
            ORDER BY buyurtmalar.sana DESC
        ";

        $stmt = $pdo->query($sql);
        $buyurtmalar = $stmt->fetchAll();

        // ==========================================
        // 3. HTML Table chiqarish
        // ==========================================
        if (count($buyurtmalar) > 0):
    ?>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mahsulot nomi</th>
                    <th>Narx (so'm)</th>
                    <th>Kategoriya</th>
                    <th>Buyurtma sanasi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buyurtmalar as $index => $qator): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($qator['mahsulot_nomi']) ?></td>
                    <td class="narx"><?= number_format($qator['narx'], 0, '.', ' ') ?> so'm</td>
                    <td><span class="badge"><?= htmlspecialchars($qator['kategoriya']) ?></span></td>
                    <td class="sana"><?= htmlspecialchars($qator['sana']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="footer">
        Jami: <strong><?= count($buyurtmalar) ?> ta</strong> buyurtma topildi.
    </div>

    <?php
        else:
            echo '<div class="empty">📭 Hech qanday buyurtma topilmadi.</div>';
        endif;

    } catch (PDOException $e) {
        echo '<div class="error">
                ❌ <strong>Xatolik:</strong> ' . htmlspecialchars($e->getMessage()) . '
              </div>';
    }
    ?>

</div>

</body>
</html>