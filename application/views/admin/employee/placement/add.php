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



                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="name">Nama</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select class="js-example-basic-single custom-select" id="id_employee" onChange="changeValue(this.value)" name="id_employee">
                                <option value="<?= set_value('name'); ?>" selected disabled>Choose Nama</option>
                                <?php 
                                    $jsArray = "var JD = new Array();\n";
                            
                                    foreach ($noplace as $ep){
                                        echo '<option value="'.$ep['name'].'">'.$ep['name'].'</option>';
                                        $jsArray .= "JD['".$ep['name']."']={satu:'".addslashes($ep['id_employee'])."'};\n";
                                    }
                                ?>
                                </select>
                            </div>
                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_employee">NIP</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input name="id_employee" readonly id="krite" type="text" class="form-control" required>
                        </div>
                        <?= form_error('id_employee', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_company">Company</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select class="js-example-basic-single custom-select" id="id_company" name="id_company">
                                <option value="<?= set_value('id_company'); ?>" selected disabled>Choose Company</option>
                                <?php foreach ($company as $c) : ?>
                                    <option value="<?= $c['id_company'] ?>"><?= $c['company_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_company', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_directorate">Directorate</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select class="js-example-basic-single custom-select" id="id_directorate" name="id_directorate">
                                <option value="<?= set_value('id_directorate'); ?>" selected disabled>Choose Directorate</option>
                                <?php foreach ($direct as $d) : ?>
                                    <option value="<?= $d['id_directorate'] ?>"><?= $d['directorate_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_directorate', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_division">Division</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select class="js-example-basic-single custom-select" id="id_division" name="id_division">
                                <option value="<?= set_value('id_division'); ?>" selected disabled>Choose Division</option>
                                <?php foreach ($division as $dv) : ?>
                                    <option value="<?= $dv['id_division'] ?>"><?= $dv['division_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_division', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_subdivision">Subdivision</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select class="js-example-basic-single custom-select" id="id_subdivision" name="id_subdivision">
                                <option value="<?= set_value('id_subdivision'); ?>" selected disabled>Choose Subdivision</option>
                                <?php foreach ($subdivision as $s) : ?>
                                    <option value="<?= $s['id_subdivision'] ?>"><?= $s['subdivision_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_subdivision', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_level">Position Level</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select class="js-example-basic-single custom-select" id="id_level" name="id_level">
                                <option value="<?= set_value('id_level'); ?>" selected disabled>Choose Position Level</option>
                                <?php foreach ($level as $l) : ?>
                                    <option value="<?= $l['id_level'] ?>"><?= $l['level_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_level', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_job">Position Job</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select class="js-example-basic-single custom-select" id="id_job" name="id_job">
                                <option value="<?= set_value('id_job'); ?>" selected disabled>Choose Position Job</option>
                                <?php foreach ($job_position as $j) : ?>
                                    <option value="<?= $j['id_job'] ?>"><?= $j['job_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_job', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_status_jabatan">Position Status</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select class="js-example-basic-single custom-select" id="id_status_jabatan" name="id_status_jabatan">
                                <option value="<?= set_value('id_status_jabatan'); ?>" selected disabled>Choose Position Status</option>
                                <?php foreach ($status_jabatan as $s) : ?>
                                    <option value="<?= $s['id_status_jabatan'] ?>"><?= $s['status_jabatan_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_status_jabatan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_status_employee">Employee Status</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select class="js-example-basic-single custom-select" id="id_status_employee" name="id_status_employee">
                                <option value="<?= set_value('id_status_employee'); ?>" selected disabled>Choose Employee Status</option>
                                <?php foreach ($statusemployee as $se) : ?>
                                    <option value="<?= $se['id_status_employee'] ?>"><?= $se['status_employee'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_status_employee', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_grade">Grade Level</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select class="js-example-basic-single custom-select" id="id_grade" name="id_grade">
                                <option value="<?= set_value('id_grade'); ?>" selected disabled>Choose Grade Level</option>
                                <?php foreach ($grade as $g) : ?>
                                    <option value="<?= $g['id_grade'] ?>"><?= $g['grade_level'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_grade', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-4 text-md-right" for="id_consol">Console Level</label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <select class="js-example-basic-single custom-select" id="id_consol" name="id_consol">
                                    <option value="<?= set_value('id_consol'); ?>" selected disabled>Choose Console Level</option>
                                    <?php foreach ($consollevel as $c) : ?>
                                        <option value="<?= $c['id_consol'] ?>"><?= $c['consol_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?= form_error('id_consol', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_unit">Unit</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select class="js-example-basic-single custom-select" id="id_unit" name="id_unit">
                                <option value="<?= set_value('id_unit'); ?>" selected disabled>Choose Unit</option>
                                <?php foreach ($unit as $u) : ?>
                                    <option value="<?= $u['id_unit'] ?>"><?= $u['unit'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_unit', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>


                    

                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

                <script type="text/javascript">
                    <?php echo $jsArray;  ?>
                    function changeValue(id){
                    document.getElementById('krite').value = JD[id].satu;
                    };
                </script>