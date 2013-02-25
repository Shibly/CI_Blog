<div class="modal-header">
    <h3><?php echo empty($user->id) ? 'Add a new user' : 'Edit User' . $user->name;?></h3>
</div>
<div class="modal-body">
    <?php echo validation_errors();?>
    <?php echo form_open();?>
    <table class="table table-bordered">
        <tr>
            <td>Name</td>
            <td><?php echo form_input('name');?></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><?php echo form_input('email');?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><?php echo form_password('password');?></td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td><?php echo form_password('password_confirm');?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit('submit', 'Log in', 'class="btn btn-primary"');?></td>
        </tr>
    </table>
    <?php echo form_close();?>
</div>