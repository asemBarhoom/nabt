<?php
/**
 * Created by PhpStorm.
 * User: Momen
 * Date: 11/23/16
 * Time: 5:56 PM
 */

namespace App\Http\Controllers;


use App\Models\AdminNotification;
use App\Models\Country;
use App\Models\DeviceKey;
use App\Models\GlobalNotification;
use App\Models\NotificationText;
use App\Models\Settings;
use App\Models\UserNotification;
use App\Models\WorkEvent;
use App\User;
use Barryvdh\TranslationManager\Models\Translation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Pusher\Pusher;
use Validator;

class ControllersService
{




    public static function generateArraySuccessResponse($objectsArray, $message_key="default_message",$has_more=null,$resultCode=200)
    {
        $text='';
        if(is_array($message_key)){
            $text=$message_key['text'];
            $message_key=$message_key['key'];
        }
        if (is_null($message_key)){
            return response()->json([
                'status' => true
            ], 200,[],JSON_UNESCAPED_SLASHES);
        }
        if(trans('api_texts.'.$message_key) == 'api_texts.'.$message_key){
            self::addToTrans($message_key);
        }
        $result=[
            'status' => true,
            'response_message' => trans('api_texts.'.$message_key,['text'=>$text])
        ];
        if(is_array($objectsArray)){
            $result=array_merge($result,$objectsArray);
        }else{
            $result['returned']=$objectsArray;
        }
        if(isset($has_more)){
            $result["has_more"]=$has_more;
        }

        return response()->json($result, $resultCode,[],JSON_UNESCAPED_SLASHES);

    }

    public static function generateGeneralResponse($status, $message_key="default_message",$data=null,$code=200)
    {
        $text='';
        if(is_array($message_key)){
            $text=$message_key['text'];
            $message_key=$message_key['key'];
        }
        if(trans('api_texts.'.$message_key) == 'api_texts.'.$message_key){
            self::addToTrans($message_key);
        }
        $result=[
            'status' => $status,
            'response_message' => trans('api_texts.'.$message_key,['text'=>$text])
        ];
        if(is_array($data)){
            $result=array_merge($result,$data);
        }else{
            $result['returned']=$data;
        }
        return response()->json($result, $code,[],JSON_UNESCAPED_SLASHES);
    }

    public static function isApiRoute(Request $request)
    {
         $route = count($request->all()) == 0  ?  null : $request->route()->getPrefix();
        if($route){
            if (str_contains($route, 'api')) {
                return true;
            } else {
                return false;
            }
        }

    }

    public static function changeUserKey($user_id, $device_key)
    {
        $d_key = null ;
//        if($user_id>0){
//            $user = User::find($user_id);
//            if ($user)
//            {
//                if($d_key=DeviceKey::where('d_key',$device_key)->first()){
//                    $d_key->user_id=$user_id;
//                    $d_key->save();
//                    DeviceKey::where('user_id', $d_key->user_id)->where('id','<>',$d_key->id)->update(['user_id'=>0]);
//                }else{
//                    $d_key = new DeviceKey();
//                    $d_key->d_key = $device_key;
//                    $d_key->user_id = $user_id;
//                    $d_key->save();
//                    $d_key = $d_key->refresh();
//
//                    DeviceKey::where('user_id', $d_key->user_id)->where('id','<>',$d_key->id)->update(['user_id'=>0]);
//
//                }
//                $user->device_key = $device_key;
//                $user->save();
//            }else
//                return false;
//
//
//        }else{

            $d_key = DeviceKey::query()->updateOrCreate([
                'd_key'=>$device_key,
            ],[
                'd_key'=>$device_key,
                'user_id'=>$user_id
            ]);

//            $d_key->refresh();

//        }


        return $d_key;
    }

    public static function regWorkEvent($title, $color)
    {
        $nn=new WorkEvent();
        $nn->title=$title;
        $nn->color=$color;
        $nn->save();

    }

    public static  function getDefaultCountry(){
        $c=Country::where('is_default',1)->first();
        return $c;
    }


    public static function prepareMobileForSms($mobile,$country_id=0){
        if($country_id == 0){
            $c=Country::where('is_default',1)->first();
            $prefix=$c->prefix;
            $length_check=$c->mobile_digits;
            $with_prefix=$c->accept_prefix;

            $check_start_digit=$c->check_start_digit;
        }
        if(substr($mobile,0,1) == 0 && $check_start_digit==0){
            $mobile = substr($mobile,1,strlen($mobile)-1);
        }
        if($with_prefix){
            $new_mobile=$mobile;
        }else{
            $new_mobile = $prefix.$mobile;
        }

        return $new_mobile;
    }

