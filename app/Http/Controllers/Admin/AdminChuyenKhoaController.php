<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChuyenKhoa;
use Illuminate\Http\Request;

class AdminChuyenKhoaController
{
    public function index()
    {
        $chuyenKhoa = ChuyenKhoa::all();
        return view('pages.admin.chuyen_khoa.index', compact('chuyenKhoa'));
    }

    public function create()
    {
        return view('pages.admin.chuyen_khoa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_chuyen_khoa' => 'required|string|max:255',
            'gioi_thieu_chung' => 'nullable',
        ]);

        ChuyenKhoa::query()->create($request->only('ten_chuyen_khoa', 'gioi_thieu_chung'));

        return redirect()->route('admin.chuyen-khoa.index')->with('success', 'Tạo chuyên khoa thành công!');
    }

    public function edit($id)
    {
        $chuyenKhoa = ChuyenKhoa::query()->findOrFail($id);
        return view('pages.admin.chuyen_khoa.edit', compact('chuyenKhoa'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'ten_chuyen_khoa' => 'required|string|max:255',
            'gioi_thieu_chung' => 'nullable',
        ]);

        $chuyenKhoa = ChuyenKhoa::query()->findOrFail($id);
        $chuyenKhoa->update($request->only(['ten_chuyen_khoa', 'gioi_thieu_chung']));

        return redirect()->route('admin.chuyen-khoa.index')->with('success', 'Cập nhật chuyên khoa thành công!');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $chuyenKhoa = ChuyenKhoa::query()->findOrFail($id);
        $chuyenKhoa->delete();

        return redirect()->route('admin.chuyen-khoa.index')->with('success', 'Xóa chuyên khoa thành công!');
    }
}
