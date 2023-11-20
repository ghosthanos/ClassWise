<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User/Admin Selection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 0 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Select User Type</h2>
    <form action="#" method="POST">
        <a href={{ route('teacher.login') }}>
            <button type="button">Teacher</button>
          </a> <br><br>
          <a href={{ route('student.login') }}>
            <button type="button">Student</button>
          </a>
    </form>

</div>

</body>
</html>
