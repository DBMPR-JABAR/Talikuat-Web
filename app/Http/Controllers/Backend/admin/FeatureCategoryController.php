<?php

namespace App\Http\Controllers\Backend\admin;

use App\Models\Backend\FeatureCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FeatureCategoryController extends Controller
{
    //
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:mysql.features'
        ]);
        if ($validator->fails()) {
            storeLogActivity(declarLog(1, 'Feature Category', $validator->messages()->first()));
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        $temp = [
            'name' => $request->name,
            'slug' => Str::slug($request->name,'-')
        ];
        $feature_category = FeatureCategory::create($temp);
        storeLogActivity(declarLog(1, 'Feature Category', $request->name,1 ));
        return redirect(route('role.index'))->with(['success'=>'Berhasil Menambahkan Feature!!']);
    }
}