    public static function addToTrans($key)
    {
        Translation::firstOrCreate([
            'locale' => 'ar',
            'group'  => 'api_texts',
            'key'    => $key,
        ]);
        Translation::firstOrCreate([
            'locale' => 'en',
            'group'  => 'api_texts',
            'key'    => $key,
        ]);
    }


    public static  function NotificationToUser($user_id,$title,$mess,$order_id,$dataToSend=[],$action='',$record_id=0,$is_saved = 1)
    {
        $user = User::find($user_id);
        if($is_saved){
            $n=new UserNotification();
            $n->user_id=$user_id;
            $n->message=$mess;
            $n->title=$title;
            $n->order_id=$order_id;
            $n->is_seen=0;
            $n->save();
        }

        if ($user->device) {
            $push = array('title' => $title, 'body' => $mess, 'priority' => "high", "content_available" => true, 'sound' => 'default');
            $data = array('title' => $title, 'body' => $mess, 'priority' => "high", "content_available" => true, 'sound' => 'default');
            if(@count($dataToSend)){
                $push=array_merge($push,$dataToSend);
                $data=array_merge($data,$dataToSend);
            }
            if($action){
                $push['action']=$action;
                $data['action']=$action;
            }

            foreach ($user->device as $d){
                self::send_notification($push, $data, $d->key);

            }
        }

        return;
    }

    public static  function NotificationToUserSilent($user_id,$dataToSend=[],$action='')
    {

        $data = array( 'priority' => "high");
        if(count($dataToSend)){
            $data=$dataToSend;
        }
        if($action){
            $data['action']=$action;
        }
        $user=User::find($user_id);
        if ($user->device_key) {
            self::send_silent_notification($data, $user->device_key);
        }

        return;
    }
    public static  function NotificationToUserGlobal($global_notification_id,$image=null)
    {

        $NG=GlobalNotification::find($global_notification_id);
        $text=new NotificationText();
        $text->title_ar=$NG->title;
        $text->title_en=$NG->title;
        $text->message_ar=$NG->message;
        $text->message_en=$NG->message;

        $per_round=300;
        $all_devices=DeviceKey::count();


        $rounds=ceil($all_devices/$per_round);
        $result="not Sended";

        /***************/
        for($round=0;$round<$rounds;$round++){
            $devices_every_round=array();
            $devices_every_round=DeviceKey::query()->take($per_round)->offset($round*$per_round)->pluck('d_key')->toArray();
            $devices_keys=DeviceKey::query()->take($per_round)->offset($round*$per_round)->get();
            // foreach ($devices_every_round as $device) {
            $push = array('title' => $text->title_ar, 'body' => $text->message_ar, 'priority' => "high", "content_available" => true, 'sound' => 'default');
            $data = array('title' => $text->title_ar,'title_en' => $text->title_en, 'body' => $text->message_ar, 'messages_en' => $text->message_en, 'priority' => "high", "content_available" => true, 'sound' => 'default');
            if($image){
                $push['image']=$image;
                $data['image']=$image;
            }
            $data['action']="AdminNotification";
            $result=self::send_notification_multible($push, $data, $devices_every_round);
            foreach ($devices_keys as $keyObj){
                if($keyObj->user_id){
                    $n=new UserNotification();
                    $n->user_id=$keyObj->user_id;
                    $n->notification_id=$text->id;
                    $n->data=[];
                    $n->firebase_response=$result;
                    $n->global_id=$global_notification_id;
                    $n->save();
                }else{
                    $n=new UserNotification();
                    $n->key_id=$keyObj->id;
                    $n->notification_id=$text->id;
                    $n->data=[];
                    $n->firebase_response=$result;
                    $n->global_id=$global_notification_id;
                    $n->save();
                }
            }
            //}
        }


        return;
    }


    private static function send_silent_notification($data, $key)
    {
        $keyy=Settings::where('name','firebase_key')->first();
        $api_key = $keyy->value;
        $api_url = 'https://fcm.googleapis.com/fcm/send';

        $pdata = $data;
        $fields = array(  "content_available" => true,'data' => $pdata, 'to' => $key,);
        $headers = array('Authorization:key=' . $api_key, 'Content-Type: application/json');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        if ($result === false)
            die('Curl failed ' . curl_error($ch));
        curl_close($ch);
        return $result;
    }

