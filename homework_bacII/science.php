<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Science Grade System</title>

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

    <h1>Science Grade System</h1>

    <form method="POST">

        <label>Student Name</label>
        <input type="text" name="name" placeholder="Enter Student Name" required>

        <label>Math</label>
        <input type="number" name="math" placeholder="Math (0-125)" min="0" max="125" required>

        <label>Khmer</label>
        <input type="number" name="kh" placeholder="Khmer (0-75)" min="0" max="75" required>

        <label>History</label>
        <input type="number" name="his" placeholder="History (0-50)" min="0" max="50" required>

        <label>Chemistry</label>
        <input type="number" name="chem" placeholder="Chemistry (0-75)" min="0" max="75" required>

        <label>Biology</label>
        <input type="number" name="bio" placeholder="Biology (0-75)" min="0" max="75" required>

        <label>Physics</label>
        <input type="number" name="phy" placeholder="Physics (0-75)" min="0" max="75" required>

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

    $math = $_POST['math'];
    $kh = $_POST['kh'];
    $his = $_POST['his'];
    $chem = $_POST['chem'];
    $bio = $_POST['bio'];
    $phy = $_POST['phy'];
    $eng = $_POST['eng'];

    $math_gr = find_grade(($math / 125) * 100);
    $kh_gr = find_grade(($kh / 75) * 100);
    $his_gr = find_grade(($his / 50) * 100);
    $chem_gr = find_grade(($chem / 75) * 100);
    $bio_gr = find_grade(($bio / 75) * 100);
    $phy_gr = find_grade(($phy / 75) * 100);
    $eng_gr = find_grade(($eng / 50) * 100);

    $total = $math + $kh + $his + $chem + $bio + $phy + $eng;

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
            <b>Math:</b>
            <?php echo $math; ?>/125
            → <?php echo $math_gr; ?>
        </p>

        <p>
            <b>Khmer:</b>
            <?php echo $kh; ?>/75
            → <?php echo $kh_gr; ?>
        </p>

        <p>
            <b>History:</b>
            <?php echo $his; ?>/50
            → <?php echo $his_gr; ?>
        </p>

        <p>
            <b>Chemistry:</b>
            <?php echo $chem; ?>/75
            → <?php echo $chem_gr; ?>
        </p>

        <p>
            <b>Biology:</b>
            <?php echo $bio; ?>/75
            → <?php echo $bio_gr; ?>
        </p>

        <p>
            <b>Physics:</b>
            <?php echo $phy; ?>/75
            → <?php echo $phy_gr; ?>
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