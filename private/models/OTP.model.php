<?php
class OTP extends Model
{
    protected $table = "otp";
    protected $beforeInsert = [
        'GetUserID',
        'GenerateOTP',
        'GenerateExpireTime',
        'SentOTP'
    ];

    protected $allowedColumns = [
        'User_ID',
        'OTP',
        'expires',
    ];

    public function GenerateOTP($data)
    {
        $data['OTP'] = rand(100000, 999999);
        return $data;
    }

    public function GenerateExpireTime($data)
    {
        $data['expires'] = date('Y-m-d H:i:s', time() + (60 * 10));
        return $data;
    }

    public function GetUserID($data)
    {
        $data['User_ID'] = Auth::getUser_ID();
        return $data;
    }
    public function SentOTP($data)
    {
        $user = "94718696971";
        $password = "8915";
        $text = urlencode("Hello {$data['firstName']} \n Thanks for Joining RecycoHUB OTP is {$data['OTP']}");
        $to = "94".$data['phone'];

        $baseurl = "http://www.textit.biz/sendmsg";
        $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
        $ret = file($url);

        $res = explode(":", $ret[0]);

        if (trim($res[0]) == "OK") {
            echo "Message Sent - ID : " . $res[1];
        } else {
            echo "Sent Failed - Error : " . $res[1];
        }
        return($data);
    }
    public function validate($data)
    {
        $this->errors = array();
        if (strlen($data['phone']) != 9) {
            $this->errors[] = 'Invalied phone number';
        }
        if (count($this->errors) == 0) {
            return true;
        }
        return false;
    }
}