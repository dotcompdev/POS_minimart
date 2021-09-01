<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Waktu terpadat</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Awal</label>
                        <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                            <input autocomplete="off" name="tglAwal" type="text" class="form-control form-control-sm datetimepicker-input" data-target="#datetimepicker7" placeholder="Pilih tanggal mulai     -------->" />
                            <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Akhir</label>
                        <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                            <input autocomplete="off" name="tglAkhir" type="text" class="form-control form-control-sm datetimepicker-input" data-target="#datetimepicker8" placeholder="Pilih tanggal berakhir -------->" />
                            <div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-6">
                    <form action="#">
                        <div class="input-group pt-1">
                            <input type="search" class="form-control form-control-sm" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div> -->
            </div>

            <div class="row">
                <div class="col-md">
                    <!-- AREA CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Grafik waktu</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <div id="chartContainer" style="height: 280px; width: 100%;"></div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>