<?php

namespace App\Policies;

use App\Models\Backend\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    //feature all user
    public function viewAllUser()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('all-user.index');
    }
    public function createAllUser()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('all-user.create');
    }
    public function editAllUser()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('all-user.edit');
    }
    public function deleteAllUser()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('all-user.delete');
    }

    //feature user admin
    public function viewUserAdmin()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-admin.index');
    }
    public function createUserAdmin()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-admin.create');
    }
    public function editUserAdmin()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-admin.edit');
    }
    public function deleteUserAdmin()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-admin.delete');
    }

    //feature user ppk
    public function viewUserPpk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-ppk.index');
    }
    public function createUserPpk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-ppk.create');
    }
    public function editUserPpk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-ppk.edit');
    }
    public function deleteUserPpk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-ppk.delete');
    }

    //feature user ft
    public function viewUserFt()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-ft.index');
    }
    public function createUserFt()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-ft.create');
    }
    public function editUserFt()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-ft.edit');
    }
    public function deleteUserFt()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-ft.delete');
    }

    //feature user gs
    public function viewUserGs()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-gs.index');
    }
    public function createUserGs()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-gs.create');
    }
    public function editUserGs()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-gs.edit');
    }
    public function deleteUserGs()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-gs.delete');
    }

    //feature user mk
    public function viewUserMk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-mk.index');
    }
    public function createUserMk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-mk.create');
    }
    public function editUserMk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-mk.edit');
    }
    public function deleteUserMk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-mk.delete');
    }

    //feature role
    public function viewRole()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('role.index');
    }
    public function createRole()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('role.create');
    }
    public function editRole()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('role.edit');
    }
    public function deleteRole()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('role.delete');
    }

    //feature role
    public function viewPermission()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('permission.index');
    }
    public function createPermission()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('permission.create');
    }
    public function editPermission()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('permission.edit');
    }
    public function deletePermission()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('permission.delete');
    }

    //feature kontraktor
    public function viewKontraktor()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('kontraktor.index');
    }
    public function createKontraktor()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('kontraktor.create');
    }
    public function editKontraktor()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('kontraktor.edit');
    }
    public function deleteKontraktor()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('kontraktor.delete');
    }

    //feature konsultan
    public function viewKonsultan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('konsultan.index');
    }
    public function createKonsultan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('konsultan.create');
    }
    public function editKonsultan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('konsultan.edit');
    }
    public function deleteKonsultan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('konsultan.delete');
    }

    //feature mk
    public function viewMk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('mk.index');
    }
    public function createMk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('mk.create');
    }
    public function editMk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('mk.edit');
    }
    public function deleteMk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('mk.delete');
    }

    //feature mk
    public function viewJenisPekerjaan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('jenis-pekerjaan.index');
    }
    public function createJenisPekerjaan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('jenis-pekerjaan.create');
    }
    public function editJenisPekerjaan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('jenis-pekerjaan.edit');
    }
    public function deleteJenisPekerjaan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('jenis-pekerjaan.delete');
    }

    //feature jenis-pekerjaan
    public function viewDataUmum()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('data-umum.index');
    }
    public function createDataUmum()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('data-umum.create');
    }
    public function editDataUmum()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('data-umum.edit');
    }
    public function deleteDataUmum()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('data-umum.delete');
    }

    //feature jadwal
    public function viewJadwal()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('jadwal.index');
    }
    public function createJadwal()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('jadwal.create');
    }
    public function editJadwal()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('jadwal.edit');
    }
    public function deleteJadwal()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('jadwal.delete');
    }

    //feature permintaan
    public function viewPermintaan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('permintaan.index');
    }
    public function createPermintaan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('permintaan.create');
    }
    public function editPermintaan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('permintaan.edit');
    }
    public function deletePermintaan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('permintaan.delete');
    }

    //feature laporan harian
    public function viewLaporanHarian()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('laporan-harian.index');
    }
    public function createLaporanHarian()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('laporan-harian.create');
    }
    public function editLaporanHarian()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('laporan-harian.edit');
    }
    public function deleteLaporanHarian()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('laporan-harian.delete');
    }

    //feature laporan harian
    public function viewPusatUnduhan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('pusat-unduhan.index');
    }
    public function createPusatUnduhan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('pusat-unduhan.create');
    }
    public function editPusatUnduhan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('pusat-unduhan.edit');
    }
    public function deletePusatUnduhan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('pusat-unduhan.delete');
    }

    //feature log
    public function viewLog()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('log.index');
    }
    public function createLog()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('log.create');
    }
    public function editLog()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('log.edit');
    }
    public function deleteLog()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('log.delete');
    }
}
