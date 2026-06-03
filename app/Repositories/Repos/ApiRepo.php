<?php

namespace App\Repositories\Repos;

use App\Models\Notification;
use App\Models\StickyNote;
use App\Repositories\Interfaces\ApiInterface;
use Auth;
use Exception;

class ApiRepo implements ApiInterface
{
    public function getNotifications()
    {
        try {

            if (session()->has('external_user')) {
                $userId = session('external_user')['user_id'];
            } else if (auth()->check()) {
                $userId = auth()->id();
            }
            $notifications = Notification::where('user_id', 'abc_1')
                ->where('is_triggered', 1)
                ->whereNotNull('sticky_id')
                ->whereNull('read_at')
                ->get();
            if ($notifications->isEmpty()) {
                return response()->json([]);
            }

            $data = $notifications->map(function ($notif) {

                if (!$notif->sticky_id) {
                    return null;
                }

                $sticky = StickyNote::find($notif->sticky_id);

                if (!$sticky) {
                    return null;
                }

                return [

                    'notification_id' => $notif->id,

                    'sticky_id' => $sticky->id,

                    'title' => $sticky->title,
                    'content' => $sticky->content,
                    'priority' => $sticky->priority,

                    'created_at' => $notif->created_at->toDateTimeString(),
                ];

            })->filter()->values();
            Notification::where('user_id', auth()->id())->update(['is_triggered' => 0]);


            return response()->json($data);

        } catch (Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);

        }
    }


    public function resetNotificationsTrigger()
    {
        try {
            // Reset the is_triggered flag for all notifications of the logged-in user
            Notification::where('user_id', auth()->id())->update(['is_triggered' => 0]);
        } catch (Exception $e) {
            throw new Exception('Failed to reset notification triggers: ' . $e->getMessage());
        }
    }

}
