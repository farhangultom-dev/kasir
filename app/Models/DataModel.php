<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = "bpprd";
    protected $primaryKey = "NOP";
    protected $returnType = "object";
    protected $allowedFields = [
        'NOP',
        'sppt_tahun_pajak',
        'sppt_tanggal_jatuh_tempo',
        'sppt_pbb_harus_dibayar',
        'wp_telepon',
        'wp_no_hp',
        'wp_alamat',
        'wp_rt',
        'wp_rw',
        'wp_kelurahan',
        'wp_kecamatan',
        'wp_kotakab',
        'wp_kodepos',
        'sppt_tanggal_terbit',
        'sppt_tanggal_cetak',
        'op_luas_bumi',
        'op_luas_bangunan',
        'op_kelas_bumi',
        'op_njop_bangunan',
        'op_njop',
        'op_njoptkp',
        'op_njkp',
        'payment_flag',
        'payment_paid',
        'payment_ref_number',
        'payment_bank_code',
        'payment_sw_refnum',
        'payment_gw_refnum',
        'payment_sw_id',
        'payment_merchant_code',
        'payment_settlement_date',
        'pbb_collectible',
        'pbb_denda',
        'pbb_admin_gw',
        'pbb_misc_fee',
        'pbb_total_bayar',
        'op_alamat',
        'op_rt',
        'op_rw',
        'op_kecamatan',
        'op_kotakab',
        'op_kelurahan_kode',
        'op_kecamatan_kode',
        'op_kotakab_kode',
        'op_provinsi kode',
        'tgl_stpd',
        'tgl_sp1',
        'tgl_sp2',
        'tgl_sp3',
        'status_sp',
        'status_cetak',
        'wp_pekerjaan',
        'payment_offline_user_id',
        'payment_offline_flag',
        'payment_offline_paid',
        'id_wp',
        'payment_code',
        'booking_expired'
    ];
}
