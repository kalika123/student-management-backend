<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\Eloquent\Collection;
use App\Helpers\Utils;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function response($data = [],$message = 'FAILED', $status = 200){

        if (isset($data)) {
            if  (!($data instanceof Collection) && (!is_array($data)  || Utils::isAssoc($data))) {
                $data = [$data];
            }
        }

        return response()->json([
            'status' => $status,
            'data' => $data,
            'error_code' => !$status ? 500 : null,
            'error_message' => !$status ? [ $message ] : null
        ]);

    }
}
