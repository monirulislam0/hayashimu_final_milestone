<?php

namespace App\Http\Livewire\Login;

use App\Trait\CartTrait;
use Livewire\Component;

class Form extends Component
{
    use CartTrait;
    public $step=1;
    public $mobile_no;
    public $otp;
    public $pin;
    public $errorMessage;
    public $previous_url;


    public function mount($previous_url){
        $this->previous_url = $previous_url;
    }
    public function submit_mobile(){
        $this->validate([
            'mobile_no'=>'required|numeric|digits:11'
        ]);
        $this->pin = $this->getOtp();
        $this->sms_send($this->mobile_no,$this->pin);
        $this->step = 2;
    }

    public function submit_otp(){
        $this->validate([
            'otp'=>'required|numeric|digits:6'
        ]);
        if($this->otp==$this->pin){
            $this->loginById($this->mobile_no);
            return redirect($this->previous_url);
        }else{
            $this->errorMessage = 'Invalid OTP';
        }

    }

    public function getOtp(){
        $otp = rand(100000,999999);
        return $otp;
    }
    function sms_send($mobile,$otp) {
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "MNpPd2nvxku543uATbAe";
        $senderid = "8809617611759";
        $number = "88$mobile";
        $message = "Your login OTP is: $otp";

        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    public function render()
    {
        return view('livewire.login.form');
    }
}
