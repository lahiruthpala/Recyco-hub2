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
        
        $pickUpModel = $this->load_model('PickupModel');
        $main = $pickUpModel->where('pickupId', $pid);

    // Get pickup requests with the specified ID
    $pickupRequests = $pickup->where('pickupId', $pid);
      
        // Auth::getCollector_ID
        $arr = [];
        $arr['jobstatus'] = $type;

        $data = $pickup->Update($id, $arr, "InventoryId");
        $allJobsPendingOrRejected = $pickup->areAllJobsPendingOrRejected($pid);
        $pickupJobStatus = '';    
        $allRejected = true;
        foreach ($pickupRequests as $request) {
            if ($request->jobstatus != 'Rejected') {
                $allRejected = false;
                break;
            }
        }
        
       $pickupJobStatus = ($allRejected) ? 'Rejected' :'Assigned';
       
        $array = [];
        $array['Status'] = $pickupJobStatus;
        // Update the status in the PickUpModel
        $pickUpModel->update($pid,$array,"pickupId");
       
        
    if ($allJobsPendingOrRejected) {
        // Load another view for the condition where all jobs are 'Pending' or 'Reject'
        $this->index(); 
    } else {
        // Load the regular details view
        $this->details($pid);
    }



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
            $this->start($pid);

        }
    }
    function form($id)
    {
        $user = $this->load_model('PickUpRequestModel');
        $data = $user->first('InventoryId', $id);
        $this->view('Collector/form', ['data' => $data]);
    }
  
}
