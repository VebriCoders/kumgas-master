<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="page-error">
                <div class="page-inner">
                    <h1>404</h1>
                    <div class="page-description">
                        Halaman Yang Kamu Cari Tidak Di Temukan !
                    </div>
                    <div class="page-search">
                        <form>
                            <div class="form-group floating-addon floating-addon-not-append">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-lg">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="mt-3">
                            <?php if ($this->session->userdata('dia_admin') == '1') { ?>
                                <a href="<?php echo base_url('beranda') ?>">Kembali Ke Beranda</a>
                            <?php } else if ($this->session->userdata('siswa_login') == '1') { ?>
                                <a href="<?php echo base_url('dashboard') ?>">Kembali Ke Dashboard</a>
                            <?php } else { ?>
                                <a href="<?php echo base_url() ?>">Kembali Ke Aplikasi</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simple-footer mt-5">
                Copyright &copy; Pradana Industries 2020
            </div>
        </div>
    </section>
</div>