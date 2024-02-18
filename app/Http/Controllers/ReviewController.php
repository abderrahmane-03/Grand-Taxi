<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
class ReviewController extends Controller
{
    //
    public function store(Request $request){
        $data = $request->validate([
            'reservation_id' => 'required',
            'comment' => 'required',
            'rating' => 'required',

        ]);

        Review:: create($data);
        return redirect('/passenger-dashboard');
    }
}
