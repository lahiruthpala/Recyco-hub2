<?php
require "../private/controllers/mail.php";
class Verify extends Model
{
    protected $table = "verify";
    protected $beforeInsert = [
        'hashPassword',
        'GenerateOTP',
        'GenerateExpireTime',
        'SentMail'
    ];

    protected $allowedColumns = [
        'Email',
        'code',
        'expires',
        'pwd',
    ];

    public function GenerateOTP($data)
    {
        if(isset($data['Role']) && $data['Role'] != 'Customer'){
            $data['code'] = 'in'.random_string(8);
        }else{
            $data['code'] = random_string(10);
        }
        return $data;
    }

    public function GenerateExpireTime($data)
    {
        $data['expires'] = date('Y-m-d H:i:s', time() + (60 * 10));
        return $data;
    }

    public function SentMail($data)
    {
        if (isset($data['message'])) {
            $message = $data['message'];
        } else {
            if(isset($data['Role']) && $data['Role'] != "Customer"){
                $message = "Your verification link is http://localhost:8380/Recyco-hub2/public/login/" . $data['code']. " Your temporary password is " . $data['pwd'];
            }else{
                $message = "Your verification link is http://localhost:8380/Recyco-hub2/public/login/" . $data['code'];
            }
        }
        $subject = "Email verification";
        $recipient = $data['Email'];
        send_mail($recipient, $subject, $message);
        return $data;
    }
    public function validate($DATA)
    {
        // print_r($DATA);
        $this->errors = array();
        if ($DATA['pwd1'] != $DATA['pwd2']) {
            $this->errors[] = 'Passwords do not match';
        }
        if (strlen($DATA['pwd1']) < 6) {
            $this->errors[] = 'Password must be at least 6 characters';
        }
        if ($this->where('Email', $DATA['Email'])) {
            $this->errors[] = 'Email already exists';
        }
        if ($this->where('UserName', $DATA['UserName'])) {
            $this->errors[] = 'Username already exists';
        }
        if (count($this->errors) == 0) {
            return true;
        }
        return false;
    }
    public function hashPassword($data)
    {
        $data['pwd'] = password_hash($data['pwd'], PASSWORD_DEFAULT);
        return $data;
    }
}