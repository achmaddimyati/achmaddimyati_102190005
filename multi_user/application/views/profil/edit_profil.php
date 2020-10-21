<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   <meta name="description" content="Tutorial Codeigniter Membuat Hak Akses Menggunakan Jquery dan Mysql">
        <meta name="author" content="Ilmucoding">
        <title>Edit Agama</title>   <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
        <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <div class="card mb-3">
        <?php
            $errors = $this->session->flashdata('errors');
            if(!empty($errors)){
            ?>
            <div class="row">
                <div class="col-md-12">
                <div class="alert alert-danger text-center">
                    <?php foreach($errors as $key=>$error){ ?>
                    <?php echo "$error<br>"; ?>
                    <?php } ?>
                </div>
                </div>
            </div>
            <?php
            } 
            if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-primary" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
                <div class="card-header">
                    <a href="<?php echo base_url('index.php/profil') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                
                <form class="form-profil" action="" method="post">
                    <div class="card-body">
                            <input type="hidden" name="id_user" value="<?php echo $profil->id_user?>" />   
                            
                            <input name="username" type="text" id="inputusername" class="form-control" placeholder="username" value="<?php echo $profil->username?>" required autofocus>   
                            <div style="margin-top:10px;"></div>
                            <input name="nama" type="text" id="inputnama" class="form-control" placeholder="nama" value="<?php echo $profil->nama?>" required autofocus>   
                            <div style="margin-top:10px;"></div>
                            <input name="password" type="text" id="inputpassword" class="form-control" placeholder="password" value="<?php echo $profil->password?>" required autofocus>   
                            <div style="margin-top:10px;"></div>
                            <input name="email" type="text" id="inputemail" class="form-control" placeholder="email" value="<?php echo $profil->email?>" required autofocus>   
                            <div style="margin-top:10px;"></div>
                            <select name="kd_agama" id="" class="form-control" autofocus style="height: 45px;">
                            <?php foreach ($agama as $agama)
                                {
                                    if($profil->kd_agama == $agama->id_agama)
                                        {
                                            echo "<option value=$agama->id_agama selected>$agama->agama</option>";
                                        }else {
                                            echo "<option value=$agama->id_agama>$agama->agama</option>";
                                        }
                                }
                                ?>
                            </select>
                            <div style="margin-top:10px;"></div>
                            <select name="kd_jurusan" id="" class="form-control" autofocus style="height: 45px;">
                            <?php foreach ($jurusan as $jurusan)
                                {
                                    if($profil->kd_jurusan == $jurusan->id_jurusan)
                                        {
                                            echo "<option value=$jurusan->id_jurusan selected>$jurusan->nama_jurusan</option>";
                                        }else {
                                            echo "<option value=$jurusan->id_jurusan>$jurusan->nama_jurusan</option>";
                                        }
                                }
                                ?>
                            </select>   
                            <div style="margin-top:10px;"></div>
                            <textarea name="alamat" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" ><?php echo $profil->alamat?></textarea>   
                            <div style="margin-top:10px;"></div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
                            <?php var_dump($profil->kd_agama);?>
                            <?php var_dump($agama->id_agama);?>
                            
                    </div>
                </form> 
            </div>
    </body>
</html>