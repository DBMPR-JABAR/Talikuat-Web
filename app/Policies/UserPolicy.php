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
    public function viewVerificationUser()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-verification.index');
    }
    public function showVerificationUser()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-verification.show');
    }
    public function createVerificationUser()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-verification.create');
    }
    public function editVerificationUser()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-verification.edit');
    }
    public function deleteVerificationUser()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-verification.delete');
    }
    public function restoreVerificationUser()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-verification.restore');
    }

    //feature all user
    public function viewAllUser()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('all-user.index');
    }
    public function showAllUser()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('all-user.show');
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
    public function restoreAllUser()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('all-user.restore');
    }


    //feature user admin
    public function viewUserAdmin()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-admin.index');
    }
    public function showUserAdmin()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-admin.show');
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
    public function restoreUserAdmin()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-admin.restore');
    }

    //feature user ppk
    public function viewUserPpk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-ppk.index');
    }
    public function showUserPpk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-ppk.show');
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
    public function restoreUserPpk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-ppk.restore');
    }

    //feature user ft
    public function viewUserFt()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-ft.index');
    }
    public function showUserFt()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-ft.show');
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
    public function restoreUserFt()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-ft.restore');
    }

    //feature user gs
    public function viewUserGs()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-gs.index');
    }
    public function showUserGs()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-gs.show');
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
    public function restoreUserGs()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-gs.restore');
    }

    //feature user mk
    public function viewUserMk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-mk.index');
    }
    public function showUserMk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-mk.show');
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
    public function restoreUserMk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-mk.restore');
    }

    //feature user mk
    public function viewUserDirlap()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-dirlap.index');
    }
    public function showUserDirlap()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-dirlap.show');
    }
    public function createUserDirlap()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-dirlap.create');
    }
    public function editUserDirlap()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-dirlap.edit');
    }
    public function deleteUserDirlap()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-dirlap.delete');
    }
    public function restoreUserDirlap()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('user-dirlap.restore');
    }

    //feature role
    public function viewRole()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('role.index');
    }
    public function showRole()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('role.show');
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
    public function restoreRole()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('role.restore');
    }

    //feature role
    public function viewPermission()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('permission.index');
    }
    public function showPermission()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('permission.show');
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
    public function restorePermission()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('permission.restore');
    }

    //feature kontraktor
    public function viewKontraktor()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('kontraktor.index');
    }
    public function showKontraktor()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('kontraktor.show');
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
    public function restoreKontraktor()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('kontraktor.restore');
    }

    //feature konsultan
    public function viewKonsultan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('konsultan.index');
    }
    public function showKonsultan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('konsultan.show');
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
    public function restoreKonsultan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('konsultan.restore');
    }

    //feature mk
    public function viewMk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('mk.index');
    }
    public function showMk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('mk.show');
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
    public function restoreMk()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('mk.restore');
    }

    //feature mk
    public function viewJenisPekerjaan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('jenis-pekerjaan.index');
    }
    public function showJenisPekerjaan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('jenis-pekerjaan.show');
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
    public function restoreJenisPekerjaan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('jenis-pekerjaan.restore');
    }

    //feature jenis-pekerjaan
    public function viewDataUmum()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('data-umum.index');
    }
    public function showDataUmum()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('data-umum.show');
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
    public function restoreDataUmum()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('data-umum.restore');
    }

    //feature jadwal
    public function viewJadwal()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('jadwal.index');
    }
    public function showJadwal()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('jadwal.show');
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
    public function restoreJadwal()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('jadwal.restore');
    }

    //feature permintaan
    public function viewPermintaan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('permintaan.index');
    }
    public function showPermintaan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('permintaan.show');
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
    public function restorePermintaan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('permintaan.restore');
    }

    //feature laporan harian
    public function viewLaporanHarian()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('laporan-harian.index');
    }
    public function showLaporanHarian()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('laporan-harian.show');
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
    public function restoreLaporanHarian()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('laporan-harian.restore');
    }

    //feature laporan mingguan
    public function viewLaporanMingguan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('laporan-mingguan.index');
    }
    public function showLaporanMingguan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('laporan-mingguan.show');
    }
    public function createLaporanMingguan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('laporan-mingguan.create');
    }
    public function editLaporanMingguan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('laporan-mingguan.edit');
    }
    public function deleteLaporanMingguan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('laporan-mingguan.delete');
    }
    public function restoreLaporanMingguan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('laporan-mingguan.restore');
    }

    //feature Pusat Unduhan
    public function viewPusatUnduhan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('pusat-unduhan.index');
    }
    public function showPusatUnduhan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('pusat-unduhan.show');
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
    public function restorePusatUnduhan()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('pusat-unduhan.restore');
    }

    //feature log
    public function viewLog()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('log.index');
    }
    public function showLog()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('log.show');
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
    public function restoreLog()
    {
        return Auth::user()->user_detail->role->permissions()->pluck('name')->contains('log.restore');
    }
}
