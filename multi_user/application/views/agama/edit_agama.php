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
                						<a href="<?php echo base_url('index.php/agama') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                                    </div>
                                    
                                    <form class="form-agama" action="" method="post">
                                        <div class="card-body">
                                                <input type="hidden" name="id_agama" value="<?php echo $agama->id_agama?>" />   
                                                <label for="name">Nama Agama</label>
                                                <input name="agama" type="text" id="inputAgama" class="form-control" placeholder="Nama Agama" value="<?php echo $agama->agama?>" required autofocus>   
                                                <div style="margin-top:10px;"></div>
                                                <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
                                        </div>
                                    </form> 
                        </div>
    </body>
</html>