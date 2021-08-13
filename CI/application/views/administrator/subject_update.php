<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Update Subject</div>

    <?php foreach ($subject as $st) : ?>

        <form method="post" action="<?php echo base_url('administrator/subject/update_action') ?>">

            <div class="form-group">
                <label>Name Subject</label>
                <input type="hidden" name="code_subject" class="form-control" value="<?php echo $st->code_subject ?>">

                <input type="text" name="name_subject" class="form-control" value="<?php
                                                                                    echo $st->name_subject ?>">
            </div>
            <div class="form-group">
                <label>Credit Hour</label>
                <select name="credit_hour" class="form-control">
                    <option><?php echo $st->credit_hour ?></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>

            <div class="form-group">
                <label>Semester</label>
                <select name="semester" class="form-control">
                    <option><?php echo $st->semester ?></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                </select>
            </div>

            <div class="form-group">
                <label>Programme</label>
                <select name="name_programme" class="form-control">
                    <option><?php echo $st->name_programme ?></option>
                    <?php foreach ($programme as $prg) : ?>
                        <option value="<?php echo $prg->name_programme; ?>">
                            <?php echo $prg->name_programme; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Save</button>

        </form>
    <?php endforeach; ?>
</div>