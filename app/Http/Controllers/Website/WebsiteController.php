<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        return view('website.pages.home.index');
    }

    public function shopSection(){
        return view('website.pages.shop.shop-index');
    }

    public function aboutUs(){
        return view('website.pages.about.about-index');
    }

    public function contactUs(){
        return view('website.pages.contact.contact-index');
    }
}
