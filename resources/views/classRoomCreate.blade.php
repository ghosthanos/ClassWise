<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
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

<a href="{{ route('teacher.classRooms', ['t_id' => $t_id]) }}" class="goback-button" style="text-decoration: none;">Go Back</a>
<div class="container">
    <h2>Create Classroom</h2>
    <form action="#" method="post">
        @csrf
        <label for="className">class Name:</label>
        <input type="text" id="className" name="className" required>

        <label for="subjectName">Subject Name:</label>
        <input type="text" id="subjectName" name="subjectName" required>
<!-- 
        <label for="eventName">Event Name:</label>
        <input type="text" id="eventName" name="eventName" required>

        <label for="eventDate">Event Date:</label>
        <input type="date" id="eventDate" name="eventDate" required>

        <label for="Venue">Event Venue:</label>
        <input type="text" id="venue" name="venue" required>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required>

        <label for="price">Price of ticket:</label>
        <input type="integer" id="price" name="price" required> -->

        <!-- <button type="submit">Create Event</button> -->
		<a href={{ route('teacher.store', ['t_id' => $t_id ]) }}>
		    <button style="margin-top: 25px; " type="submit">Create new Classroom</button>
	  	</a>
    </form>
</div>

</body>
</html>
