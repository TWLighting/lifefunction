<?php

namespace App\Presenter;


class ApiPresenter
{
    public function json($data, $msg = '', $msg_code = '2')
    {
        $result = [
            'msg_code' => $msg_code,
            'msg' => $msg,
            'data' => $data
        ];

        return response()->json(['data' => $result], 200);
    }

    public function normalJson($data, $msg = '', $msg_code = '2')
    {
        $result = [
            'msg_code' => $msg_code,
            'msg' => $msg,
            'data' => $data
        ];

        return response()->json($result, 200);
    }
}
