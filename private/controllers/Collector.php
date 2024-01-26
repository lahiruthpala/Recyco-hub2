<?php
class collector extends Controller
{

    
	function index()
	{
		// code...
        $pickup = $this->load_model('PickupModel');
       
        // Auth::getCollector_ID
        $pickup = $pickup->where("collectorId", "25435");
        $this->view('Collector/collector', ['rows' => $pickup]);
    }


    function table()
    {
        $user = $this->load_model('PickUpRequestModel');
        $data = $user->findAll();
        $this->view('pickup_table', ['rows' => $data]);
    }

    function details($id)
    {
        $user = $this->load_model('PickUpRequestModel');
		$data = $user->where('pickupId', $id);
        $this->view('Collector/new', ['rows'=>$data]);
		
    }
    

    public function inventory()
    {
        $pickup = $this->load_model('RawInvnetoryModel');
        $pickup = $pickup->where("collectorId", "25435");
       
       
        $this->view('Collector/inventory', ['rows' => $pickup]);
    }


    function jobs($id, $type,$pid){
        $pickup = $this->load_model('PickUpRequestModel');
        
       

    // Get pickup requests with the specified ID
    
      
        // Auth::getCollector_ID
        $arr = [];
        $arr['jobstatus'] = $type;

        $data = $pickup->Update($id, $arr, "InventoryId");
        $this->details($pid);
       
    
    }

    function statusupdate($id, $type){
        $pickup = $this->load_model('PickupModel');

        $arr = [];
        $arr['Status'] = $type;

        $data = $pickup->Update($id, $arr, "pickupId");
        $this->index();

    }
        
    function start($id)
    {
        // Code...
        $user = $this->load_model('PickUpRequestModel');
        $data = $user->where('pickupId', $id);

        $this->view('Collector/inventory', ['rows' => $data]);
    }

    function inven($id, $type, $pid)
    {
        $in = $this->load_model('PickUpRequestModel');

        $arr = [];

        $arr['jobstatus'] = $type;

        $data = $in->Update($id, $arr, "InventoryId");
        $this->start($pid);

    }
    function store($id, $type, $pid)
    {
        $in = $this->load_model('PickUpRequestModel');

        $arr = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming you have the relevant validation and sanitation in place
            $wasteType = $_POST['wasteType'] ?? '';
            $weight = $_POST['weight'] ?? '';
            $InventoryId = $_POST['InventoryId'] ?? '';

            // Update the database using the form values
            $arr = [
                'jobstatus' => $type,
                'waste_type' => $wasteType,
                'weight' => $weight,
                'InventoryId' => $InventoryId
            ];



            $data = $in->Update($id, $arr, "InventoryId");
            $this->details($pid);

        }
    }
    function form($id)
    {
        $user = $this->load_model('PickUpRequestModel');
        $data = $user->first('InventoryId', $id);
        $this->view('Collector/form', ['data' => $data]);
    }

    function profile()
	{
		// code...
    
        $collector = $this->load_model('CollectorModel');
       
        // Auth::getCollector_ID
        $data = $collector->first("collectorId", "25435");
        $this->view('Collector/profile', ['row' => $data]);
       
    
		
	}
    function profileedit($cId)
	{
		// code...
    
        $collector = $this->load_model('CollectorModel');
       
        // Auth::getCollector_ID
        $data = $collector->first("collectorId", $cId);
        $this->view('Collector/profile_edit', ['data' => $data]);
       
    
		
	}
    
    public function updateProfile($id) {

        $in = $this->load_model('CollectorModel');

        $arr = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $firstName = $_POST['fname'] ?? '';
            $lastName = $_POST['lname'] ?? '';
            $email= $_POST['email'] ?? '';
            $contactNo = $_POST['contactNo'] ?? '';
            $address= $_POST['address'] ?? '';
            $vehicleNo= $_POST['vehicleNo'] ?? '';
         
            $arr = [
                'firstname' => $firstName,
                'lastname' => $lastName,
                'email' => $email,
                'contactNo' => $contactNo,
                'address' => $address,
                'vehicleNo' => $vehicleNo


            ];


           
            $data = $in->Update($id, $arr, "collectorId");

           $this->profile();
           
        }
    }

	function sendReminders(){
        
    }

  
}
