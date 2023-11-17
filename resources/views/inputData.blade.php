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
			<a href="{{ route('download', ['id' => $data->id]) }}">{{ $data->file }} </a>
			@if (!is_null($data->file)) 
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
