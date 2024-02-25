<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $shippings = Shipping::all();
        return view('admin.shippings', compact('shippings'));
    }

    public function edit($id)
    {
        $shipping = Shipping::findOrFail($id);
        return view('admin.edit', compact('shipping'));
    }
    
    public function update(Request $request, $id)
    {
        $shipping = Shipping::findOrFail($id);
        $shipping->update($request->all());
        return redirect()->route('admin.shippings')->with('success', 'Shipping data updated successfully');
    }

}
