<?php

namespace App\Repositories\Interfaces;

interface ApiInterface
{
    public function getNotifications();
    public function resetNotificationsTrigger();

}
