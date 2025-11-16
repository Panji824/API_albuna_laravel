<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Http\Requests\PromotionRequest; 

class AdminPromotionController extends Controller
{
    // GET /admin/promotions
    public function index()
    {
        $promotions = Promotion::orderBy('start_date', 'desc')->paginate(15);
        return view('admin.promotions.index', compact('promotions'));
    }
    
    // GET /admin/promotions/create
    public function create()
    {
        return view('admin.promotions.form');
    }

    // POST /admin/promotions
    public function store(PromotionRequest $request)
    {
        Promotion::create($request->validated());
        return redirect()->route('admin.promotions.index')->with('success', 'Promosi baru berhasil dibuat!');
    }

    // GET /admin/promotions/{promotion}/edit
    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.form', compact('promotion'));
    }

    // PUT/PATCH /admin/promotions/{promotion}
    public function update(PromotionRequest $request, Promotion $promotion)
    {
        $promotion->update($request->validated());
        return redirect()->route('admin.promotions.index')->with('success', 'Promosi berhasil diperbarui!');
    }
    
    // DELETE /admin/promotions/{promotion}
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('admin.promotions.index')->with('success', 'Promosi berhasil dihapus!');
    }
}