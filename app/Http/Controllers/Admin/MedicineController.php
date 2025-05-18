<?php

namespace App\Http\Controllers\Admin;

use App\Models\Medicines;
use Illuminate\Http\Request;

class MedicineController
{
    public function index(Request $request)
    {
        $query = Medicines::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $medicines = $query->get();
        return view('pages/admin/medicines/index', compact('medicines'));
    }

    public function create()
    {
        return view('pages/admin/medicines/create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Medicines::query()->create($request->all());

        return redirect()->route('medicines.index')->with('success', 'Thêm thuốc thành công!');
    }

    public function edit($id)
    {
        $medicine = Medicines::query()->findOrFail($id);
        return view('pages/admin/medicines/edit', compact('medicine'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $medicine = Medicines::query()->findOrFail($id);
        $medicine->update($request->all());

        return redirect()->route('medicines.index')->with('success', 'Cập nhật thuốc thành công!');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $medicine = Medicines::query()->findOrFail($id);
        $medicine->delete();

        return redirect()->route('medicines.index')->with('success', 'Xóa thuốc thành công!');
    }
}
