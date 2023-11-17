<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class downloadController extends Controller
{
	public function download($id) {
		$data = DB::table('data')->find($id);
	
		if ($data) {
			$response = Response::make($data->file_content);
			$response->header('Content-Type', 'application/octet-stream');
			$response->header('Content-Disposition', 'attachment; filename=' . $data->file);
	
			return $response;
		}
	
		// Handle not found case
		abort(404);
	}	
    // $data = Data::find($id);

    // if ($data) {
    //     $response = Response::make($data->file_content);
    //     $response->header('Content-Type', 'application/octet-stream');
    //     $response->header('Content-Disposition', 'attachment; filename=' . $data->file);

    //     return $response;
    // }

    // // Handle not found case
    // abort(404);
}
