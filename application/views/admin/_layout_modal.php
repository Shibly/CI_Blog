<?php $this->load->view('admin/components/page_head'); ?>
<body style="background: #555555">
<div class="modal show" role="dialog">
    <?php
    // Subview is set in controller
    $this->load->view($subview);
    ?>
    <div class="modal-footer">
        &copy; <?php echo $meta_title;?>
    </div>
</div>
<?php $this->load->view('admin/components/page_tail'); ?>