<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'NOP' => '001',
                'sppt_tahun_pajak' => '2020',
                'sppt_tanggal_jatuh_tempo' => '2021',
                'sppt_pbb_harus_dibayar' => '2.000.00',
                'wp_telepon' => '021523212322',
                'wp_no_hp' => '0852678302',
                'wp_alamat' => 'jalan bangun sari',
                'wp_rt' => '001',
                'wp_rw' => '003',
                'wp_kelurahan' => 'kedaton',
                'wp_kecamatan' => 'teluk betung utara',
                'wp_kotakab' => 'lampung tengah',
                'wp_kodepos' => '3567890',
                'sppt_tanggal_terbit' => '2019',
                'sppt_tanggal_cetak' => '2020',
                'op_luas_bumi' => '23',
                'op_luas_bangunan' => '30',
                'op_kelas_bumi' => '50',
                'op_kelas_bangunan' => '90',
                'op_njop_bumi' => '23',
                'op_njop_bangunan' => '23',
                'op_njop' => '23',
                'op_njoptkp' => '23',
                'op_njkp' => '23',
                'payment_flag' => '1',
                'payment_paid' => 'sudah',
                'payment_ref_number' => '001992833',
                'payment_bank_code' => '23',
                'payment_sw_refnum' => '0021',
                'payment_gw_refnum' => '9090',
                'payment_sw_id' => '09021',
                'payment_merchant_code' => '002922',
                'payment_settlement_date' => '15',
                'pbb_collectible' => '12',
                'pbb_denda' => '98',
                'pbb_admin_gw' => '123',
                'pbb_misc_fee' => '123',
                'pbb_total_bayar' => '2000',
                'op_alamat' => 'jl teluk bayut',
                'op_rt' => '002',
                'op_rw' => '003',
                'op_kecamatan' => '009',
                'op_kotakab' => '2901',
                'op_kelurahan_kode' => '09821',
                'op_kecamatan_kode' => '283928',
                'op_kotakab_kode' => '283289',
                'op_provinsi kode' => '2109239',
                'tgl_stpd' => '19-20-2021',
                'tgl_sp1' => '20-20-2021',
                'tgl_sp2' => '21-20-2021',
                'tgl_sp3' => '22-20-2021',
                'status_sp' => 'selesai',
                'status_cetak' => 'selesai',
                'wp_pekerjaan' => 'petani',
                'payment_offline_user_id' => '00123',
                'payment_offline_flag' => 'berhasil',
                'payment_offline_paid' => 'lunas',
                'id_wp' => '92920',
                'payment_code' => '112',
                'booking_expired' => '5611'
            ],
            [
                'NOP' => '002',
                'sppt_tahun_pajak' => '2020',
                'sppt_tanggal_jatuh_tempo' => '2021',
                'sppt_pbb_harus_dibayar' => '2.000.00',
                'wp_telepon' => '021523212322',
                'wp_no_hp' => '0852678302',
                'wp_alamat' => 'jalan bangun sari',
                'wp_rt' => '001',
                'wp_rw' => '003',
                'wp_kelurahan' => 'kedaton',
                'wp_kecamatan' => 'teluk betung utara',
                'wp_kotakab' => 'lampung tengah',
                'wp_kodepos' => '3567890',
                'sppt_tanggal_terbit' => '2019',
                'sppt_tanggal_cetak' => '2020',
                'op_luas_bumi' => '23',
                'op_luas_bangunan' => '30',
                'op_kelas_bumi' => '50',
                'op_kelas_bangunan' => '90',
                'op_njop_bumi' => '23',
                'op_njop_bangunan' => '23',
                'op_njop' => '23',
                'op_njoptkp' => '23',
                'op_njkp' => '23',
                'payment_flag' => '1',
                'payment_paid' => 'sudah',
                'payment_ref_number' => '001992833',
                'payment_bank_code' => '23',
                'payment_sw_refnum' => '0021',
                'payment_gw_refnum' => '9090',
                'payment_sw_id' => '09021',
                'payment_merchant_code' => '002922',
                'payment_settlement_date' => '15',
                'pbb_collectible' => '12',
                'pbb_denda' => '98',
                'pbb_admin_gw' => '123',
                'pbb_misc_fee' => '123',
                'pbb_total_bayar' => '2000',
                'op_alamat' => 'jl teluk bayut',
                'op_rt' => '002',
                'op_rw' => '003',
                'op_kecamatan' => '009',
                'op_kotakab' => '2901',
                'op_kelurahan_kode' => '09821',
                'op_kecamatan_kode' => '283928',
                'op_kotakab_kode' => '283289',
                'op_provinsi kode' => '2109239',
                'tgl_stpd' => '19-20-2021',
                'tgl_sp1' => '20-20-2021',
                'tgl_sp2' => '21-20-2021',
                'tgl_sp3' => '22-20-2021',
                'status_sp' => 'selesai',
                'status_cetak' => 'selesai',
                'wp_pekerjaan' => 'petani',
                'payment_offline_user_id' => '00123',
                'payment_offline_flag' => 'berhasil',
                'payment_offline_paid' => 'lunas',
                'id_wp' => '92920',
                'payment_code' => '112',
                'booking_expired' => '5611'
            ]
        ];
        $this->db->table('bpprd')->insertBatch($data);
    }
}
