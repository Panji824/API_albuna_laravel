<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Carbon\Carbon; 

class PromotionController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        
        $promotions = Promotion::where('is_active', true)
            ->whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today) 
            ->orderBy('start_date', 'desc')
            ->get();
            
        return response()->json($promotions);
    }


    public function show(Promotion $promotion)
    {
       
        $today = Carbon::today();
        
        if ($promotion->is_active && 
            $promotion->start_date <= $today && 
            $promotion->end_date >= $today) {
            
            return response()->json($promotion);
        }
        
        return response()->json(['message' => 'Promotion not found or inactive'], 404);
    }
    
    
}