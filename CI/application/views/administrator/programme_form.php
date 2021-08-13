<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Input Programme</div>

    <form method="post" action="
    <?php echo base_url('administrator/programme/add_programme_action') ?>">
        <div class="form-group">
            <label>Programme Code</label>
            <input type="text" name="code_programme" placeholder="Please Enter Programme Code" class="form-control">
            <?php echo form_error('code_programme', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>Programme Name</label>
            <input type="text" name="name_programme" placeholder="Please Enter Programme Name" class="form-control">
            <?php echo form_error('name_programme', '<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>Major Name</label>
            <select name="name_major" class="form-control">
                <option value="">Select Major</option>
                <?php foreach ($major as $mjr) : ?>
                    <option value="<?php echo $mjr->name_major ?>">
                        <?php echo $mjr->name_major; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary"> Save</button>
    </form>
</div>