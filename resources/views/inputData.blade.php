<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments and File Upload</title>
</head>
<body>

    <div style="width: 50%; float: left;">
        <!-- Section for comments -->
        <h2>Comments Section</h2>
		@foreach($datas as $data)
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
		@endforeach	
		<br>
        <form method="post" action="/inputData">
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
		@endforeach	
		<br>
        <form method="post" action="#" enctype="multipart/form-data">
            @csrf
            <label for="file">Choose a file:</label>
            <input type="file" name="file" id="file">
            <br>
            <button type="submit">Upload File</button>
        </form>
    </div>

</body>
</html>
