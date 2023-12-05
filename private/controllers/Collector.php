<?php
class collector extends Controller
{
    function index()
    {
        $this->view('Collector');
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
        $this->view('pickup details', ['pickup' => $data]);
    }
    function confirmation()
    {
        $this->view('confirmation');
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
}
