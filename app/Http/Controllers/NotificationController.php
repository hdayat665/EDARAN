<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function sendGeneralNotification($id = '', $msg = '')
    {
        $userToNotify = Users::where('id', $id)->get();

        foreach ($userToNotify as $user) {
            $dataNotify = [
                'msg' => $msg,
                'user' => Auth::user()->name,
                'status' => 'succed',
            ];

            $user->notify(new GeneralNotification($dataNotify));
        }
    }

    public function markNotification(Request $r)
    {
        auth()->user()
            ->unreadNotifications
            ->when($r->input('id'), function ($query) use ($r) {
                return $query->where('id', $r->input['id']);
            })->markAsRead();

        return response()->noContent();
    }
}