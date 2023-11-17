<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #007BFF;
        }

        p {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="#" method="post">
        @csrf
        <h2>Book Event</h2>
        
        <p><strong>Event Details:</strong></p>
        <p><strong>Title:</strong> {{ $event1->title }}</p>
        <p><strong>Venue:</strong> {{ $event1->venue }}</p>
        <p><strong>Date:</strong> {{ $event1->start_time }}</p>
        <p><strong>Price per Ticket:</strong> ${{ $event1->ticket_price }}</p>
        
        <label for="amount">Number of Tickets:</label>
        <input type="number" name="amount" value="1" min="1">
        
        <button type="submit">Book Tickets</button>
    </form>

</body>
</html>
