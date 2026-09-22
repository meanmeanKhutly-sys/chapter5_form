<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Social Science Grade System</title>

    <style>
        body {
            font-family: Arial;
            background: #eaf7f8;
            padding: 30px;
        }

        .box {
            width: 400px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #277c8e;
        }

        label {
            display: block;
            margin-top: 12px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #5b8def;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #416fc9;
        }

        .result {
            margin-top: 25px;
            padding: 20px;
            background: #eef9ff;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="box">

    <h1>Social Science Grade System</h1>

    <form method="POST">

        <label>Student Name</label>
        <input type="text" name="name" placeholder="Enter Student Name" required>

        <label>Khmer</label>
        <input type="number" name="kh" placeholder="Khmer (0-125)" min="0" max="125" required>

        <label>Math</label>
        <input type="number" name="math" placeholder="Math (0-75)" min="0" max="75" required>

        <label>Environmental Science</label>
        <input type="number" name="env" placeholder="Environmental Science (0-50)" min="0" max="50" required>

        <label>History</label>
        <input type="number" name="his" placeholder="History (0-75)" min="0" max="75" required>

        <label>Geography</label>
        <input type="number" name="geo" placeholder="Geography (0-75)" min="0" max="75" required>

        <label>Moral Civics</label>
        <input type="number" name="moral" placeholder="Moral Civics (0-75)" min="0" max="75" required>

        <label>English</label>
        <input type="number" name="eng" placeholder="English (0-50)" min="0" max="50" required>

        <button type="submit">Calculate</button>

    </form>

<?php

function find_grade($score)
{
    if ($score >= 90)
        return "A";
    elseif ($score >= 80)
        return "B";
    elseif ($score >= 70)
        return "C";
    elseif ($score >= 60)
        return "D";
    elseif ($score >= 50)
        return "E";
    else
        return "F";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];

    $kh = $_POST['kh'];
    $math = $_POST['math'];
    $env = $_POST['env'];
    $his = $_POST['his'];
    $geo = $_POST['geo'];
    $moral = $_POST['moral'];
    $eng = $_POST['eng'];

    $kh_gr = find_grade(($kh / 125) * 100);
    $math_gr = find_grade(($math / 75) * 100);
    $env_gr = find_grade(($env / 50) * 100);
    $his_gr = find_grade(($his / 75) * 100);
    $geo_gr = find_grade(($geo / 75) * 100);
    $moral_gr = find_grade(($moral / 75) * 100);
    $eng_gr = find_grade(($eng / 50) * 100);

    $total = $kh + $math + $env + $his + $geo + $moral + $eng;

    $max = 525;

    $percent = ($total / $max) * 100;

    $overall = find_grade($percent);

?>

    <div class="result">

        <h2>Student Result</h2>

        <p>
            <b>Student:</b>
            <?php echo $name; ?>
        </p>

        <hr>

        <p>
            <b>Khmer:</b>
            <?php echo $kh; ?>/125
            → <?php echo $kh_gr; ?>
        </p>

        <p>
            <b>Math:</b>
            <?php echo $math; ?>/75
            → <?php echo $math_gr; ?>
        </p>

        <p>
            <b>Environmental Science:</b>
            <?php echo $env; ?>/50
            → <?php echo $env_gr; ?>
        </p>

        <p>
            <b>History:</b>
            <?php echo $his; ?>/75
            → <?php echo $his_gr; ?>
        </p>

        <p>
            <b>Geography:</b>
            <?php echo $geo; ?>/75
            → <?php echo $geo_gr; ?>
        </p>

        <p>
            <b>Moral Civics:</b>
            <?php echo $moral; ?>/75
            → <?php echo $moral_gr; ?>
        </p>

        <p>
            <b>English:</b>
            <?php echo $eng; ?>/50
            → <?php echo $eng_gr; ?>
        </p>

        <hr>

        <p>
            <b>Total:</b>
            <?php echo $total; ?> / <?php echo $max; ?>
        </p>

        <p>
            <b>Percentage:</b>
            <?php echo number_format($percent, 2); ?>%
        </p>

        <p>
            <b>Overall Grade:</b>
            <?php echo $overall; ?>
        </p>

    </div>

<?php
}
?>

</div>

</body>
</html>