<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        return view('admin.banks.index', compact('banks'));
    }

    public function create()
    {
        return view('admin.banks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Remove empty HTML tags like <p><br></p>
        $description = trim(strip_tags($request->description));
        if (empty($description)) {
            return back()->withErrors(['description' => 'The description field is required.'])->withInput();
        }

        $data = $request->only(['title', 'description', 'status']);

        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/banks'), $imageName);
            $data['image'] = $imageName;
        }

        Bank::create($data);

        return redirect()->route('admin.banks.index')->with('success', 'Bank Created Successfully');
    }

    public function edit($id)
    {
        $bank = Bank::findOrFail($id);
        return view('admin.banks.edit', compact('bank'));
    }

    public function update(Request $request, $id)
    {
        $bank = Bank::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Remove empty HTML tags like <p><br></p>
        $description = trim(strip_tags($request->description));
        if (empty($description)) {
            return back()->withErrors(['description' => 'The description field is required.'])->withInput();
        }

        $data = $request->only(['title', 'description', 'status']);

        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/banks'), $imageName);
            $data['image'] = $imageName;
        }

        $bank->update($data);

        return redirect()->route('admin.banks.index')->with('success', 'Bank Updated Successfully');
    }

    public function destroy($id)
    {
        $bank = Bank::findOrFail($id);

        if($bank->image && file_exists(public_path('images/banks/'.$bank->image))){
            unlink(public_path('images/banks/'.$bank->image));
        }

        $bank->delete();

        return redirect()->route('admin.banks.index')->with('success', 'Bank Deleted Successfully');
    }
}
