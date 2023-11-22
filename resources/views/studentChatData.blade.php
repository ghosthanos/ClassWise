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
            /* background-color: green; */
            background: linear-gradient(to left, #5ab89d,#377162);
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
		.submit-comment, .upload-file-button, .choose-file-button{
	margin-top: 5px;
	background-color: #4ac;
	border: none;
	padding: 10px;
	border-radius: 5px;
	color: white;
	font-weight: 200;
	
}

.text-area{
	height: 20px;
	border-radius: 5px;
}

.text-area ::placeholder { 
	margin-top: 5px;
}
.teacher-msg{
	width: fit-content;
	background-color: #4c826c;
	color: white;
	border-radius: 5px;
	padding-top: 5px;
	padding-bottom: 5px;
	padding: 5px;
}


.student-msg{
	margin: 0px;
	width: fit-content;
	background-color: #284a58;
	color: white;
	border-radius: 5px;
	padding-top: 5px;
	padding-bottom: 5px;
	padding: 5px;
}

.comment-section{
	margin-left: 20px;
}

.main{
	display: flex;
	flex-direction: row;
}

.file-upload a{

color: white;
}
    </style>
</head>
<body>
<a href="{{ route('student.subjects.show', ['s_id' => $s_id, 'c_id' => $c_id]) }}" class="goback-button" style="text-decoration: none;">Go Back</a>
<div class="main">
    <div class="comment-section" style="width: 50%; float: left;">
        <!-- Section for comments -->
        <h2>Comments Section</h2>
		@foreach($datas as $data)
			@if ($data->sub_id == $sub_id)
				@if (!is_null($data->msg)) 
					@if (!is_null($data->t_id))
						@foreach($teacherDatas as $tData)
							@if ($tData->t_id == $data->t_id)
							<div class="teacher-msg">
								{{ $tData->name }} :
								{{ $data->msg }}  
							</div>
								@break
							
							@endif
						@endforeach
					@elseif (!is_null($data->s_id))
						@foreach($studentDatas as $sData)
							@if ($sData->s_id == $data->s_id)
							<div class="student-msg">
								{{ $sData->name }} :
								{{ $data->msg }} 
							</div>
								@break
							
							@endif
						@endforeach
						{{-- {{ $data->s_id }} :	code for student msg --}}
					@endif	
					
					<br>
				@endif
			@endif
		@endforeach	
		<br>
	 <form method="post" action="{{ route('student.room.chat.post', ['s_id' => $s_id, 'c_id' => $c_id, 'sub_id' => $sub_id]) }}">
            @csrf
            
            <textarea name="comment" id="comment" rows="4" cols="50" placeholder="Enter your comment"></textarea>
            <br>
            <button class="submit-comment" type="submit">Submit Comment</button>
        </form>
    </div>

    <div class="file-upload" style="width: 50%; float: left;">
        <!-- Section for file upload -->
        <h2>File Upload Section</h2>
		@foreach($datas as $data)
			@if ($data->sub_id == $sub_id)
				@if (!is_null($data->file)) 
					@if (!is_null($data->t_id))
						@foreach($teacherDatas as $tData)
							@if ($tData->t_id == $data->t_id)
							<div class="teacher-msg">
								{{ $tData->name }} :
								<a href="{{ route('download', ['id' => $data->id]) }}">{{ $data->file }} </a>
							</div>
								@break
							@endif
						@endforeach
					@elseif (!is_null($data->s_id))
						@foreach($studentDatas as $sData)
							@if ($sData->s_id == $data->s_id)
							<div class="student-msg">
								(S) {{ $sData->name }} :
							</div>
								@break
							@endif
						@endforeach
					@endif	
					
					<br>
				@endif
			@endif
		@endforeach	
		<br>
    </div>
</div>
</body>
</html>
