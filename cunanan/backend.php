<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Payroll</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 60%;
            background-color: #ffffff;
            border: 1px solid #ddd;
        }
        td, th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
        .right-align {
            text-align: right;
        }
        .bold {
            font-weight: bold;
        }
        hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 10px 0;
        }
    </style>
</head>
<body>

<?php 
// Ensure data is safely handled
$name = htmlspecialchars($_POST['pangalan'] ?? 'N/A');
$totaldays_work = (float)($_POST['work'] ?? 0);
$dailyrate = (float)($_POST['rate'] ?? 0);
$cashAD = (float)($_POST['cash'] ?? 0);

$gross = $dailyrate * $totaldays_work;
$tax = $gross * 0.05;
$Sss = $gross * 0.02;
$Phil = $gross * 0.03;
$pagibig = 50;
$Deduction = $cashAD + $tax + $Sss + $Phil + $pagibig;
$net = $gross - $Deduction;
?>

<h1>ACCOUNT</h1>

<table  cellpadding="4" cellspacing="2" align="center" width="350">
    <tr>
        <td width="150"> Name:</td>
        <td><?php echo htmlspecialchars($name); ?></td>
    </tr>
    <tr>
        <td>Rate:</td>
        <td><?php echo number_format($dailyrate, 2); ?></td>
    </tr>
    <tr>
        <td>Income:</td>
        <td><?php echo number_format($totaldays_work); ?></td>
    </tr>
    <tr>
        <td colspan="2"><hr></td>
    </tr>
    <tr>
        <td colspan="2"><b>DEDUCTIONS:</b></td>
    </tr>
    <tr class="right-align">
        <td>Tax 5%:</td>
        <td><?php echo number_format($tax, 2); ?></td>
    </tr>
    <tr class="right-align">
        <td> 2%:</td>
        <td><?php echo number_format($Sss, 2); ?></td>
    </tr>
    <tr class="right-align">
        <td> 3s%:</td>
        <td><?php echo number_format($Phil, 2); ?></td>
    </tr>
    <tr class="right-align">
        <td> Advance:</td>
        <td><?php echo number_format($cashAD, 2); ?></td>
    </tr>
    <tr>
        <td colspan="2"><hr></td>
    </tr>
    <tr>
        <td class="bold">TOTAL AMMOUNT:</td>
        <td class="right-align bold"><?php echo number_format($Deduction, 2); ?></td>
    </tr>
    <tr>
        <td class="bold">DEDUCTIONS:</td>
        <td class="right-align bold"><?php echo number_format($net, 2); ?></td>
    </tr>
</table>

</body>
</html>