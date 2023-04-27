<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3><?= $title; ?></h3>
            </div>
            <div class="card-body">
                <form method="get" action="">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="submit" target="_blank" formaction="<?= base_url('report/exportexcel'); ?>" class="btn btn-success">EXCEL</button>
                            </div>
                        </div>

                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nop</th>
                                <th>Sppt Tahun Pajak</th>
                                <th>SPPR Tanggal Jatuh Tempo</th>
                                <th>SPPT PBB Harus Dibayar</th>
                                <th>WP Nama</th>
                                <th>WP Telepon</th>
                                <th>WP No Hp</th>
                                <th>WP Alamat</th>
                                <th>WP RW</th>
                                <th>WP Kelurahan</th>
                                <th>WP Kecamatan</th>
                                <th>WP Kotakab</th>
                                <th>WP Kodepos</th>
                                <th>SPPT Tanggal Terbit</th>
                                <th>SPPT Tanggal Cetak</th>
                                <th>OP Luas Bumi</th>
                                <th>OP Luas Bangunan</th>
                                <th>OP NJOP Bumi</th>
                                <th>OP NJOP Bangunan</th>
                                <th>OP NJOP</th>
                                <th>OP NJOPTK</th>
                                <th>OP NJKP</th>
                                <th>Payment Flag</th>
                                <th>Payment Paid</th>
                                <th>Payment Ref Number</th>
                                <th>Payment Bank Code</th>
                                <th>Payment SW Refnum</th>
                                <th>Payment GW Refnum</th>
                                <th>Payemnt SW ID</th>
                                <th>Payment Merchant Code</th>
                                <th>Payment Settlement Date</th>
                                <th>PBB Collectible</th>
                                <th>PBB Denda</th>
                                <th>PBB Admin GW</th>
                                <th>PBB Misc Fee</th>
                                <th>PBB Total Bayar</th>
                                <th>OP Alamat</th>
                                <th>OP RT</th>
                                <th>OP Rw</th>
                                <th>OP Kelurahan</th>
                                <th>OP Kecamatan</th>
                                <th>OP Kelurahan Kode</th>
                                <th>OP Kecamatan Kode</th>
                                <th>OP Kotakab Kode</th>
                                <th>OP Provinsi Kode</th>
                                <th>TGL STPD</th>
                                <th>TGL Sp1</th>
                                <th>TGL Sp2</th>
                                <th>TGL Sp3</th>
                                <th>Status SP</th>
                                <th>Status Cetak</th>
                                <th>WP_Pekerjaan</th>
                                <th>Payment Offline User Id</th>
                                <th>Payment Offline Flag</th>
                                <th>Payment Offline Paid</th>
                                <th>Id Wp</th>
                                <th>Payment Code</th>
                                <th>Booking Expired</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0010</td>
                                <td>2020</td>
                                <td>2021</td>
                                <td>9000</td>
                                <td>farhan</td>
                                <td>02820192</td>
                                <td>29302930</td>
                                <td>jl.pancasila</td>
                                <td>129</td>
                                <td>hajimena</td>
                                <td>WP Kecamatan</td>
                                <td>WP Kotakab</td>
                                <td>WP Kodepos</td>
                                <td>SPPT Tanggal Terbit</td>
                                <td>SPPT Tanggal Cetak</td>
                                <td>OP Luas Bumi</td>
                                <td>OP Luas Bangunan</td>
                                <td>OP NJOP Bumi</td>
                                <td>OP NJOP Bangunan</td>
                                <td>OP NJOP</td>
                                <td>OP NJOPTK</td>
                                <td>OP NJKP</td>
                                <td>Payment Flag</td>
                                <td>Payment Paid</td>
                                <td>Payment Ref Number</td>
                                <td>Payment Bank Code</td>
                                <td>Payment SW Refnum</td>
                                <td>Payment GW Refnum</td>
                                <td>Payemnt SW ID</td>
                                <td>Payment Merchant Code</td>
                                <td>Payment Settlement Date</td>
                                <td>PBB Collectible</td>
                                <td>PBB Denda</td>
                                <td>PBB Admin GW</td>
                                <td>PBB Misc Fee</td>
                                <td>PBB Total Bayar</td>
                                <td>OP Alamat</td>
                                <td>OP RT</td>
                                <td>OP Rw</td>
                                <td>OP Kelurahan</th>
                                <td>OP Kecamatan</td>
                                <td>OP Kelurahan Kode</td>
                                <td>OP Kecamatan Kode</td>
                                <td>OP Kotakab Kode</td>
                                <td>OP Provinsi Kode</td>
                                <td>TGL STPD</td>
                                <td>TGL Sp1</td>
                                <td>TGL Sp2</td>
                                <td>TGL Sp3</td>
                                <td>Status SP</td>
                                <td>Status Cetak</td>
                                <td>WP_Pekerjaan</td>
                                <td>Payment Offline User Id</td>
                                <td>Payment Offline Flag</td>
                                <td>Payment Offline Paid</td>
                                <td>Id Wp</td>
                                <td>Payment Code</td>
                                <td>Booking Expired</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row mt-3 float-right">
                    <div class="col-md-12">
                        <?php echo $pager->links('transaksi', 'bootstrap_pagination') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>