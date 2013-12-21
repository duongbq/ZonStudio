<div class="headerbar">
    <h1>Dịch vụ</h1>

    <div class="pull-right">
        <a class="btn btn-primary" href="<?php echo site_url('services/create'); ?>"><i class="icon-plus icon-white"></i> Thêm dịch vụ mới</a>
    </div>

</div>

<div class="table-content">

    <?php $this->load->view('layouts/admin/alerts'); ?>

    <div id="filter_results">
        <?php $this->load->view('partial_services_table'); ?>
    </div>

</div>

