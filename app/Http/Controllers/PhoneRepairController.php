<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;

class PhoneRepairController extends Controller
{
	public function index()
	{
		return view("phone-repairs.index");
	}

	public function create()
	{
		return view('phone-repairs.create');
	}

	public function show($id)
	{

		if ($id % 2 == 0) {
			$status = 'Completed';
		} else {
			$status = 'Pending';
		}

		return view('phone-repairs.show', ['status' => $status]);
	}

	public function edit($id)
	{
		return view('phone-repairs.edit');
	}

}
