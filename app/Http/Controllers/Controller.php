<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * The supported image, offset, limit and page instance.
     */
    protected $supported_image;
    protected $offset;
    protected $limit;
    protected $page;

    /**
     * Create a new controller instance.
     *
     * @param $supported_image
     * @param $offset
     * @param $limit
     * @param $page
     * @return void
     */
    public function __construct()
    {
        $this->supported_image = 'jpeg,jpg,png,gif,svg';
        $this->offset = 0;
        $this->limit = 20;
        $this->page = 1;
    }
}
