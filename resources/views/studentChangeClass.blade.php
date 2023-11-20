<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Registration</title>
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
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
		.goback-button {
			position: absolute;
            top: 10px;
            right: 10px;
            background-color: green;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<a href="{{ route('student.subjects.show', ['s_id' => $s_id, 'c_id' => $c_id]) }}" class="goback-button" style="text-decoration: none;">Go Back</a>

<div class="container">
    <h2>Class Change</h2>
	<h3>Current Class: {{ $className->name }}</h3>
    <form action="{{ route('student.changeClass', ['s_id' => $s_id, 'c_id' => $c_id]) }}" method="post">
        @csrf
        <label for="newClass">New Class Name:</label>
        <input type="text" id="newClass" name="newClass" required>

        <button type="submit">Change Clas</button>
    </form>
</div>

</body>
</html>
