<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   <meta name="description" content="Tutorial Codeigniter Membuat Hak Akses Menggunakan Jquery dan Mysql">
    <meta name="author" content="Ilmucoding">
    <title>List Agama</title>   <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        .valign {
            position: absolute;
            left: 65%;
            top: 40%;
            transform: translate(-50%, -50%);
            }
    </style>
</head>
<body>
<div class="container mt-5 valign">
<div class="col-md-12 justify-align-center">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <?php if($this->session->userdata('id_level')=='User'){
                                redirect(site_url('profil'));                                
                            } else {?>
                            Menu Agama
                            <div style="margin-left:10px" class="float-right">
                                <a href="<?= base_url('index.php/auth/logout') ?>" class="btn btn-primary">Logout</a>
                            </div>
                            <div style="margin-left:10px" class="float-right menu">
                                <a href="<?= base_url('index.php/jurusan') ?>" class="btn btn-primary">Jurusan</a>
                            </div>
                            <div style="margin-left:10px" class="float-right menu">
                                <a href="<?= base_url('index.php/profil') ?>" class="btn btn-primary">Profil</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div style="margin-bottom:10px" class="float-right menu">
                                <a href="<?= base_url('index.php/agama/add') ?>" class="btn btn-primary">Add Agama</a>
                            </div>
                             
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px;">No</th>
                                            <th>Agama</th>
                                           <th style="width: 35%;" id="btn-action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($agama as $data) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data->agama ?></td>
                                            <td class="td-btn">
                                                <a href="<?php echo site_url('agama/edit/'.$data -> id_agama) ?>" class="btn btn-success">
                                                    Edit
                                                </a>
                                                <a href="<?php echo site_url('agama/delete/'.$data -> id_agama) ?>" class="btn btn-danger">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
</div>
</body>
</html>