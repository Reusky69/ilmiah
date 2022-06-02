<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller
{
    public function company_excel()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['company'] = $this->admin->get_company();
        $data['admin'] = $this->db->get('company')->result('array');


        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Rajawali Nusantara Indonesia");
        $object->getProperties()->setLastModifiedBy("Rajawali Nusantara Indonesia");
        $object->getProperties()->setTitle("Company");

        $object->getActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Company Name');
        $object->getActiveSheet()->setCellValue('C1', 'Address');
        
        $baris = 2;
        
        foreach ($data['company'] as $c) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $c['id_company'])
                                    ->setCellValue('B'.$baris, $c['company_name'] )
                                    ->setCellValue('C'.$baris, $c['alamat'] );
            
            $baris++;
            
        }
        
        $filename="Company List".'.xlsx';

        $object->getActiveSheet()->setTitle("Company List");

        header('Content-Type: application/vnd.opnxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
    public function directorate_excel()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        // $data['directorate'] = $this->admin->getDataDirectorate();
        $data['admin'] = $this->db->get('directorate')->result('array');
        $query = $this->db->query("SELECT directorate.*,company.* FROM directorate JOIN company ON directorate.id_company = company.id_company")->result_array();
        $data['directorat'] = $query;
       


        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Rajawali Nusantara Indonesia");
        $object->getProperties()->setLastModifiedBy("Rajawali Nusantara Indonesia");
        $object->getProperties()->setTitle("Directorate List");

        $object->getActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Directorate Name');
        $object->getActiveSheet()->setCellValue('C1', 'Company Name');
        
        $baris = 2;
        
        foreach ($data['directorat'] as $c) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $c['id_directorate'])
                                    ->setCellValue('B'.$baris, $c['directorate_name'] )
                                    ->setCellValue('C'.$baris, $c['company_name'] );
            
            $baris++;
            
        }
        
        $filename="Directorate List".'.xlsx';

        $object->getActiveSheet()->setTitle("Directorate List");

        header('Content-Type: application/vnd.opnxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
    public function division_excel()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        // $data['division'] = $this->admin->getDataDivision();
        $data['admin'] = $this->db->get('division')->result('array');
        $query = $this->db->query("SELECT division.*,directorate.* FROM division JOIN directorate ON division.id_directorate = directorate.id_directorate")->result_array();
        $data['division'] = $query;


        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Rajawali Nusantara Indonesia");
        $object->getProperties()->setLastModifiedBy("Rajawali Nusantara Indonesia");
        $object->getProperties()->setTitle("Division List");

        $object->getActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Division Name');
        $object->getActiveSheet()->setCellValue('C1', 'Directorate Name');
        
        $baris = 2;
        
        foreach ($data['division'] as $c) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $c['id_division'])
                                    ->setCellValue('B'.$baris, $c['division_name'] )
                                    ->setCellValue('C'.$baris, $c['directorate_name'] );
            
            $baris++;
            
        }
        
        $filename="Division List".'.xlsx';

        $object->getActiveSheet()->setTitle("Division List");

        header('Content-Type: application/vnd.opnxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
    public function subdivision_excel()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        // $data['sub_division'] = $this->admin->getDataSubDivision();
        $data['admin'] = $this->db->get('sub_division')->result('array');
        $query = $this->db->query("SELECT sub_division.*,division.* FROM sub_division JOIN division ON sub_division.id_division = division.id_division")->result_array();
        $data['sub_division'] = $query;


        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Rajawali Nusantara Indonesia");
        $object->getProperties()->setLastModifiedBy("Rajawali Nusantara Indonesia");
        $object->getProperties()->setTitle("Subdivision List");

        $object->getActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Subdivision Name');
        $object->getActiveSheet()->setCellValue('C1', 'Division Name');
        
        $baris = 2;
        
        foreach ($data['sub_division'] as $c) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $c['id_subdivision'])
                                    ->setCellValue('B'.$baris, $c['subdivision_name'] )
                                    ->setCellValue('C'.$baris, $c['division_name'] );
            
            $baris++;
            
        }
        
        $filename="Sub Division List".'.xlsx';

        $object->getActiveSheet()->setTitle("Sub Division List");

        header('Content-Type: application/vnd.opnxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
    public function levelposition_excel()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['level'] = $this->admin->get_level();
        $data['admin'] = $this->db->get('level_position')->result('array');


        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Rajawali Nusantara Indonesia");
        $object->getProperties()->setLastModifiedBy("Rajawali Nusantara Indonesia");
        $object->getProperties()->setTitle("Level Position List");

        $object->getActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Level Position');
        
        $baris = 2;
        
        foreach ($data['level'] as $c) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $c['id_level'])
                                    ->setCellValue('B'.$baris, $c['level_name'] );
            
            $baris++;
            
        }
        
        $filename="Level Position List".'.xlsx';

        $object->getActiveSheet()->setTitle("Level Position List");

        header('Content-Type: application/vnd.opnxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function jobposition_excel()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        // $data['job_position'] = $this->admin->get_job();
        $data['admin'] = $this->db->get('job_position')->result('array');
        $query = $this->db->query("SELECT job_position.*,level_position.* FROM job_position JOIN level_position ON job_position.id_level = level_position.id_level")->result_array();
        $data['job_position'] = $query;


        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Rajawali Nusantara Indonesia");
        $object->getProperties()->setLastModifiedBy("Rajawali Nusantara Indonesia");
        $object->getProperties()->setTitle("Job Position List");

        $object->getActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Job Position Name');
        $object->getActiveSheet()->setCellValue('C1', 'Level Position Name');
        
        $baris = 2;
        
        foreach ($data['job_position'] as $c) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $c['id_job'])
                                    ->setCellValue('B'.$baris, $c['job_name'] )
                                    ->setCellValue('C'.$baris, $c['level_name'] );
            
            $baris++;
            
        }
        
        $filename="Job Position List".'.xlsx';

        $object->getActiveSheet()->setTitle("Job Position List");

        header('Content-Type: application/vnd.opnxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
    public function consollevel_excel()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['consollevel'] = $this->admin->get_consol();
        $data['admin'] = $this->db->get('consol_level')->result('array');


        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Rajawali Nusantara Indonesia");
        $object->getProperties()->setLastModifiedBy("Rajawali Nusantara Indonesia");
        $object->getProperties()->setTitle("Console Level List");

        $object->getActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Console Level');
        
        $baris = 2;
        
        foreach ($data['consollevel'] as $c) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $c['id_consol'])
                                    ->setCellValue('B'.$baris, $c['consol_name'] );
            
            $baris++;
            
        }
        
        $filename="Console Level List".'.xlsx';

        $object->getActiveSheet()->setTitle("Console Level List");

        header('Content-Type: application/vnd.opnxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
    public function positionstatus_excel()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['status_jabatan'] = $this->admin->get_status_jabatan();
        $data['admin'] = $this->db->get('status_jabatan')->result('array');


        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Rajawali Nusantara Indonesia");
        $object->getProperties()->setLastModifiedBy("Rajawali Nusantara Indonesia");
        $object->getProperties()->setTitle("Position Status List");

        $object->getActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Position Status');
        
        $baris = 2;
        
        foreach ($data['status_jabatan'] as $c) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $c['id_status_jabatan'])
                                    ->setCellValue('B'.$baris, $c['status_jabatan_name'] );
            
            $baris++;
            
        }
        
        $filename="Position Status List".'.xlsx';

        $object->getActiveSheet()->setTitle("Position Status List");

        header('Content-Type: application/vnd.opnxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
    public function gradelevel_excel()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['grade'] = $this->admin->get_gradelevel();
        $data['admin'] = $this->db->get('grade_level')->result('array');


        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Rajawali Nusantara Indonesia");
        $object->getProperties()->setLastModifiedBy("Rajawali Nusantara Indonesia");
        $object->getProperties()->setTitle("Grade Level List");

        $object->getActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Grade Level');
        
        $baris = 2;
        
        foreach ($data['grade'] as $c) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $c['id_grade'])
                                    ->setCellValue('B'.$baris, $c['grade_level'] );
            
            $baris++;
            
        }
        
        $filename="Grade Level List".'.xlsx';

        $object->getActiveSheet()->setTitle("Grade Level List");

        header('Content-Type: application/vnd.opnxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function unit_excel()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['admin'] = $this->db->get('unit')->result('array');
        $query = $this->db->query("SELECT unit.*,company.* FROM unit JOIN company ON unit.id_company = company.id_company")->result_array();
        $data['unit'] = $query;
       


        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Rajawali Nusantara Indonesia");
        $object->getProperties()->setLastModifiedBy("Rajawali Nusantara Indonesia");
        $object->getProperties()->setTitle("Unit List");

        $object->getActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'unit Name');
        $object->getActiveSheet()->setCellValue('C1', 'Company Name');
        
        $baris = 2;
        
        foreach ($data['unit'] as $c) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $c['id_unit'])
                                    ->setCellValue('B'.$baris, $c['unit'] )
                                    ->setCellValue('C'.$baris, $c['company_name'] );
            
            $baris++;
            
        }
        
        $filename="Unit List".'.xlsx';

        $object->getActiveSheet()->setTitle("Unit List");

        header('Content-Type: application/vnd.opnxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }


    public function employeeprofile_excel()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        // $data['employeeprofile'] = $this->admin->getDataEmployeeProfile();
        $data['admin'] = $this->db->get('user')->result('array');
        $query = $this->db->query("SELECT user.*,agama.* ,gender.*
        FROM user 
        JOIN agama ON user.id_agama = agama.id_agama
        JOIN gender ON user.id_gender = gender.id_gender
        ")->result_array();
        $data['user'] = $query;


        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Rajawali Nusantara Indonesia");
        $object->getProperties()->setLastModifiedBy("Rajawali Nusantara Indonesia");
        $object->getProperties()->setTitle("Employeeprofile List");

        $object->getActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NIP');
        $object->getActiveSheet()->setCellValue('B1', 'Nama');
        $object->getActiveSheet()->setCellValue('C1', 'HP');
        $object->getActiveSheet()->setCellValue('D1', 'Email');
        $object->getActiveSheet()->setCellValue('E1', 'NIK');
        $object->getActiveSheet()->setCellValue('F1', 'No KTP');
        $object->getActiveSheet()->setCellValue('G1', 'Agama');
        $object->getActiveSheet()->setCellValue('H1', 'Tempat Lahir');
        $object->getActiveSheet()->setCellValue('I1', 'Tanggal Lahir');
        $object->getActiveSheet()->setCellValue('J1', 'Gender');
        $object->getActiveSheet()->setCellValue('K1', 'Alamat');
        $object->getActiveSheet()->setCellValue('L1', 'NPWP');
        $object->getActiveSheet()->setCellValue('M1', 'Tgl Masuk Kerja');
        $object->getActiveSheet()->setCellValue('N1', 'Tgl Pengangkatan');
        $object->getActiveSheet()->setCellValue('O1', 'Tgl Pensiun');
        
        $baris = 2;
        
        foreach ($data['user'] as $c) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $c['id_employee'])
                                    ->setCellValue('B'.$baris, $c['name'] )
                                    ->setCellValue('C'.$baris, $c['hp'] )
                                    ->setCellValue('D'.$baris, $c['email'] )
                                    ->setCellValue('E'.$baris, $c['nik'] )
                                    ->setCellValue('F'.$baris, $c['no_ktp'] )
                                    ->setCellValue('G'.$baris, $c['agama'] )
                                    ->setCellValue('H'.$baris, $c['tempat_lahir'] )
                                    ->setCellValue('I'.$baris, $c['tgl_lahir'] )
                                    ->setCellValue('J'.$baris, $c['gender'] )
                                    ->setCellValue('K'.$baris, $c['alamat'] )
                                    ->setCellValue('L'.$baris, $c['npwp'] )
                                    ->setCellValue('M'.$baris, $c['tgl_masuk_kerja'] )
                                    ->setCellValue('N'.$baris, $c['tgl_pengangkatan'] )
                                    ->setCellValue('O'.$baris, $c['tgl_pensiun'] );
            
            $baris++;
            
        }
        
        $filename="Employeeprofile List".'.xlsx';

        $object->getActiveSheet()->setTitle("Employeeprofile List");

        header('Content-Type: application/vnd.opnxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function employeeplacement_excel()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        // $data['employeeplacement'] = $this->admin->get_employeeplacement();
        $data['admin'] = $this->db->get('user')->result_array();
        $query = $this->db->query("SELECT user.*, company.*, directorate.*, division.*, sub_division.*, level_position.*, job_position.*, status_jabatan.*, statusemployee.*, grade_level.*, unit.*,consol_level.*
        FROM user 
        INNER JOIN company ON user.id_company = company.id_company
        INNER JOIN directorate ON user.id_directorate = directorate.id_directorate
        INNER JOIN division ON user.id_division = division.id_division
        INNER JOIN sub_division ON user.id_subdivision = sub_division.id_subdivision
        INNER JOIN level_position ON user.id_level = level_position.id_level
        INNER JOIN job_position ON user.id_job = job_position.id_job
        INNER JOIN status_jabatan ON user.id_status_jabatan = status_jabatan.id_status_jabatan
        INNER JOIN statusemployee ON user.id_status_employee = statusemployee.id_status_employee
        INNER JOIN grade_level ON user.id_grade = grade_level.id_grade
        INNER JOIN unit ON user.id_unit = unit.id_unit
        INNER JOIN consol_level ON user.id_consol = consol_level.id_consol
        ")->result_array();
        $data['user'] = $query;


        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Rajawali Nusantara Indonesia");
        $object->getProperties()->setLastModifiedBy("Rajawali Nusantara Indonesia");
        $object->getProperties()->setTitle("Employeeplacement List");

        $object->getActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NIP');
        $object->getActiveSheet()->setCellValue('B1', 'Name');
        $object->getActiveSheet()->setCellValue('C1', 'Company');
        $object->getActiveSheet()->setCellValue('D1', 'Directorate');
        $object->getActiveSheet()->setCellValue('E1', 'Division');
        $object->getActiveSheet()->setCellValue('F1', 'Subdivision');
        $object->getActiveSheet()->setCellValue('G1', 'Level Position');
        $object->getActiveSheet()->setCellValue('H1', 'Job Position');
        $object->getActiveSheet()->setCellValue('I1', 'Position Status');
        $object->getActiveSheet()->setCellValue('J1', 'Employee Status');
        $object->getActiveSheet()->setCellValue('K1', 'Grade Level');
        $object->getActiveSheet()->setCellValue('L1', 'Unit');
        $object->getActiveSheet()->setCellValue('M1', 'Console Level');
        
        $baris = 2;
        
        foreach ($data['user'] as $c) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $c['id_employee'])
                                    ->setCellValue('B'.$baris, $c['name'] )
                                    ->setCellValue('C'.$baris, $c['company_name'] )
                                    ->setCellValue('D'.$baris, $c['directorate_name'] )
                                    ->setCellValue('E'.$baris, $c['division_name'] )
                                    ->setCellValue('F'.$baris, $c['subdivision_name'] )
                                    ->setCellValue('G'.$baris, $c['level_name'] )
                                    ->setCellValue('H'.$baris, $c['job_name'] )
                                    ->setCellValue('I'.$baris, $c['status_jabatan_name'] )
                                    ->setCellValue('J'.$baris, $c['status_employee'] )
                                    ->setCellValue('K'.$baris, $c['grade_level'] )
                                    ->setCellValue('L'.$baris, $c['unit'] )
                                    ->setCellValue('M'.$baris, $c['consol_name'] );
            
            $baris++;
            
        }
        
        $filename="Employee Placement List".'.xlsx';

        $object->getActiveSheet()->setTitle("Employee Placement");

        header('Content-Type: application/vnd.opnxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }


    public function company_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $this->load->model('Admin_model', 'admin');
        $datacomp = $this->admin->get_company();
        $data = $this->load->view('pdf/comp', ['company' => $datacomp], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }
    public function directorate_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $this->load->model('Admin_model', 'admin');
        $datadir = $this->admin->get_direct();
        $data = $this->load->view('pdf/direct', ['directorate' => $datadir], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }
    public function division_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $this->load->model('Admin_model', 'admin');
        $datacomp = $this->admin->get_division();
        $data = $this->load->view('pdf/div', ['division' => $datacomp], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }
    public function subdivision_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $this->load->model('Admin_model', 'admin');
        $datacomp = $this->admin->get_subdivision();
        $data = $this->load->view('pdf/subdiv', ['sub_division' => $datacomp], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }
    public function levelposition_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $this->load->model('Admin_model', 'admin');
        $datacomp = $this->admin->get_level();
        $data = $this->load->view('pdf/levelposition', ['level_position' => $datacomp], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }
    public function jobposition_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $this->load->model('Admin_model', 'admin');
        $datacomp = $this->admin->get_job();
        $data = $this->load->view('pdf/jobposition', ['job_position' => $datacomp], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }
    public function consollevel_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $this->load->model('Admin_model', 'admin');
        $datacomp = $this->admin->get_consol();
        $data = $this->load->view('pdf/consollevel', ['consol_level' => $datacomp], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }
    public function positionstatus_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $this->load->model('Admin_model', 'admin');
        $datacomp = $this->admin->get_status_jabatan();
        $data = $this->load->view('pdf/positionstatus', ['status_jabatan' => $datacomp], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }
    public function gradelevel_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $this->load->model('Admin_model', 'admin');
        $datacomp = $this->admin->get_gradelevel();
        $data = $this->load->view('pdf/gradelevel', ['grade_level' => $datacomp], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }
    public function unit_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $this->load->model('Admin_model', 'admin');
        $datacomp = $this->admin->get_unit();
        $data = $this->load->view('pdf/unit', ['unit' => $datacomp], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }
}