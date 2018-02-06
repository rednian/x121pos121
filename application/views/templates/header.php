<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <title>POS | <?php echo ucwords($title); ?></title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  
  <!-- ================== BEGIN BASE CSS STYLE ================== -->
  <link href="<?php echo base_url('assets/css/font.css'); ?>" rel="stylesheet">
  
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/sochic/sochic.png'); ?>">

  <link href="<?php echo base_url('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/style.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/style-responsive.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/theme/default.css'); ?>" rel="stylesheet" id="theme" />


  <link href="<?php echo base_url('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/DataTables/extensions/Buttons/css/buttons.bootstrap.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/DataTables/extensions/AutoFill/css/autoFill.bootstrap.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/DataTables/extensions/ColReorder/css/colReorder.bootstrap.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/DataTables/extensions/KeyTable/css/keyTable.bootstrap.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/DataTables/extensions/RowReorder/css/rowReorder.bootstrap.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/DataTables/extensions/Select/css/select.bootstrap.min.css'); ?>" rel="stylesheet" />
  
  <link href="<?php echo base_url('assets/validation/css/formValidation.min.css'); ?>" rel="stylesheet" />

  <link href="<?php echo base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css'); ?>" rel="stylesheet" />
  
  <link href="<?php echo base_url('assets/plugins/bootstrap3-editable/css/bootstrap-editable.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/bootstrap3-editable/inputs-ext/address/address.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/bootstrap3-editable/inputs-ext/typeaheadjs/lib/typeahead.css'); ?>" rel="stylesheet" />

  <link href="<?php echo base_url('assets/plugins/switchery/switchery.min.css'); ?>" rel="stylesheet" />

  <link href="<?php echo base_url('assets/plugins/notify/pnotify.custom.min.css'); ?>" rel="stylesheet" />
  


  <link href="<?php echo base_url('assets/plugins/bootstrap-datepicker/css/datepicker.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/bootstrap-datepicker/css/datepicker3.css'); ?>" rel="stylesheet" />
  
  <link href="<?php echo base_url('assets/plugins/ionRangeSlider/css/ion.rangeSlider.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/password-indicator/css/password-indicator.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/bootstrap-combobox/css/bootstrap-combobox.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/bootstrap-select/bootstrap-select.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/jquery-tag-it/css/jquery.tagit.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet" />

  
  <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/style.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/style-responsive.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/theme/default.css'); ?>" rel="stylesheet" id="theme" />
  <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet" id="theme" />

  <style type="text/css">
    td.details-control {
        background: url('<?php echo base_url('assets/plugins/DataTables/media/image/details_open.png'); ?>') no-repeat center center;
        cursor: pointer;
    }
    tr.shown td.details-control {
        background: url('<?php echo base_url('assets/plugins/DataTables/media/image/details_close.png'); ?>') no-repeat center center;
    }
    .highlightRow {
        background-color:   #ffaabb;

    }
    .flat{
      border-radius: 0;
    }
 /*   .media:hover img{
      /*position: relative;*/
        transition: 1.5s;
       -moz-transform: scale(1.5);
      -webkit-transform: scale(1.5);
       transform: scale(1.5);
    }*/
  </style>
  <!-- ================== END BASE CSS STYLE ================== -->
  
  <!-- ================== BEGIN BASE JS ================== -->

  <script src="<?php echo base_url('assets/plugins/jquery/jquery-1.9.1.min.js'); ?>"></script>
  <!-- <script src="<?php echo base_url('assets/plugins/pace/pace.min.js'); ?>"></script> -->
  <!-- ================== END BASE JS ================== -->
</head>
<body>