<?php

namespace App\Http\Controllers\Admin;

use App\Models\TestType;
use Illuminate\Http\Request;

class TestTypeController
{
    public function index()
    {
        $data = TestType::all();

        return view('pages/admin/test_type/index', compact('data'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0'
        ]);

        TestType::query()->create($request->only('name', 'price'));

        return redirect()->route('test-type.index')
                         ->with('success', 'Đã tạo loại xét nghiệm thành công.');
    }

    public function edit($id)
    {
        $data = TestType::query()->findOrFail($id);

        return view('pages/admin/test_type/update', compact('data'));
    }

    public function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0'
        ]);

        $data = TestType::query()->findOrFail($id);

        $data->update($request->only('name', 'price'));

        return redirect()->route('test-type.index')
                         ->with('success', 'Đã cập nhật loại xét nghiệm.');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $data = TestType::query()->findOrFail($id);

        $data->delete();

        return redirect()->route('test-type.index')
                         ->with('success', 'Đã xoá loại xét nghiệm.');
    }
}
