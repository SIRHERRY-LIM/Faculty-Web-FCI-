<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> PROGRAMME</div>
    <?php echo $this->session->flashdata('Notification') ?>

    <?php echo anchor(
        'administrator/programme/add_programme',
        ' <button class="btn btn-sm btn-primary mb-3">
    <i class="fas fa-plus fa-sm"></i> Add Programme</button>'
    ) ?>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>NO</th>
            <th>PROGRAMME CODE</th>
            <th>PROGRAMME NAME</th>
            <th>MAJOR NAME</th>
            <th colspan="2">ACTION</th>
        </tr>
        <?php
        $no = 1;
        foreach ($programme as $prg) : ?>
            <tr>
                <td> <?php echo $no++ ?></td>
                <td><?php echo $prg->code_programme ?></td>
                <td><?php echo $prg->name_programme ?></td>
                <td><?php echo $prg->name_major ?></td>
                <td width="20px">
                    <?php echo anchor('administrator/programme/update/'  . $prg->id_programme, ' <div class="btn btn-sm btn-primary">
                        <i class="fa fa-edit"> </i>
                    </div>')  ?>

                </td>
                <td width="20px">
                    <?php echo anchor('administrator/programme/delete/'  . $prg->id_programme, ' <div class="btn btn-sm btn-danger">
                        <i class="fa fa-trash"> </i>
                    </div>')  ?>


            </tr>
        <?php endforeach; ?>

    </table>
</div>