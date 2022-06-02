                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

                    
                    <div class="row">
                        <div class="col-lg">
                            <?php if(validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors();?>
                                </div>
                            <?php endif; ?>
                            <?= form_open(); ?>

                            <?php
                    foreach ($job_position as $value ) {
                ?>

                            <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Position Position
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('admin/jobposition') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Back
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                                    <input value="<?php echo $value['id_job']; ?>" name="id_job" id="id_job" type="hidden" class="form-control">
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="job_name">Job Position Name</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input value="<?php echo $value['job_name']; ?>" name="job_name" id="job_name" type="text" class="form-control">
                        </div>
                        <?= form_error('job_name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_level">Level Position</label>
                    <div class="col-md-5">
                        <div class="input-group">
                        <select class="js-example-basic-single custom-select"  name='id_level' id='id_level' value="<?php echo $l['id_level']; ?>">
                        <option value='0' selected disabled>Choose Level Position</option>
                        <?php foreach ($level as $l) { ?>
                            <option value="<?php echo $l['id_level']; ?>" <?php if ($l['id_level'] == $value['id_level']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $l['level_name']; ?></option>
                            <?php } ?>
                        </select>
                        
                        </div>
                        <?= form_error('id_level', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <?php
                      }
                    ?>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>