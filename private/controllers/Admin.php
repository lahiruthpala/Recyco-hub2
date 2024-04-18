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
            require_once (APP_ROOT . "/controllers/FileManager.php");
            $file = new FileManager();
            if (!empty($_FILES['profileImage']['name'])) { //checking for a file upload
                if ($_FILES['profileImage']['error'] == 0) {
                    $_POST['pwd'] = random_string(8);
                    $_POST['Email'] = $_POST['OfficialMail'];
                    $_POST['Phone'] = $_POST['OfficialNumber'];
                    $_POST['UserName'] = $_POST['FirstName'];
                    $_POST['Status'] = "Pending";
                    if (!isset($_POST['Address'])) {
                        $_POST['Address'] = "Colombo Sorting Center";
                    }
                    $_POST['Creator_ID'] = Auth::getUser_ID();
                    if ($user->where('Email', $_POST['Email'])) {
                        message(['Email already exists', 'error']);
                    } elseif ($user->where('Phone', $_POST['Phone'])) {
                        message(['Phone number already exists', 'error']);
                    } else {
                        $verifyData = $verify->insert($_POST);
                        $_POST['pwd'] = $verifyData['pwd'];
                        $UserData = $user->insert($_POST);
                        if ($_POST['Role']) {
                            $_POST['User_ID'] = $UserData['User_ID'];
                            $_POST['Collector_ID'] = $UserData['User_ID'];
                            $_POST['sector_ID'] = $this->load_model('Sectors')->first('SectorName', $_POST['SectorName'])->sector_ID;
                            $collector = $this->load_model('CollectorModel');
                            $collector->insert($_POST);
                        }
                        if ($UserData) { //successful insertion
                            $folder = APP_ROOT . "/Uploads/ProfilePIC/";
                            $_FILES['profileImage']['name'] = $UserData['User_ID'];
                            $destination = $file->uploadFile($_FILES['profileImage'], $folder);
                            message(['User Added successfully', 'success']);
                            $this->redirect('Admin/AccountManagement');
                        } else { //didnt inserted to db
                            message(['Error occurred ! Try again', "error"]);
                            $this->redirect('Admin/AccountManagement');
                        }
                    }
                } else {
                    message(["Couldn't upload the file", 'error']);
                    $this->redirect('Admin/AccountManagement');
                }
            }
        }
        $sectors = $this->load_model('Sectors');
        $sectors = $sectors->query("SELECT * FROM sectors;");
        $this->view("Admin/NewAccountCreation", ['sectors' => $sectors]);
    }

    function showAllMachines()
    {
        $machine = $this->load_model("MachineModel");
        $data = $machine->findAll(1, 10, "Machine_ID");
        $this->view("Admin/SortingCenter/MachineTable", ['rows' => $data]);
    }

    function AddMachine()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['Action'] == 'Edit') {
                $machine = $this->load_model('MachineModel');
                $machine->update($_POST['Machine_ID'], $_POST, 'Machine_ID');
                message(['Machine Updated successfully', 'success']);
                $this->redirect('Admin/SortingCenter');
                return;
            } else {
                $machine = $this->load_model('MachineModel');
                $machine->insert($_POST);
                message(['Machine Added successfully', 'success']);
                $this->redirect('Admin/SortingCenter');
                return;
            }
        }
        $watetype = $this->load_model("WasteType");
        $waste = $watetype->findAll(1, 10, "Waste_ID");
        $this->view("Admin/SortingCenter/AddNewMachine", ['waste' => $waste]);
    }

    function SortingCenterInfo()
    {
        $machine = $this->load_model("SortingCenter");
        $data = $machine->findAll(1, 10, "SortingCenter_ID")[0];
        $this->view("Admin/SortingCenter/SortingCenterInfo", ['row' => $data]);
    }
    function Automation()
    {
        $machine = $this->load_model("AutomationModel");
        $data = $machine->findAll(1, 10, "Automation_ID");
        foreach ($data as $key => $value) {
            if ($data[$key]->day_of_the_week != '*') {
                $data[$key]->Repeat = 'Weekly';
            }
            if ($data[$key]->day_of_the_month != '*') {
                $data[$key]->Repeat = 'Monthly';
            }
            if ($data[$key]->month != '*') {
                $data[$key]->Repeat = 'Yearly';
            }
            if ($data[$key]->day_of_the_week == '*' && $data[$key]->day_of_the_month == '*') {
                $data[$key]->Repeat = 'Daily';
            }
        }
        $this->view("Admin/SortingCenter/Automation", ['rows' => $data]);
    }

    function UpdateAutomation($id)
    {
        $machine = $this->load_model('AutomationModel');
        $data = $machine->first('Automation_ID', $id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['Creator_ID'] = Auth::getUser_ID();
            $_POST['Status'] = 'Active';
            $Code = $_POST['min'] . ' ' . $_POST['hour'] . ' ' . $_POST['day_of_the_month'] . ' ' . $_POST['month'] . ' ' . $_POST['day_of_the_week'] . ' ' . $data->Code;
            $temp = "sudo crontab -l | grep -v \"" . $data->Code . "\" | crontab -";
            $output1 = shell_exec($temp);
            $temp2 = "(crontab -l; echo \"" . $Code . "\") | crontab -";
            $output2 = shell_exec($temp2);
            $machine->update($id, $_POST, 'Automation_ID');
            message(['Automation Updated successfully', 'success']);
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
        $this->view("Admin/SortingCenter/UpdateAutomation", ['data' => $data]);
    }

    function MachineRemove($id)
    {
        $machine = $this->load_model('MachineModel');
        $machine->delete($id, 'Machine_ID');
        message(['Machine Removed successfully', 'success']);
        $this->redirect('Admin/SortingCenter');
    }

    function WasteType()
    {
        $waste = $this->load_model("WasteType");
        $data = $waste->findAll(1, 10, "Waste_ID");
        $this->view("Admin/SortingCenter/WasteTypesTable", ['rows' => $data]);
    }

    function NewWasteTypeCreation()
    {
        $waste = $this->load_model('WasteType');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['Action'] == 'Edit') {
                $waste->update($_POST['Waste_ID'], $_POST, 'Waste_ID');
                message(['Waste Type successfully Edited', 'success']);
                $this->redirect('Admin/SortingCenter');
                return;
            } else {
                $temp = $waste->first('Name', $_POST['Name']);
                if (!empty($temp)) {
                    message(['Waste Type already exists', 'error']);
                    $this->redirect('Admin/SortingCenter');
                    return;
                }
                $waste = $waste->insert($_POST);
                //require_once (APP_ROOT . "/controllers/FileManager.php");
                //$file = new FileManager();
                //$folder = ROOT . "images/WasteTypes/";
                //$_FILES['profileImage']['name'] = $waste['Waste_ID'];
                //$destination = $file->uploadFile($_FILES['profileImage'], $folder, $waste['Waste_ID']);
                message(['Waste Type Added successfully', 'success']);
                $this->redirect('Admin/SortingCenter');
            }
        }
        $this->view("Admin/SortingCenter/NewWasteType");
    }

    function WasteTypeDelete($Waste_ID)
    {
        $waste = $this->load_model('WasteType');
        $waste->delete($Waste_ID, 'Waste_ID');
        message(['Waste Type Removed successfully', 'success']);
        $this->redirect('Admin/SortingCenter');
    }

    function WasteTypeEdit($Waste_ID)
    {
        $waste = $this->load_model('WasteType');
        $data = $waste->first('Waste_ID', $Waste_ID);
        $data->Action = 'Edit';
        echo json_encode($data);
    }

    function MachineEdit($Machine_ID)
    {
        $machine = $this->load_model('MachineModel');
        $data = $machine->first('Machine_ID', $Machine_ID);
        $data->Action = 'Edit';
        unset($data->Is_Sorting);
        unset($data->Next_Service);
        echo json_encode($data);
    }

    function SectorsView()
    {
        $sectors = $this->load_model("Sectors");
        $data = $sectors->query("SELECT S.sector_ID,S.SectorName,S.latitude,S.longitude,S.radius,COALESCE(GROUP_CONCAT(C.Collector_ID  ORDER BY C.Collector_ID  ASC SEPARATOR ','), '') AS Collector_ID FROM sectors S Left JOIN collector_details C ON C.sector_ID=S.sector_ID GROUP BY S.sector_ID;");
        $this->view("Admin/SortingCenter/Sectors", ['rows' => $data]);
    }

    function AddNewSectors()
    {
        $sectors = $this->load_model('Sectors');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sectors->insert($_POST);
            message(['Sector Added successfully', 'success']);
            $this->redirect('Admin/SortingCenter');
            return;
        }
        $data = $sectors->query("SELECT * FROM sectors;");
        $this->view("Admin/SortingCenter/NewSector", ['data' => $data]);
    }

    function profile($id)
    {
        // code...

        $collector = $this->load_model('CollectorModel');
        $user = $this->load_model('User');
        $user = $user->first("User_ID", $id);
        // Auth::getCollector_ID
        $data = $collector->first("Collector_ID", $id);
        $data->firstname = $user->FirstName;
        $data->lastname = $user->LastName;
        $data->Phone = $user->Phone;
        $data->Email = $user->Email;
        $data->Address = $user->Address;
        $this->view('Collector/profile', ['row' => $data]);

    }
}
?>