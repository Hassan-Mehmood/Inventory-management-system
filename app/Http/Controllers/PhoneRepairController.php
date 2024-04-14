<?php

namespace App\Http\Controllers;

use App\Http\Requests\phoneRepairs\StorePhoneRepairRequest;
use App\Models\PhoneRepair;
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

	public function store(StorePhoneRepairRequest $request)
	{
		// dd($request);
		$request->validated();

		PhoneRepair::create([
			'phone_name' => $request->phone_name,
			'repair_parts' => $request->repair_parts,
			'description' => $request->description,
			'status' => $request->status ?? 'Pending'
		]);

		return redirect()->route('phone-repairs.index')->with('success', 'Phone Repair has been created!');
	}

	public function edit($id)
	{
		return view('phone-repairs.edit');
	}

}
