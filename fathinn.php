<?php
// Inisialisasi variabel (pindahkan ke atas!)
$num1 = $num2 = $operation = $result = "";
$error = "";

// Proses form jika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = htmlspecialchars($_POST['num1']);
    $num2 = htmlspecialchars($_POST['num2']);
    $operation = htmlspecialchars($_POST['operation']);

    // Validasi input
    if (!is_numeric($num1) || !is_numeric($num2)) {
        $error = "Masukkan angka yang valid!";
    } elseif ($operation == "/" && $num2 == 0) {
        $error = "Tidak bisa membagi dengan nol!";
    } else {
        // Hitung hasil
        switch ($operation) {
            case "+":
                $result = $num1 + $num2;
                break;
            case "-":
                $result = $num1 - $num2;
                break;
            case "*":
                $result = $num1 * $num2;
                break;
            case "/":
                $result = $num1 / $num2;
                break;
            default:
                $error = "Operasi tidak valid!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Kalkulator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1c223b 50%, #0306e4d3 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .calculator {
            background: #2b05d4af;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(2, 230, 247, 0.93);
            padding: 20px;
            width: 300px;
            text-align: center;
        }
        h1 {
            color: #242323;
            margin-bottom: 20px;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 18px;
            box-sizing: border-box;
        }
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 18px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #1d91f0;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s;
        }
        button:hover {
            background: #0bcad8;
        }
        .result {
            margin-top: 20px;
            font-size: 20px;
            color: #6d07f1;
            background: #09e7dc;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #2d08d3a4;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
   
    <div class="calculator">
        <h1>Kalkulator Sederhana</h1>
        <form method="post" action="">
            <input type="number" name="num1" placeholder="Angka pertama" value="<?php echo htmlspecialchars($num1); ?>" required>
            <select name="operation" required>
                <option value="">Pilih operasi</option>
                <option value="+" <?php if ($operation == "+") echo "selected"; ?>>+</option>
                <option value="-" <?php if ($operation == "-") echo "selected"; ?>>-</option>
                <option value="*" <?php if ($operation == "*") echo "selected"; ?>>*</option>
                <option value="/" <?php if ($operation == "/") echo "selected"; ?>>/</option>
            </select>
            <input type="number" name="num2" placeholder="Angka kedua" value="<?php echo htmlspecialchars($num2); ?>" required>
            <button type="submit">Hitung</button>
        </form>
       
        <?php if ($error): ?>
            <div class="result error"><?php echo htmlspecialchars($error); ?></div>
        <?php elseif ($result !== ""): ?>
            <div class="result">Hasil: <?php echo htmlspecialchars($result); ?></div>
        <?php endif; ?>
    </div>
</body>
</html>