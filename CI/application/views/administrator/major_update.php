<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Update Major</div>
    <?php foreach ($major as $mjr) : ?>

        <form method="post" action="
        <?php echo base_url('administrator/major/update_action') ?>">

            <div class="form-group">
                <label> Major Code</label>
                <input type="hidden" name="id_major" value="<?php echo $mjr->id_major ?>">
                <input type="text" name="code_major" class="form-control" value="<?php echo $mjr->code_major ?>">
            </div>

            <div class="form-group">
                <label> Major Name </label>
                <input type="text" name="name_major" class="form-control" value="<?php echo $mjr->name_major ?>">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>

        </form>
    <?php endforeach; ?>


</div>