    public static  function NotificationToDevice($title,$mess,$order_id,$dataToSend=[],$action='',$record_id=0,$is_saved = 1)
    {
        //$user = User::find($user_id);

        $devices=DeviceKey::all();
        if ($devices) {

            $push = array('title' => $title, 'body' => $mess, 'priority' => "high", "content_available" => true, 'sound' => 'default');
            $data = array('title' => $title, 'body' => $mess, 'priority' => "high", "content_available" => true, 'sound' => 'default');
            if(count($dataToSend)){
                $push=array_merge($push,$dataToSend);
                $data=array_merge($data,$dataToSend);
            }
            if($action){
                $push['action']=$action;
                $data['action']=$action;
            }

            foreach ($devices as $d){
                if($d->user_id >0 && $is_saved){
                    $un = UserNotification::query()->where('title',$title)->where('message',$mess)->whereDate('created_at','=',Carbon::now()->toDateString())->first();
                    if(!$un){
                        $n=new UserNotification();
                        $n->user_id=$d->user_id;
                        $n->message=$mess;
                        $n->title=$title;
                        $n->order_id=$order_id;
                        $n->is_seen=0;
                        $n->save();
                    }
                }
                self::send_notification($push, $data, $d->key);

            }
        }

        return;
    }

    public static  function NotificationToStore($artist_id,$title,$mess,$order_id,$dataToSend=[],$action='',$record_id=0,$is_saved = 1)
    {
        $user = Store::find($artist_id);
        if($is_saved){
            $n=new StoreNotification();
            $n->store_id=$artist_id;
            $n->message=$mess;
            $n->title=$title;
            $n->order_id=$order_id;
            $n->is_seen=0;
            $n->save();
        }

        if ($user->device_key) {
            $push = array('title' => $title, 'body' => $mess, 'priority' => "high", "content_available" => true, 'sound' => 'default');
            $data = array('title' => $title, 'body' => $mess, 'priority' => "high", "content_available" => true, 'sound' => 'default');
            if(count($dataToSend)){
                $push=array_merge($push,$dataToSend);
                $data=array_merge($data,$dataToSend);
            }
            if($action){
                $push['action']=$action;
                $data['action']=$action;
            }
            if($order_id){
                self::NotificationToStorePusher('orders_'.$artist_id, 'order', ['order_id' => $order_id,'title'=>$title, 'text' =>$mess]);
            }

            self::send_notification_artist($push, $data, $user->device_key);
        }

        return;
    }

    public static  function GlobalNotificationToUser($deviceKey,$title,$mess)
    {

//        if ($deviceKey->d_key) {
            $push = array('title' => $title, 'body' => $mess, 'priority' => "high", "content_available" => true, 'sound' => 'default');
            $data = array('title' => $title, 'body' => $mess, 'priority' => "high", "content_available" => true, 'sound' => 'default');
            self::send_notification($push, $data, $deviceKey);
//        }

        return;
    }



    private static function send_notification($array, $data, $key)
    {
        $keyy=Settings::where('name','firebase_key')->first();

        $api_key = $keyy->value;
        $api_url = 'https://fcm.googleapis.com/fcm/send';//'https://android.googleapis.com/gcm/send';

        $push = $array;
        $pdata = $data;
        $fields = array('notification' => $push, 'data' => $pdata, 'to' => $key, 'priority' => "high", "content_available" => true);
        $headers = array('Authorization:key=' . $api_key, 'Content-Type: application/json');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);

        if ($result === false)
            die('Curl failed ' . curl_error($ch));
        curl_close($ch);
        return $result;
    }
    private static function send_notification_multible($array, $data, $keys)
    {
        $keyy=Settings::where('name','firebase_key')->first();

        $api_key = $keyy->value;
        $api_url = 'https://fcm.googleapis.com/fcm/send';;


        $push = $array;
        $pdata = $data;
        //   dd($push);
        if( isset($push['action']) && $push['action'] == 'free_transport'){
            $fields = array( 'data' => $pdata, 'registration_ids' => $keys,
                "priority" => "high");
            //  dd($fields);
        }else{
            $fields = array('notification' => $push, 'data' => $pdata, 'registration_ids' => $keys ,
                "priority" => "high");
        }
        //  $fields = array('notification' => $push, 'data' => $pdata, 'to' => $key);
        $headers = array('Authorization:key=' . $api_key, 'Content-Type: application/json');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        if ($result === false)
            die('Curl failed ' . curl_error($ch));
        curl_close($ch);

        return $result;
    }


    public  static function NotificationToAdmin($channel,$event,$data)
    {
        try{
            $pusher_auth_key=Settings::where('name','pusher_auth_key')->first();
            $pusher_secret=Settings::where('name','pusher_secret')->first();
            $pusher_app_id=Settings::where('name','pusher_app_id')->first();
            $options = array(
                'cluster' => 'ap2',
                'useTLS' => true
            );
            $pusher = new Pusher(
                $pusher_auth_key->value,
                $pusher_secret->value,
                $pusher_app_id->value,
                $options
            );


            $pusher->trigger($channel, $event, $data);
            $n=new AdminNotification();
            $n->text=$data['text']??'';
            $n->channel=$channel;
            $n->event=$event;
            $n->not_data=$data;
            $n->save();
        }catch (\Exception $e){

        }

    }

    public static function preparephoneForSms($phone)
    {
    }




}
