<?php

namespace App\Http\Controllers;

use App\Presenter\AdminApiPresenter;
use App\Libraries\Functions;

class AdminController extends Controller
{
    protected $presenter;
    protected $kkox_token;
    public $kkooxurl;
    public function __construct(AdminApiPresenter $presenter)
    {
        $this->presenter = $presenter;
        $this->kkox_token = Functions::get_kkobxtoken();
        $this->kkoxrul = 'https://api.kkbox.com/v1.1';
    }
}
