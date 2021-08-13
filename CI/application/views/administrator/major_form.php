<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Input Major</div>

    <form method="post" action="<?php echo base_url('administrator/major/input_action') ?>">
        <div class="form-group">
            <label>Major Code</label>
            <input type="text" name="code_major" placeholder="Please Enter Major Code" class="form-control">
            <?php echo form_error('code_major', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>Major Name</label>
            <input type="text" name="name_major" placeholder="Please Enter Major Name" class="form-control">
            <?php echo form_error('name_major', '<div class="text-danger small" ml-3>') ?>
        </div>



        <button type="submit" class="btn btn-primary"> Save</button>
    </form>
</div>