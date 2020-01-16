<?php

namespace App\Presenter;

use App\Libraries\Functions;

class AdminApiPresenter
{
    public function json($data, $msg = '', $msg_code = '2')
    {

        $result = [
            'msg_code' => $msg_code,
            'msg' => $msg,
            'data' => $data,
        ];

        return response()->json($result, 200);
    }
}