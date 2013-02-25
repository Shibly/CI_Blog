<?php $this->load->view('admin/components/page_head'); ?>
<body>
<div class="navbar navbar-static-top navbar-inverse">
    <div class="navbar-inner">
        <a class="brand" href="<?php echo base_url('admin/dashboard');?>"><?php echo $meta_title;?></a>
        <ul class="nav">
            <li class="active"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
            <li><?php echo anchor('admin/pages', 'pages')?></li>
            <li><?php echo anchor('admin/users', 'users')?></li>
        </ul>
    </div>
</div>
<div class="container">
    <!-- Main column -->
    <div class="row">
        <div class="span9">
            <?php $this->load->view($subview);?>
        </div>
        <!-- Sidebar -->
        <div class="span3">
            <section>
                <?php echo mailto('shibly.phy@gmail.com', '<i class="icon-user"></i>shibly.phy@gmail.com');?><br>
                <?php echo anchor('admin/user/logout', '<i class="icon-off"></i>logout');?>
            </section>
        </div>
    </div>
</div>
<?php $this->load->view('admin/components/page_tail'); ?>