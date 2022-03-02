<?php

namespace App\Http\Controllers\Backend\admin;

use App\Models\Backend\UserRule as Role;
use App\Models\Backend\Feature;
use App\Models\Backend\FeatureCategory;
use App\Models\Backend\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $roles = Role::get();
        $features = Feature::get();
        $permissions = Permission::get();
        $feature_categories = FeatureCategory::get();
        // foreach($features as $feature){
        //     $feature->permission()->createMany([
        //         ['name' => $feature->slug.'.index','guard_name'=>'web'],
        //         ['name' => $feature->slug.'.show','guard_name'=>'web'],
        //         ['name' => $feature->slug.'.create','guard_name'=>'web'],
        //         ['name' => $feature->slug.'.edit','guard_name'=>'web'],
        //         ['name' => $feature->slug.'.delete','guard_name'=>'web'],
        //         ['name' => $feature->slug.'.restore','guard_name'=>'web']
        //     ]);

        // }
        // dd($feature);
        // print_r(Auth::user()->user_detail->role->permissions()->pluck('name'));
        // dd(Auth::user()->user_detail->role->permissions()->pluck('name')->contains('all-user.index'));
        return view('admin.role.index', compact('roles','features','feature_categories','permissions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('createRole', Auth::user());

        $feature_category = FeatureCategory::get();
        return view('admin.role.form',compact('feature_category'));

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
        $this->authorize('createRole', Auth::user());

        $request->description= Str::upper($request->description);
        $validator = Validator::make($request->all(), [
            'description' => 'required|unique:mysql.rule_user',
        ]);
        if ($validator->fails()) {
            storeLogActivity(declarLog(1, 'Role User', $validator->messages()->first()));
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        $temp = [
            'rule' => Str::replace(' ', '-', $request->description),
            'description' => $request->description
        ];
        $role = Role::create($temp);
        $role->permissions()->sync($request->permission);
        storeLogActivity(declarLog(1, 'Role User', $request->description,1 ));
        return redirect(route('role.index'))->with(['success'=>'Berhasil Menambahkan Role User!!']);
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
        $this->authorize('editRole', Auth::user());

        $feature_category = FeatureCategory::get();
        $data = Role::find($id);
        // dd($data);
        return view('admin.role.form',compact('data','feature_category'));
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
        $this->authorize('editRole', Auth::user());

        $request->description= Str::upper($request->description);
        $validator = Validator::make($request->all(), [
            'description' => 'required|unique:mysql.rule_user,description,'.$id,
        ]);
        if ($validator->fails()) {
            storeLogActivity(declarLog(2, 'Role User', $validator->messages()->first()));
            return back()->with(['error'=>$validator->messages()->first()]);
        }
        $temp = [
            'rule' => Str::replace(' ', '-', $request->description),
            'description' => $request->description
        ];
        $role = Role::findOrFail($id);
        $role->update($temp);
        $role->permissions()->sync($request->permission);
        storeLogActivity(declarLog(2, 'Role User', $request->description,1 ));
        return redirect(route('role.index'))->with(['success'=>'Berhasil Merubah Role User!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('deleteRole', Auth::user());

        $role = Role::findOrFail($id);
        storeLogActivity(declarLog(3, 'Role User', $role->description,1 ));
        $message = 'Data Berhasil di Hapus! ';
        $role->permissions()->detach();
        $role->delete();
        if($role){
            return back()->with(['success'=>$message]);
        }
    }
}
