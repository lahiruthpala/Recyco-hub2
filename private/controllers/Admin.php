<?php
class Admin extends Controller
{
    function __construct()
    {
        $this->verify();
    }

    function verify()
    {
        if (Auth::getRole() == "Admin") {
            return true;
        } else {
            $this->redirect('login');
        }
    }

    function index()
    {
        $this->view('Admin/AccountManagement');
    }

    function AccountManagement()
    {
        $this->view('Admin/AccountManagement');
    }

    function SortingCenter()
    {
        $this->view('Admin/SortingCenter');
    }

    function GetAccountinfo()
    {
        $user = $this->load_model('User');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $where = "Select User_ID, FirstName, LastName, Role, Status  FROM reg_users where Role != 'Admin' ";
            foreach ($_POST as $key => $value) {
                if ($value == 'ALL') {
                    continue;
                }
                if ($key == 'Name') {
                    if ($value == '') {
                        continue;
                    }
                    $where .= "AND (FirstName = '" . $value . "' OR LastName = '" . $value . "')";
                    continue;
                }
                $where .= "AND " . $key . " = '" . $value . "' ";
            }
            $data = $user->query($where);
        } else {
            $data = $user->query("Select User_ID, FirstName, LastName, Role, Status  FROM reg_users where Role != 'Admin'");
        }
        $this->view("Admin/UserAccounts", ['rows' => $data]);
    }

    function AccountCreation()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = array();
            $user = $this->load_model('User');
            $verify = $this->load_model('Verify');
            require_once(APP_ROOT . "/controllers/FileManager.php");
            $file = new FileManager();
            if (!empty($_FILES['profileImage']['name'])) { //checking for a file upload
                if ($_FILES['profileImage']['error'] == 0) {
                    $_POST['pwd'] = random_string(8);
                    $_POST['Email'] = $_POST['OfficialMail'];
                    $_POST['Phone'] = $_POST['OfficialNumber'];
                    $_POST['UserName'] = $_POST['FirstName'];
                    $_POST['Status'] = "Pending";
                    if(!isset($_POST['Address'])){
                        $_POST['Address'] = "Colombo Sorting Center";
                    }
                    $_POST['Creator_ID'] = Auth::getUser_ID();
                    if($user->where('Email',$_POST['Email'])){
                        message(['Email already exists','error']);
                    }
                    elseif($user->where('Phone',$_POST['Phone'])) {
                        message(['Phone number already exists','error']);
                    }
                    else{
                        $verifyData = $verify->insert($_POST);
                        $_POST['pwd'] = $verifyData['pwd'];
                        $UserData = $user->insert($_POST);
                        if ($UserData) { //successful insertion
                            $folder = APP_ROOT . "/Uploads/ProfilePIC/";
                            $_FILES['profileImage']['name'] = $UserData['User_ID'];

                            $destination = $file->uploadFile($_FILES['profileImage'], $folder);
                            message(['User Added successfully','success']);
                            $this->redirect('Admin/AccountManagement');
                        } else { //didnt inserted to db
                            message(['Error occurred ! Try again', "error"]);
                            $this->redirect('Admin/AccountManagement');
                        }
                    }
                } else {
                    message(["Couldn't upload the file",'error']);
                    $this->redirect('Admin/AccountManagement');
                }
            }
        }
        $this->redirect('Admin/AccountManagement');
    }

    function showAllMachines(){
        $machine = $this->load_model("MachineModel");
        $data = $machine->findAll(1,10,"Machine_ID");
        $this->view("Admin/SortingCenter/MachineTable", ['rows'=>$data]);
    }

    function AddMachine()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $machine = $this->load_model('MachineModel');
            $machine->insert($_POST);
            message(['Machine Added successfully','success']);
            $this->redirect('Admin/SortingCenter');
        }
        $watetype = $this->load_model("WasteType");
        $waste = $watetype->findAll(1, 10, "Waste_ID");
        $this->view("Admin/SortingCenter/AddNewMachine", ['waste' => $waste]);
    }

    function SortingCenterInfo(){
        $machine = $this->load_model("SortingCenter");
        $data = $machine->findAll(1,10,"SortingCenter_ID")[0];
        $this->view("Admin/SortingCenter/SortingCenterInfo", ['row'=>$data]);
    }
    function Automation(){
        $machine = $this->load_model("AutomationModel");
        $data = $machine->findAll(1,10,"Automation_ID");
        foreach($data as $key=>$value){
            if($data[$key]->day_of_the_week != '*'){
                $data[$key]->Repeat = 'Weekly';
            }
            if($data[$key]->day_of_the_month != '*'){
                $data[$key]->Repeat = 'Monthly';
            }
            if($data[$key]->month != '*'){
                $data[$key]->Repeat = 'Yearly';
            }
            if($data[$key]->day_of_the_week == '*' && $data[$key]->day_of_the_month == '*'){
                $data[$key]->Repeat = 'Daily';
            }
        }
        $this->view("Admin/SortingCenter/Automation", ['rows'=>$data]);
    }

    function UpdateAutomation($id){
        $machine = $this->load_model('AutomationModel');
        $data = $machine->first('Automation_ID',$id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['Creator_ID'] = Auth::getUser_ID();
            $_POST['Status'] = 'Active';
            $Code = $_POST['min'] . ' ' . $_POST['hour'] . ' ' . $_POST['day_of_the_month'] . ' ' . $_POST['month'] . ' ' . $_POST['day_of_the_week'] . ' ' . $data->Code;
            shell_exec("crontab -l | grep -v \"". $data->Code ."\" | crontab -");
            shell_exec("(crontab -l; echo \"". $Code ."\") | crontab -");
            $machine->update($id,$_POST,'Automation_ID');
            message(['Automation Updated successfully','success']);
            $this->redirect('Admin/SortingCenter');
        }
        switch (true) {
            case $data->day_of_the_week != '*':
                $data->Repeat = 'Weekly';
                break;
            case $data->day_of_the_month != '*':
                $data->Repeat = 'Monthly';
                break;
            case $data->month != '*':
                $data->Repeat = 'Yearly';
                break;
            case $data->day_of_the_week == '*' && $data->day_of_the_month == '*':
                $data->Repeat = 'Daily';
                break;
        }
        $this->view("Admin/SortingCenter/UpdateAutomation", ['data'=>$data]);
    }

    function SectorsView(){
        $sectors = $this->load_model("Sectors");
        $data = $sectors->query("SELECT S.sector_ID,S.SectorName,S.latitude,S.longitude,S.radius,COALESCE(GROUP_CONCAT(C.Collector_ID ORDER BY C.Collector_ID ASC SEPARATOR ','), '') AS Collector_ID FROM sectors S Left JOIN collector_details C ON C.sector_ID=S.sector_ID GROUP BY S.sector_ID;");
        $this->view("Admin/SortingCenter/Sectors", ['rows'=>$data]);
    }

    function NewSector(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sectors = $this->load_model('Sectors');
            $sectors->insert($_POST);
            message(['Sector Added successfully','success']);
            $this->redirect('Admin/SortingCenter');
        }
        $this->view("Admin/SortingCenter/NewSector");
    }

    function MachineRemove($id){
        $machine = $this->load_model('MachineModel');
        $machine->delete($id,'Machine_ID');
        message(['Machine Removed successfully','success']);
        $this->redirect('Admin/SortingCenter');
    }
}
?>