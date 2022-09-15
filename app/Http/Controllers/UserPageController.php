<?php

namespace App\Http\Controllers;

class UserPageController extends Controller
{
    public function __invoke() {

        return view('user.index');
    }
}
