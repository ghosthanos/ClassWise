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
            width: 70%;
			height: 100%;
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
            /* background-color: #4caf50; */
            background: linear-gradient(to left, #5ab89d,#377162);
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

        .room {
            border: 1px solid #ccc;
			border-radius: 10px;
			background-color: #164863;
            padding: 15px;
            margin: 10px;
            float: left;
            width: 200px;
            height: 150px;
        }

		h3{
color: white;
font-weight: bold;
font-size: 25px;
			text-align: center;
			margin-top: 40px;
		}
		p {
			color: white;
		}

    </style>
</head>
<body>
    <button class="logout" style="background: #CE5A67;" onclick="window.location.href='/'">Logout</button>
<div class="event-container">
    <h2 style=" text-align: center;">Classrooms</h2>

    @foreach($classRooms as $room)

	<a href={{ route('teacher.room.chat', ['t_id' => $t_id, 'sub_id' => $room->sub_id]) }}>
        <div class="room">
            <!-- <button class="edit-btn">Edit</button> -->
            <!-- <form method="post" style="display: inline;"> -->
            <!-- </form> -->

            <h3>{{ $room->name }}</h3>
			@foreach($classinfos as $cInfo)
				@if ($room->c_id == $cInfo->c_id)
		            <p><strong>Class: </strong> {{ $cInfo->name}}</p>
					@break
				@endif
			@endforeach
        </div>
    @endforeach
  	</a>
	<a href={{ route('teacher.create', ['t_id' => $t_id]) }}>
	    <button class="create-btn" type="button">Create new Classroom</button>
  	</a>
    <!-- <button class="create-btn" onclick="window.location.href='/teachers/{{ $t_id }}/room/create'">Create new Classroom</button> -->
</div>

</body>
</html>
