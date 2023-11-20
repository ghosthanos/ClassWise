<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Comments and File Upload</title>
	<style>
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
		.destroy-button {
			position: absolute;
            top: 70px;
            right: 10px;
            background-color: red;
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
<form method="post" action="{{ route('teacher.classRooms.destroy', ['t_id' => $t_id, 'sub_id' => $sub_id]) }}"> 
	@csrf
    @method('DELETE')
    <button type="submit" class="destroy-button">Delete</button>
</form>


    <div style="width: 50%; float: left;">
        <!-- Section for comments -->
        <h2>Comments Section</h2>
		@foreach($datas as $data)
			@if ($data->sub_id == $sub_id)
				@if (!is_null($data->msg)) 
					@if (!is_null($data->t_id))
						@foreach($teacherDatas as $tData)
							@if ($tData->t_id == $data->t_id)
								(T) {{ $tData->name }} :
								@break
							@endif
						@endforeach
					@elseif (!is_null($data->s_id))
						@foreach($studentDatas as $sData)
							@if ($sData->s_id == $data->s_id)
								(S) {{ $sData->name }} :
								@break
							@endif
						@endforeach
						{{-- {{ $data->s_id }} :	code for student msg --}}
					@endif	
					{{ $data->msg }} 
					<br>
				@endif
			@endif
		@endforeach	
		<br>
		<form method="post" action="{{ route('teacher.room.chat.post', ['t_id' => $t_id, 'sub_id' => $sub_id]) }}">
            @csrf
            <label for="comment">Enter your comment:</label>
            <textarea name="comment" id="comment" rows="4" cols="50"></textarea>
            <br>
            <button type="submit">Submit Comment</button>
        </form>
    </div>

    <div style="width: 50%; float: left;">
        <!-- Section for file upload -->
        <h2>File Upload Section</h2>
		@foreach($datas as $data)
			@if ($data->sub_id == $sub_id)
				@if (!is_null($data->file)) 
					@if (!is_null($data->t_id))
						@foreach($teacherDatas as $tData)
							@if ($tData->t_id == $data->t_id)
								(T) {{ $tData->name }} :
								@break
							@endif
						@endforeach
					@elseif (!is_null($data->s_id))
						@foreach($studentDatas as $sData)
							@if ($sData->s_id == $data->s_id)
								(S) {{ $sData->name }} :
								@break
							@endif
						@endforeach
					@endif	
					<a href="{{ route('download', ['id' => $data->id]) }}">{{ $data->file }} </a>
					<br>
				@endif
			@endif
		@endforeach	
		<br>
        <form method="post" action="{{ route('teacher.room.chat.post', ['t_id' => $t_id, 'sub_id' => $sub_id]) }}" enctype="multipart/form-data">
            @csrf
            <label for="file">Choose a file:</label>
            <input type="file" name="file" id="file">
            <br>
            <button type="submit">Upload File</button>
        </form>
    </div>

</body>
</html>
