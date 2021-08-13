<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-eye"></i> Detail Subjects</div>

    <table class="table table-hover table-striped table-bordered ">
        <?php foreach ($detail as $dt) : ?>
            <tr>
                <th> Subject Code</th>
                <td><?php echo $dt->code_subject; ?></td>
            </tr>

            <tr>
                <th> Subject Name</th>
                <td><?php echo $dt->name_subject; ?></td>
            </tr>
            <tr>
                <th> Credit Hour</th>
                <td><?php echo $dt->credit_hour; ?></td>
            </tr>
            <tr>
                <th> Semester</th>
                <td><?php echo $dt->semester; ?></td>
            </tr>
            <tr>
                <th> Programme Name</th>
                <td><?php echo $dt->name_programme; ?></td>
            </tr>

        <?php endforeach; ?>
    </table>

    <?php echo anchor('administrator/subject', '<div class="btn btn-sm btn-primary">
        Back
    </div> ') ?>
</div>