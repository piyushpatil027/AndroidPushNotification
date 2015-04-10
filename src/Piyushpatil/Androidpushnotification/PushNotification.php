<?php

namespace Piyushpatil\Androidpushnotification;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PushNotification
 *
 * @author piyush
 */
class PushNotification {

    //put your code here
    public function app($appName) {
        return new Android(\Config::get('laravel-push-notification::' . $appName));
    }

    public function Message() {
        $instance = (new \ReflectionClass('Sly\NotificationPusher\Model\Message'));
        return $instance->newInstanceArgs(func_get_args());
    }

    public function Device() {
        $instance = (new \ReflectionClass('Sly\NotificationPusher\Model\Device'));
        return $instance->newInstanceArgs(func_get_args());
    }

    public function DeviceCollection() {
        $instance = (new \ReflectionClass('Sly\NotificationPusher\Collection\DeviceCollection'));
        return $instance->newInstanceArgs(func_get_args());
    }

    public function PushManager() {
        $instance = (new \ReflectionClass('Sly\NotificationPusher\PushManager'));
        return $instance->newInstanceArgs(func_get_args());
    }

    public function GcmAdapter() {
        $instance = (new \ReflectionClass('Sly\NotificationPusher\Model\GcmAdapter'));
        return $instance->newInstanceArgs(func_get_args());
    }

    public function Push() {
        $instance = (new \ReflectionClass('Sly\NotificationPusher\Model\Push'));
        return $instance->newInstanceArgs(func_get_args());
    }

}
