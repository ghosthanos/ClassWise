<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .logout{
            position: absolute;
            top: 10px;
            left: 80%;
            background-color: #f32121;
            padding: 10px 15px;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .event-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .event {
            text-align: left;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
            position: relative; 
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #2196F3;
            padding: 5px 10px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 85px; /* Adjusted right positioning */
        }

        .delete-btn {
            background-color: #f32121;
            padding: 5px 10px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .create-btn {
            position: absolute;
            top: 10px;
            right: 80%;
            background-color: #4caf50;
            padding: 10px 15px;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <button class="logout" onclick="window.location.href='/'">Logout</button>
<div class="event-container">
    <h2>View Events</h2>

    @foreach($events as $event)
        <div class="event">
            <button class="edit-btn" onclick="window.location.href='/{{ $event->user_id }}/event/{{ $event->id }}/edit'">Edit</button>
            <form method="post" action="/{{ $event->user_id }}/event/{{ $event->id }}/delete" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">Delete</button>
            </form>

            <h3>{{ $event->title }}</h3>
            <p><strong>Event Date:</strong> {{ $event->start_time }}</p>
            <p><strong>Venue:</strong> {{ $event->venue }}</p>
            <p><strong>Description:</strong> {{ $event->description }}</p>
            <p><strong>Price of ticket:</strong> {{ $event->ticket_price }}</p>
        </div>
    @endforeach
    <button class="create-btn" onclick="window.location.href='/{{ $id }}/event/create'">Create New Event</button>
</div>

</body>
</html>
