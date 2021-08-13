<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Subjects</div>
    <?php echo $this->session->flashdata('Notification') ?>

    <?php echo anchor(
        'administrator/subject/add_subject',
        ' <button class="btn btn-sm btn-primary mb-3">
    <i class="fas fa-plus fa-sm"></i> Add Subject</button>'
    ) ?>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>Programme Name</th>
            <th colspan="3"> Action</th>
        </tr>
        <?php
        $no = 1;
        foreach ($subject as $st) : ?>
            <tr>
                <td><?php echo $no++ ?> </td>
                <td><?php echo $st->code_subject ?></td>
                <td><?php echo $st->name_subject ?></td>
                <td><?php echo $st->name_programme ?></td>
                <td width="20px">
                    <?php echo anchor('administrator/subject/detail/'  . $st->code_subject, ' <div class="btn btn-sm btn-info">
                        <i class="fa fa-eye"> </i>
                    </div>')  ?>

                </td>
                <td width="20px">
                    <?php echo anchor('administrator/subject/update/'  . $st->code_subject, ' <div class="btn btn-sm btn-primary">
                        <i class="fa fa-edit"> </i>
                    </div>')  ?>

                </td>
                <td width="20px">
                    <?php echo anchor('administrator/subject/delete/'  . $st->code_subject, ' <div class="btn btn-sm btn-danger">
                        <i class="fa fa-trash"> </i>
                    </div>')  ?>

            </tr>
        <?php endforeach; ?>

    </table>
</div>