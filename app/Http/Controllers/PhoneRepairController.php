<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhoneRepairController extends Controller
{
	public function index()
	{
		return view("phone-repair.index");
	}

	public function create()
	{
		return view('phone-repair.create');
	}
}
