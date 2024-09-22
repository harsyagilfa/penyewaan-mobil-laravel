<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\MerkController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\MobilController;
use App\Http\Controllers\customer\HomeController;
use App\Http\Controllers\customer\SewaController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\customer\LayananController;
use App\Http\Controllers\admin\DataCustomerController;
use App\Http\Controllers\customer\PembayaranController;
use App\Http\Controllers\admin\TransaksiAdminController;
use App\Http\Controllers\admin\LaporanTransaksiController;
use App\Http\Controllers\customer\LoginCustomerController;
use App\Http\Controllers\customer\ProfilCustomerController;
use App\Http\Controllers\customer\RegisterCustomerController;
use App\Http\Controllers\customer\TransaksiCustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin.login');
});



//login admin group middleware berfungsi jika sudah login,maka sudah tidak bisa mengakses halaman login
Route::middleware('admin')->group(function(){
    Route::get('admin/login',[LoginController::class,'index'])->name('admin.login');
    Route::post('admin/login',[LoginController::class,'auth'])->name('admin.login.submit');
});

// admin dan customer tidak akan bisa mengakses menu sebelum login
Route::middleware('notauth')->group(function(){
    //menu admin
    Route::get('admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('admin/merk',[MerkController::class,'index'])->name('admin.merk');
    Route::get('admin/mobil',[MobilController::class,'index'])->name('admin.mobil');
    Route::get('admin/detail_mobil/{id}',[MobilController::class,'detail'])->name('admin.detail_mobil');
    Route::get('admin/data_customer',[DataCustomerController::class,'index'])->name('admin.data_customer');
    Route::get('admin/detail_customer/{id}',[DataCustomerController::class,'detail'])->name('admin.detail_customer');
    Route::get('admin/transaksi',[TransaksiAdminController::class,'index'])->name('admin.transaksi');
    Route::get('admin/transaksi/detail/{id}',[TransaksiAdminController::class,'detail'])->name('admin.transaksi_detail');
    Route::get('admin/transaksi/konfirmasi_pembayaran/{id}',[TransaksiAdminController::class,'konfirmasi_pembayaran'])->name('admin.konfirmasi_pembayaran');
    Route::get('admin/transaksi/download_bukti_pembayaran/{id}',[TransaksiAdminController::class,'download_bukti_pembayaran'])->name('admin.download_bukti_pembayaran');
    Route::get('admin/transaksi/pengembalian_mobil/{id}',[TransaksiAdminController::class,'pengembalian_mobil'])->name('admin.transaksi.pengembalian_mobil');
    Route::get('admin/laporan_transaksi',[LaporanTransaksiController::class,'index'])->name('admin.laporan_transaksi');
    Route::get('/admin/laporan_transaksi/print_laporan', [LaporanTransaksiController::class, 'print_laporan_transaksi'])->name('admin.laporan_transaksi.print_laporan');
    Route::get('admin/edit_profil',[AdminController::class,'edit_profil'])->name('admin.edit_profil');
    Route::post('admin/edit_profil_aksi',[AdminController::class,'edit_profil_aksi'])->name('admin.edit_profil_aksi');

    //crud admin/merk mobil
    Route::get('admin/tambah_merk',[MerkController::class,'tambah_data'])->name('admin.tambah_merk');
    Route::post('admin/tambah_merk',[MerkController::class,'tambah_data_aksi'])->name('admin.tambah_merk_aksi');
    Route::get('admin/update_merk/{id}',[MerkController::class,'update_data'])->name('admin.update_merk');
    Route::put('admin/update_merk/{id}',[MerkController::class,'update_data_aksi'])->name('admin.update_merk_aksi');
    Route::get('admin/delete_merk/{id}',[MerkController::class,'delete_data'])->name('admin.delete_merk');
    //crud admin/data mobil
    Route::get('admin/tambah_mobil',[MobilController::class,'tambah_data'])->name('admin.tambah_mobil');
    Route::post('admin/tambah_mobil',[MobilController::class,'tambah_data_aksi'])->name('admin.tambah_mobil_aksi');
    Route::get('admin/update_mobil/{id}',[MobilController::class,'update_data'])->name('admin.update_mobil');
    Route::put('admin/update_mobil/{id}',[MobilController::class,'update_data_aksi'])->name('admin.update_mobil_aksi');
    Route::get('admin/delete_mobil/{id}',[MobilController::class,'delete_data'])->name('admin.delete_mobil');
    // crud admin/transaksi
    Route::put('admin/transaksi/konfirmasi_pembayaran/{id}', [TransaksiAdminController::class, 'konfirmasi_pembayaran_aksi'])->name('admin.konfirmasi_pembayaran_aksi');
    Route::put('admin/transaksi/pengembalian_mobil/{id}', [TransaksiAdminController::class, 'pengembalian_mobil_aksi'])->name('admin.transaksi.pengembalian_mobil_aksi');
    //menu customer
    Route::get('customer/home',[HomeController::class,'index'])->name('customer.home');
    Route::get('customer/layanan',[LayananController::class,'index'])->name('customer.layanan');
    Route::get('customer/sewa_mobil/{mobil}',[SewaController::class,'index'])->name('customer.sewa_mobil');
    Route::get('customer/detail_mobil/{id}',[LayananController::class,'detail'])->name('customer.detail_mobil');
    Route::get('customer/transaksi',[TransaksiCustomerController::class,'index'])->name('customer.transaksi');
    Route::get('customer/transaksi/hapus_transaksi/{id}',[TransaksiCustomerController::class,'hapus_transaksi'])->name('customer.hapus_transaksi');
    Route::get('customer/pembayaran/{id}',[PembayaranController::class,'index'])->name('customer.pembayaran');
    Route::get('customer/invoice/{id}',[PembayaranController::class,'invoice'])->name('customer.invoice');
    Route::get('customer/profil',[ProfilCustomerController::class,'index'])->name('customer.profil');
    Route::get('customer/edit_profil',[ProfilCustomerController::class,'update_data'])->name('customer.edit_profil');
    //crud customer/sewa_mobil
    Route::post('customer/sewa_mobil',[SewaController::class,'sewa_mobil_aksi'])->name('customer.sewa_mobil_aksi');
    //crud customer/upload bukti pembayaran
    Route::post('customer/upload_pembayaran',[PembayaranController::class,'upload_bukti_pembayaran'])->name('customer.upload_pembayaran');
    //crud customer/edit_profil
    Route::post('customer/edit_profil_aksi',[ProfilCustomerController::class,'update_data_aksi'])->name('customer.edit_profil_aksi');
});

//login dan register customer middleware berfungsi jika sudah login,maka sudah tidak bisa mengakses halaman login
Route::middleware('customer')->group(function(){
    Route::get('customer/login',[LoginCustomerController::class,'index'])->name('customer.login');
    Route::post('customer/login',[LoginCustomerController::class,'auth'])->name('customer.login.submit');
    Route::get('customer/register',[RegisterCustomerController::class,'index'])->name('customer.register');
    Route::post('customer/register',[RegisterCustomerController::class,'register'])->name('customer.register.proses');
});

Route::get('admin/logout',[LoginController::class,'logout'])->name('admin.logout');
Route::get('customer/logout',[LoginCustomerController::class,'logout'])->name('customer.logout');



