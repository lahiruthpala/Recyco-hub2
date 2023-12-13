<?php
class collector extends Controller
{

    function index()
    {
        $pickup = $this->load_model('PickUpRequestModel');
        $pickup = $pickup->where("Collector_ID", "25435");

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
        $data = $user->first('pickupId', $id);
        $this->view('Collector/new', ['pickup' => $data]);
    }
    public function inventory()
    {
        $pickup = $this->load_model('RawInvnetoryModel');
        $pickup = $pickup->where("collectorId", "25435");

        $this->view('Collector/inventory', ['rows' => $pickup]);
    }



    function declination()
    {
        $this->view('declination');
    }

    function pendingpickups()
    {
        $inventory = $this->load_model('PickUpRequestModel');
        $data = $inventory->where('Status', 'Pending');
        $this->view('Colletor/PendingRequestTable', ['rows' => $data]);
    }

    function jobs($id, $type)
    {
        $pickup = $this->load_model('PickUpRequestModel');
        $completionDate = $_POST['completion_date'] ?? date('Y-m-d');
        // Auth::getCollector_ID
        $arr = [];
        $arr['Status'] = $type . 'ed';
        $arr['Completeddate'] = $completionDate;
        $data = $pickup->Update($id, $arr, "pickupId");
        $this->index();
    }
    function inven($id, $type)
    {
        $in = $this->load_model('RawInvnetoryModel');

        $arr = [];
        $arr['Inventorystatus'] = $type;

        $data = $in->Update($id, $arr, "InventoryId");
        $this->inventory();
        $data = $in->first('pickupId', $id);
        $this->view('pickup details', ['pickup' => $data]);
    }

    function confirmation()
    {
        $this->view('confirmation');
    }
}
