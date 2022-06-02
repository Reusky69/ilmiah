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

        <?= $this->session->set_flashdata('message'); ?><div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Input Employee Placement
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('admin/employeeplacement');?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= $this->session->flashdata('message'); ?>


                 <?= form_open(); ?>

                 <?php
            foreach ($employeeplacement as $value ) {
        ?>



<div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_employee">NIP</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input value="<?php echo $value['id_employee']; ?>" name="id_employee" readonly id="krite" type="text" class="form-control">
                        </div>
                        <?= form_error('id_employee', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="name">Name</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input value="<?php echo $value['name']; ?>" name="name" readonly id="krite" type="text" class="form-control">
                        </div>
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_company">ID Company</label>
                    <div class="col-md-5">
                        <div class="input-group">
                        <select class="js-example-basic-single custom-select" name='id_company' id='id_company' value="<?php echo $c['id_company']; ?>">
                        <option value='0' selected disabled>Choose Company</option>
                        <?php foreach ($company as $c) { ?>
                            <option value="<?php echo $c['id_company']; ?>" <?php if ($c['id_company'] == $value['id_company']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $c['company_name']; ?></option>
                            <?php } ?>
                        </select>
                        </div>
                            <?= form_error('id_company', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_directorate">ID Directorate</label>
                    <div class="col-md-5">
                        <div class="input-group">
                        <select class="js-example-basic-single custom-select" name='id_directorate' id='id_directorate' value="<?php echo $d['id_directorate']; ?>">
                        <option value='0' selected disabled>--- Choose Directorate ---</option>
                        <?php foreach ($directorate as $d) { ?>
                            <option value="<?php echo $d['id_directorate']; ?>" <?php if ($d['id_directorate'] == $value['id_directorate']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $d['directorate_name']; ?></option>
                            <?php } ?>
                        </select>
                        </div>
                            </div>
                            <?= form_error('id_directorate', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_division">Division</label>
                    <div class="col-md-5">
                        <div class="input-group">
                        <select class="js-example-basic-single custom-select" name='id_division' id='id_division' value="<?php echo $dv['id_division']; ?>">
                        <option value='0' selected disabled>Choose Directorate</option>
                        <?php foreach ($division as $dv) { ?>
                            <option value="<?php echo $dv['id_division']; ?>" <?php if ($dv['id_division'] == $value['id_division']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $dv['division_name']; ?></option>
                            <?php } ?>
                        </select>
                            
                            </div>
                            <?= form_error('id_division', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_subdivision">Sub Division</label>
                    <div class="col-md-5">
                        <div class="input-group">
                        <select class="js-example-basic-single custom-select" name='id_subdivision' id='id_subdivision' value="<?php echo $s['id_subdivision']; ?>">
                        <option value='0' selected disabled>--- Choose Directorate ---</option>
                        <?php foreach ($sub_division as $s) { ?>
                            <option value="<?php echo $s['id_subdivision']; ?>" <?php if ($s['id_subdivision'] == $value['id_subdivision']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $s['subdivision_name']; ?></option>
                            <?php } ?>
                        </select>
                            </div>
                            <?= form_error('id_subdivision', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_level">Level</label>
                    <div class="col-md-5">
                        <div class="input-group">
                        <select class="js-example-basic-single custom-select" name='id_level' id='id_level' value="<?php echo $l['id_level']; ?>">
                        <option value='0' selected disabled>--- Choose Directorate ---</option>
                        <?php foreach ($level_position as $l) { ?>
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
                    <label class="col-md-4 text-md-right" for="id_job">Job Position</label>
                    <div class="col-md-5">
                        <div class="input-group">
                        <select class="js-example-basic-single custom-select" name='id_job' id='id_job' value="<?php echo $j['id_job']; ?>">
                        <option value='0' selected disabled>--- Choose Directorate ---</option>
                        <?php foreach ($job_position as $j) { ?>
                            <option value="<?php echo $j['id_job']; ?>" <?php if ($j['id_job'] == $value['id_job']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $j['job_name']; ?></option>
                            <?php } ?>
                        </select>
                            </div>
                            <?= form_error('id_job', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_status_jabatan">Status Jabatan</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select class="js-example-basic-single custom-select" name='id_status_jabatan' id='id_status_jabatan' value="<?php echo $s['id_status_jabatan']; ?>">
                        <option value='0' selected disabled>--- Choose Directorate ---</option>
                        <?php foreach ($status_jabatan as $s) { ?>
                            <option value="<?php echo $s['id_status_jabatan']; ?>" <?php if ($s['id_status_jabatan'] == $value['id_status_jabatan']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $s['status_jabatan_name']; ?></option>
                            <?php } ?>
                        </select>
                            </div>
                            <?= form_error('id_status_jabatan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_status_employee">Status Employee</label>
                    <div class="col-md-5">
                        <div class="input-group">
                        <select class="js-example-basic-single custom-select" name='id_status_employee' id='id_status_employee' value="<?php echo $se['id_status_employee']; ?>">
                        <option value='0' selected disabled>--- Choose Directorate ---</option>
                        <?php foreach ($statusemployee as $se) { ?>
                            <option value="<?php echo $se['id_status_employee']; ?>" <?php if ($se['id_status_employee'] == $value['id_status_employee']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $se['status_employee']; ?></option>
                            <?php } ?>
                        </select>
                            </div>
                            <?= form_error('id_status_employee', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_grade">Grade</label>
                    <div class="col-md-5">
                        <div class="input-group">
                        <select class="js-example-basic-single custom-select" name='id_grade' id='id_grade' value="<?php echo $g['id_grade']; ?>">
                        <option value='0' selected disabled>--- Choose Directorate ---</option>
                        <?php foreach ($grade_level as $g) { ?>
                            <option value="<?php echo $g['id_grade']; ?>" <?php if ($g['id_grade'] == $value['id_grade']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $g['grade_level']; ?></option>
                            <?php } ?>
                        </select>
                            </div>
                            <?= form_error('id_grade', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="id_consol">Consol</label>
                        <div class="col-md-5">
                            <div class="input-group">
                            <select class="js-example-basic-single custom-select" name='id_consol' id='id_consol' value="<?php echo $c['id_consol']; ?>">
                        <option value='0' selected disabled>--- Choose Directorate ---</option>
                        <?php foreach ($consollevel as $c) { ?>
                            <option value="<?php echo $c['id_consol']; ?>" <?php if ($c['id_consol'] == $value['id_consol']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $c['consol_name']; ?></option>
                            <?php } ?>
                        </select>
                                </div>
                                <?= form_error('id_consol', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_unit">Unit</label>
                    <div class="col-md-5">
                        <div class="input-group">
                        <select class="js-example-basic-single custom-select" name='id_unit' id='id_unit' value="<?php echo $u['id_unit']; ?>">
                        <option value='0' selected disabled>--- Choose Directorate ---</option>
                        <?php foreach ($unit as $u) { ?>
                            <option value="<?php echo $u['id_unit']; ?>" <?php if ($u['id_unit'] == $value['id_unit']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $u['unit']; ?></option>
                            <?php } ?>
                        </select>
                            </div>
                            <?= form_error('id_unit', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>


                    

                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <?= form_close(); ?>
                <?php
            }
        ?>
            </div>
        </div>
    </div>
</div>