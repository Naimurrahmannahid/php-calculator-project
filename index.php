<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>পিএইচপি ক্যালকুলেটর</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    <div>🧮 পিএইচপি ক্যালকুলেটর</div>
    <a href="https://www.nijerinfobd.com/" target="_blank">Nijer Info BD</a>
</div>

<div class="calculator">
    <h2>হিসাব করো সহজেই!</h2>

    <form method="POST">
        <label>প্রথম সংখ্যা:</label>
        <input type="number" step="any" name="num1" placeholder="সংখ্যা দাও" required><br>

        <label>দ্বিতীয় সংখ্যা:</label>
        <input type="number" step="any" name="num2" placeholder="সংখ্যা দাও" required><br>

        <label>অপারেশন:</label>
        <select name="operation" required>
            <option value="add">যোগ (+)</option>
            <option value="sub">বিয়োগ (-)</option>
            <option value="mul">গুণ (×)</option>
            <option value="div">ভাগ (÷)</option>
            <option value="mod">মডুলাস (%)</option>
            <option value="pow">পাওয়ার (^)</option>
        </select><br>

        <button type="submit" name="calculate">হিসাব কর</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = filter_var($_POST['num1'], FILTER_VALIDATE_FLOAT);
        $num2 = filter_var($_POST['num2'], FILTER_VALIDATE_FLOAT);
        $operation = $_POST['operation'];

        if ($num1 === false || $num2 === false) {
            echo "<div class='result' style='color:red;'>⚠️ সংখ্যা ইনপুট দিন!</div>";
        } else {
            switch ($operation) {
                case "add":
                    $result = $num1 + $num2;
                    break;
                case "sub":
                    $result = $num1 - $num2;
                    break;
                case "mul":
                    $result = $num1 * $num2;
                    break;
                case "div":
                    $result = ($num2 != 0) ? $num1 / $num2 : "ভাগ করা যাবে না (০ দ্বারা ভাগ সম্ভব নয়)।";
                    break;
                case "mod":
                    $result = ($num2 != 0) ? $num1 % $num2 : "মডুলাস সম্ভব নয় (০ দ্বারা ভাগ নয়)।";
                    break;
                case "pow":
                    $result = pow($num1, $num2);
                    break;
                default:
                    $result = "সঠিক অপারেশন নির্বাচন করুন!";
            }
            echo "<div class='result'>ফলাফল: <strong>$result</strong></div>";
        }
    }
    ?>
</div>

</body>
</html>
