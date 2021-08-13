<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Major</div>
    <?php echo $this->session->flashdata('Notification') ?>

    <?php echo anchor(
        'administrator/major/input',
        ' <button class="btn btn-sm btn-primary mb-3">
        <i class="fas fa-plus fa-sm"></i> Add Major</button>'
    ) ?>


    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>MAJOR CODE</th>
            <th>MAJOR NAME</th>
            <th colspan="2">ACTION</th>
        </tr>

        <?php
        $no = 1;
        foreach ($major as $mjr) : ?>
            <tr>
                <td width="20px"> <?php echo $no++ ?></td>
                <td><?php echo  $mjr->code_major ?></td>
                <td><?php echo $mjr->name_major ?></td>
                <td width="20px">
                    <?php echo anchor('administrator/major/update/'  . $mjr->id_major, ' <div class="btn btn-sm btn-primary">
                        <i class="fa fa-edit"> </i>
                    </div>')  ?>

                </td>
                <td width="20px">
                    <?php echo anchor('administrator/major/delete/'  . $mjr->id_major, ' <div class="btn btn-sm btn-danger">
                        <i class="fa fa-trash"> </i>
                    </div>')  ?>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>