<?php


namespace App\Helpers;


use app\Libraries\Markdown\Parser;
use Illuminate\Support\Facades\Cookie;

class Tools
{

    public static function is_login() {
        $uid = Cookie::get('uid');
        if(empty($uid)) {
            return false;
        }
        if($uid) {
            $user = explode('_',$uid);
            if($user[0] == 'tourist') {
                //当前用户为游客
                $data = [
                    'type' => '0',
                    'uid'  => $user[1]
                ];
                return $data;
            }
            if($user[0] == 'active') {
                //当前用户为正常用户
                $data = [
                    'type' => '1',
                    'uid'  => $user[1],
                    'username' => Cookie::get('username')
                ];
                return $data;
            }
            return false;
        }
    }

    public static function get_random_uid($type = 0) {
        if($type == 0) {
            $perfix = 'tourist_';
        } else{
            $perfix = 'active_';
        }
        $uid = uniqid($perfix);
        return $uid;
    }
}
