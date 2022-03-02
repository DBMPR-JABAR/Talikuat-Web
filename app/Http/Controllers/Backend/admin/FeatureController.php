<?php

namespace App\Http\Controllers\Backend\admin;

use App\Models\Backend\Feature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->authorize('createPermission', Auth::user());

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:mysql.features',
            'feature_category' => 'required'
        ]);
        if ($validator->fails()) {
            storeLogActivity(declarLog(1, 'Features', $validator->messages()->first()));
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        $temp = [
            'name' => $request->name,
            'slug' => Str::slug($request->name,'-'),
            'feature_category_id' =>$request->feature_category
        ];
        // dd($temp);->sync($tagIds);
        $feature = Feature::create($temp);
        $feature->permission()->createMany([
            ['name' => $temp['slug'].'.index','guard_name'=>'web'],
            ['name' => $temp['slug'].'.show','guard_name'=>'web'],
            ['name' => $temp['slug'].'.create','guard_name'=>'web'],
            ['name' => $temp['slug'].'.edit','guard_name'=>'web'],
            ['name' => $temp['slug'].'.delete','guard_name'=>'web'],
            ['name' => $temp['slug'].'.restore','guard_name'=>'web']
        ]);
        storeLogActivity(declarLog(1, 'Feature', $request->name,1 ));
        return redirect(route('role.index'))->with(['success'=>'Berhasil Menambahkan Feature!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
