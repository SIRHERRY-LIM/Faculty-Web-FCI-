<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Input Subject</div>

    <form method="post" action="<?php echo
                                    base_url('administrator/subject/add_subject_action') ?>">

        <div class="form-group">
            <label>Code Subject</label>
            <input type="text" name="code_subject" class="form-control">
            <?php echo form_error('code_subject', '<div class="text-danger small ml-3">') ?>
        </div>

        <div class="form-group">
            <label>Name Subject</label>
            <input type="text" name="name_subject" class="form-control">
            <?php echo form_error('name_subject', '<div class="text-danger small ml-3">') ?>
        </div>

        <div class="form-group">
            <label>Credit Hour</label>
            <select name="credit_hour" class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
        </div>

        <div class="form-group">
            <label>Semester</label>
            <select name="semester" class="form-control">
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
                <option value=" ">Choose Programme</option>

                <?php foreach ($programme as $prg) : ?>
                    <option value="<?php echo $prg->name_programme ?>">
                        <?php echo $prg->name_programme ?>

                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Save</button>
    </form>
</div>