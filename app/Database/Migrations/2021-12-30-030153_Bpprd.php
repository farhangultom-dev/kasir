<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bpprd extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'NOP' => [
                'type' => 'VARCHAR',
                'constraint' => '18',
            ],
            'sppt_tahun_pajak' => [
                'type' => 'VARCHAR',
                'constraint' => '4'
            ],
            'sppt_tanggal_jatuh_tempo' => [
                'type' => 'VARCHAR',
                'constraint' => '19',
            ],
            'sppt_tanggal_jatuh_tempo' => [
                'type' => 'VARCHAR',
                'constraint' => '19',
            ],
            'sppt_pbb_harus_dibayar' => [
                'type' => 'FLOAT',
                'unsigned' => true
            ],
            'wp_nama' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'wp_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => '15'
            ],
            'wp_no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'wp_alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '150'
            ],
            'wp_rt' => [
                'type' => 'VARCHAR',
                'constraint' => '4'
            ],
            'wp_rw' => [
                'type' => 'VARCHAR',
                'constraint' => '4'
            ],
            'wp_kelurahan' => [
                'type' => 'VARCHAR',
                'constraint' => '25'
            ],
            'wp_kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => '25'
            ],
            'wp_kota_kab' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'wp_kode_pos' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'sppt_tanggal_terbit' => [
                'type' => 'VARCHAR',
                'constraint' => '19'
            ],
            'sppt_tanggal_cetak' => [
                'type' => 'VARCHAR',
                'constraint' => '19'
            ],
            'op_luas_bumi' => [
                'type' => 'FLOAT',
                'unsigned' => true
            ],
            'op_luas_bangunan' => [
                'type' => 'Float',
                'unsigned' => true
            ],
            'op_kelas_bumi' => [
                'type' => 'VARCHAR',
                'constraint' => '3'
            ],
            'op_kelas_bangunan' => [
                'type' => 'VARCHAR',
                'constraint' => '3'
            ],
            'op_njop_bumi' => [
                'type' => 'FLOAT',
                'unsigned' => true
            ],
            'op_njop_bangunan' => [
                'type' => 'FLOAT',
                'unsigned' => true
            ],
            'op_njop' => [
                'type' => 'FLOAT',
                'unsigned' => true
            ],
            'op_njoptkp' => [
                'type' => 'FLOAT',
                'unsigned' => true
            ],
            'op_njkp' => [
                'type' => 'FLOAT',
                'unsigned' => true
            ],
            'payment_flag' => [
                'type' => 'VARCHAR',
                'constraint' => '1'
            ],
            'payment_paid' => [
                'type' => 'VARCHAR',
                'constraint' => '19'
            ],
            'payment_ref_number' => [
                'type' => 'VARCHAR',
                'constraint' => '32'
            ],
            'payment_bank_code' => [
                'type' => 'VARCHAR',
                'constraint' => '7'
            ],
            'payment_sw_refnum' => [
                'type' => 'VARCHAR',
                'constraint' => '32'
            ],
            'payment_gw_refnum' => [
                'type' => 'VARCHAR',
                'constraint' => '32'
            ],
            'payment_sw_id' => [
                'type' => 'VARCHAR',
                'constraint' => '7'
            ],
            'payment_merchant_code' => [
                'type' => 'VARCHAR',
                'constraint' => '4'
            ],
            'payment_settlement_date' => [
                'type' => 'VARCHAR',
                'constraint' => '9'
            ],
            'pbb_collectible' => [
                'type' => 'FLOAT',
                'unsigned' => true
            ],
            'pbb_denda' => [
                'type' => 'FLOAT',
                'unsigned' => true
            ],
            'pbb_admin_gw' => [
                'type' => 'FLOAT',
                'unsigned' => true
            ],
            'pbb_misc_fee' => [
                'type' => 'FLOAT',
                'unsigned' => true
            ],
            'pbb_total_bayar' => [
                'type' => 'FLOAT',
                'unsigned' => true
            ],
            'op_alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '150'
            ],
            'op_rt' => [
                'type' => 'VARCHAR',
                'constraint' => '4'
            ],
            'op_rw' => [
                'type' => 'VARCHAR',
                'constraint' => '4'
            ],
            'op_kelurahan' => [
                'type' => 'VARCHAR',
                'constraint' => '25'
            ],
            'op_kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => '25'
            ],
            'op_kotakab' => [
                'type' => 'VARCHAR',
                'constraint' => '25'
            ],
            'op_kelurahan_kode' => [
                'type' => 'VARCHAR',
                'constraint' => '25'
            ],
            'op_kecamatan_kode' => [
                'type' => 'VARCHAR',
                'constraint' => '25'
            ],
            'op_kotakab_kode' => [
                'type' => 'VARCHAR',
                'constraint' => '4'
            ],
            'op_provinsi_kode' => [
                'type' => 'VARCHAR',
                'constraint' => '2'
            ],
            'tgl_stpd' => [
                'type' => 'VARCHAR',
                'constraint' => '10'
            ],
            'tgl_sp1' => [
                'type' => 'VARCHAR',
                'constraint' => '10'
            ],
            'tgl_sp1' => [
                'type' => 'VARCHAR',
                'constraint' => '10'
            ],
            'tgl_sp2' => [
                'type' => 'VARCHAR',
                'constraint' => '10'
            ],
            'tgl_sp3' => [
                'type' => 'VARCHAR',
                'constraint' => '10'
            ],
            'status_sp' => [
                'type' => 'VARCHAR',
                'constraint' => '10'
            ],
            'status_cetak' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'wp_pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '25'
            ],
            'payment_offline_user_id' => [
                'type' => 'VARCHAR',
                'constraint' => '32'
            ],
            'payment_offline_flag' => [
                'type' => 'VARCHAR',
                'constraint' => '1'
            ],
            'payment_offline_paid' => [
                'type' => 'VARCHAR',
                'constraint' => '19'
            ],
            'id_wp' => [
                'type' => 'VARCHAR',
                'constraint' => '32'
            ],
            'payment_code' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'booking_expired' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
        ]);

        $this->forge->addPrimaryKey('NOP');
        $this->forge->createTable('bpprd');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
