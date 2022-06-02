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

                            <?= $this->session->set_flashdata('message'); ?>
                            <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Input Account User
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('menu/usermanagement') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <label class="col-md-3 text-md-right" for="image">Image</label>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-3">
                                <img src="<?= base_url() ?>assets/img/profile/<?= $user['image']; ?>" alt="<?= $user['name']; ?>" class="rounded-circle shadow-sm img-thumbnail">
                            </div>
                            <div class="col-9">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="btn btn-outline-primary" for="image">Photo Profile</label>
                                <?= form_error('image', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="id_employee">NIP</label>
                    <div class="col-md-6">
                        <div class="input-group">
                        <select class="js-example-basic-single custom-select" id="id_employee" onChange="changeValue(this.value)" name="id_employee">
                                <option value="<?= set_value('nama'); ?>" selected disabled>Choose ID Employe</option>
                                <?php 
                                    $jsArray = "var JD = new Array();\n";
                                    foreach ($user as $ep){
                                        echo '<option value="'.$ep['id_employee'].'">'.$ep['id_employee'].'</option>';
                                        $jsArray .= "JD['".$ep['id_employee']."']={satu:'".addslashes($ep['nama'])."'};\n";
                                    }
                                ?>
                                </select>
                        </div>
                        <?= form_error('id_employee', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="name">Name</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input name="name" readonly id="krite" type="text" class="form-control" readonly>
                        </div>
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="email">Email</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input value="<?= set_value('email'); ?>" name="email" id="email" type="text" class="form-control">
                            </div>
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="password">Password</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input value="<?= set_value('password'); ?>" name="password" id="password" type="password" autocomplete = "new-password" class="form-control">
                            </div>
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_role_admin">Role</label>
                    <div class="col-md-6">
                        <div class="custom-control custom-radio">
                            <input <?= set_radio('id_role_admin', 3); ?> value=3 type="radio" id=3 name="id_role_admin" class="custom-control-input">
                            <label class="custom-control-label" for=3>Admin</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= set_radio('id_role_admin', 2); ?> value=2 type="radio" id=2 name="id_role_admin" class="custom-control-input">
                            <label class="custom-control-label" for=2>User</label>
                        </div>
                        <?= form_error('id_role_admin', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <br>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
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