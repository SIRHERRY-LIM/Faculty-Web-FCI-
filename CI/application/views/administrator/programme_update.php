<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Update Programme</div>
    <?php foreach ($programme as $prg) : ?>

        <form method="post" action="
        <?php echo base_url('administrator/programme/update_action') ?>">

            <div class="form-group">
                <label> Programme Code</label>
                <input type="hidden" name="id_programme" value="<?php echo $prg->id_programme ?>">
                <input type="text" name="code_programme" class="form-control" value="<?php echo $prg->code_programme ?>">
            </div>

            <div class="form-group">
                <label> Major Name</label>
                <select name="name_major" class="form-control">
                    <option value="<?php echo $prg->name_major ?>">
                        <?php echo $prg->name_major; ?></option>

                    <?php foreach ($major as $mjr) : ?>
                        <option value="<?php echo $mjr->name_major ?>">
                            <?php echo $mjr->name_major; ?></option>

                    <?php endforeach; ?>

                </select>
            </div>

            <div class="form-group">
                <label> Programme Name</label>
                <input type="text" name="name_programme" class="form-control" value="<?php echo $prg->name_programme ?>">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>

        </form>
    <?php endforeach; ?>


</div>