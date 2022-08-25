<?php include('layout/header.php'); ?>
<?php include('layout/menu.php'); ?>

    <div class="main-content">
        <div class="container-fluid col-lg-4" style="float: left">
            <div class="line-break"></div>
            <h4><b><?php echo ($username  ? ucfirst($username) . ', ' : ''); ?>this is your personal account.</b></h4>
        </div>
    </div>

<?php include('layout/footer.php'); ?>