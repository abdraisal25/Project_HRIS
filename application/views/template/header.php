<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Assan admin</title>

        <!-- Bootstrap -->
        <link href="<?= base_url() ?>assets/project/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--side menu plugin-->
        <link href="<?= base_url() ?>assets/project/plugins/hoe-nav/hoe.css" rel="stylesheet">
        <!-- icons-->
        <link href="<?= base_url() ?>assets/project/plugins/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/project/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- <link href="<?= base_url() ?>assets/project/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" /> -->
        <link href="<?= base_url() ?>assets/project/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
         <!-- dataTables -->
        <link href="<?= base_url() ?>assets/project/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>assets/project/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
        <!--template custom css file-->
        <link href="<?= base_url() ?>assets/project/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css"> -->
        <link href="<?= base_url() ?>assets/project/plugins/flatpickr/flatpickr.min.css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css"> -->
        <script src="<?= base_url() ?>assets/project/js/modernizr.js"></script>
        <script src="<?= base_url() ?>assets/project/plugins/jquery/dist/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body hoe-navigation-type="vertical" hoe-nav-placement="left" theme-layout="wide-layout">

        <!--side navigation start-->
        <div id="hoeapp-wrapper" class="hoe-hide-lpanel" hoe-device-type="desktop">
            <header id="hoe-header" hoe-lpanel-effect="shrink">
                <div class="hoe-left-header">
                    <a href="#">CIT<span></span></a>
                    <span class="hoe-sidebar-toggle"><a href="#"></a></span>
                </div>
                <div class="hoe-right-header" hoe-position-type="relative">
                    <span class="hoe-sidebar-toggle"><a href="#"></a></span>                    
                    <ul class="left-navbar">
                        <li>
                            <strong style="font-size:24px"><?= $this->session->userdata('nama_perusahaan') ?></strong>
                        </li>
                    </ul>
                    <ul class="right-navbar navbar-right">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><img src="<?= base_url() ?>assets/project/images/avtar.png" alt="" width="30" class="img-circle"> <?= $this->session->userdata('nama_user') ?></a>
                            <ul class="dropdown-menu dropdown-menu-scale user-dropdown">
                                <?php if(!empty($this->session->userdata('jabatan'))){ ?>
                                <li><a href="<?= base_url() ?>perusahaan/jabatan/jobdesc/<?= $this->session->userdata('jabatan')[0]{'jabatan_nama'} ?>/<?= encrypt_url($this->session->userdata('jabatan')[0]{'key_jabatan'}) ?>"><i class="ion-person"></i> Job Description </a></li>
                                <?php } ?> 
                                <li><a href="<?= base_url() ?>perusahaan/user/biodata/<?= $this->session->userdata('nama_user') ?>/<?= encrypt_url($this->session->userdata('id_user')) ?>"><i class="ion-person"></i> Profile </a></li>
                                <li><a href="<?= base_url()?>login/logout"><i class="ion-log-out"></i> Logout </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </header>
       