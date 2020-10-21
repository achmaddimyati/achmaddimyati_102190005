<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   <meta name="description" content="Tutorial Codeigniter Membuat Hak Akses Menggunakan Jquery dan Mysql">
    <meta name="author" content="Ilmucoding">
    <title>Profil</title>   <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<div class="container mt-5">
<div class="col-md-12 justify-align-center">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if($this->session->userdata('id_level')=='Admin') { ?>
                            Menu Profil
                            <div style="margin-left:10px" class="float-right">
                                <a href="<?= base_url('index.php/auth/logout') ?>" class="btn btn-primary">Logout</a>
                            </div>
                            <div style="margin-left:10px" class="float-right menu">
                                <a href="<?= base_url('index.php/agama') ?>" class="btn btn-primary menu">Agama</a>
                            </div>
                            <div style="margin-left:10px" class="float-right menu">
                                <a href="<?= base_url('index.php/jurusan') ?>" class="btn btn-primary">Jurusan</a>
                            </div>
                        </div>
                        <div class="card-body">
                             
                            <div style="white-space:nowrap;" class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px;">No</th>
                                            <th style="width: 100px;">Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Agama</th>
                                            <th>Jurusan</th>
                                            <th>Alamat</th>
                                           <th style="width: 100px;" id="btn-action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($profil->result() as $data) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data->nama ?></td>
                                            <td><?= $data->username ?></td>
                                            <td><?= $data->email ?></td>
                                            <td><?= $data->kd_agama ?></td>
                                            <td><?= $data->kd_jurusan ?></td>
                                            <td><?= $data->alamat ?></td>
                                            <td class="td-btn">
                                                <a href="" class="btn btn-info">
                                                    Detail
                                                </a>
                                                <a href="" class="btn btn-success">
                                                    Edit
                                                </a>
                                                <a href="" class="btn btn-danger">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            <?php } else { ?>
                                Menu Profil
                                <div style="margin-left:10px" class="float-right">
                                <a href="<?= base_url('index.php/auth/logout') ?>" class="btn btn-primary">Logout</a>
                            </div>
                        </div>
                        <div class="card-body">
                             
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                        <?php
                                        foreach($profil->result() as $data) { ?>
                                        <tr>
                                            <th>Nama</th>
                                            <td><?= $data->nama ?></td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td><?= $data->username ?></td>
                                        </tr>  
                                        <tr>
                                            <th>Email</th>
                                            <td><?= $data->email ?></td>
                                        </tr>
                                        <?php } ?> 
                                        <?php foreach ($agama as $agama){
                                        if($data->kd_agama == $agama->id_agama){ ?>
                                        <tr>
                                            <th>Agama</th>
                                            <td><?= $agama->agama ?></td>
                                        </tr>
                                        <?php } }?> 
                                        <?php foreach ($jurusan as $jurusan){
                                        if($data->kd_jurusan == $jurusan->id_jurusan){ ?>  
                                        <tr>
                                            <th>Jurusan</th>
                                            <td><?= $jurusan->nama_jurusan ?></td>
                                        </tr>  
                                        <?php } }?>
                                        <?php
                                        foreach($profil->result() as $data) { ?> 
                                        <tr>
                                            <th>Alamat</th>
                                            <td><?= $data->alamat ?></td>
                                        </tr>    
                                        <tr>
                                            <th style="width: 25%;" id="btn-action">Action</th>
                                            <td class="td-btn">
                                                <a href="<?php echo site_url('profil/edit/'.$data->username)?>" class="btn btn-success">
                                                    Edit
                                                </a>
                                                <a href="" class="btn btn-danger">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
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
<script>
 
<?php if($this->session->userdata('id_level') == "User"){ ?>
 
  $(document).ready(function(){
 

    $(".menu").remove();
 
  });
 
<?php } else {}; ?>
 
</script>
</body>
</html>