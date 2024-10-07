<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Salary Calculator</title>
    <style>
        body {
            font-family: bara-bara;
            margin: 0;
            padding: 20px;
            background-color: #ADD8e6;
        }
        h1 {
            color: #333;
            text-align: center; /* Center the text */
        }
        form {
            background: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
            margin: auto;
        }
        label {
            margin-top: 10px;
            display: block;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        .result {
            margin-top: 20px;
            font-size: 1.2em;
            color: #333;
            text-align: center; /* Center the result */
        }
    </style>
</head>
<body>
    <h1>Employee Salary Calculator</h1>
    <form method="post">

    <label for="base_salary">Employee Name:</label>
        <input type="text" name="employee_name" required>

        <label for="base_salary">Base Salary (Hourly Rate):</label>
        <input type="text" name="base_salary" required>

        <label for="hours_worked">Hours Worked:</label>
        <input type="text" name="hours_worked" required>

        <label for="overtime_hours">Overtime Hours:</label>
        <input type="text" name="overtime_hours" required>

        <label for="overtime_rate">Overtime Rate:</label>
        <input type="text" name="overtime_rate" required>

        <label for="bonus">Bonus:</label>
        <input type="text" name="bonus" required>

        <label for="deductions">Deductions:</label>
        <input type="text" name="deductions" required>

        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $employee_name = $_POST['employee_name'];
        $base_salary = $_POST['base_salary'];
        $hours_worked = $_POST['hours_worked'];
        $overtime_hours = $_POST['overtime_hours'];
        $overtime_rate = $_POST['overtime_rate'];
        $bonus = $_POST['bonus'];
        $deductions = $_POST['deductions'];

        // Calculate regular pay and overtime pay
        $regular_pay = $base_salary * $hours_worked;
        $overtime_pay = $overtime_hours * $overtime_rate;

        // Calculate total and net salary
        $total_salary = $regular_pay + $overtime_pay + $bonus;
        $net_salary = $total_salary - $deductions;
        
        echo "<div class='result'>The net salary for <strong>$employee_name</strong> is: ₱" . number_format($net_salary, 2) . "</div>";
    }
    
    ?>
</body>
</html>
