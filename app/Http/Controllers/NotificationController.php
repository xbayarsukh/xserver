<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications()->paginate(10);
        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();

        // Redirect based on the notification type
        if(isset($notification->data['post_id'])) {

            return redirect()->route('posts.show', $notification->data['post_id']);

        } elseif(isset($notification->data['user_name'])) {

            if(auth()->user()->division_id ==6){
                return redirect()->route('Kintaihr'); // Assuming 6 is the HR division ID

            }else{
                return redirect()->route('time_off_boss.index');
            }





        } elseif(isset($notification->data['status'])) {
            return redirect()->route('dashboard');
        }

        return back()->with('success', 'Notification marked as read');
    }
}
