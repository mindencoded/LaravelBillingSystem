<?php

namespace App\Http\Controllers;

use App\Models\Notify;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\View\View;

class NotificationsController extends Controller
{
    public function index(): View {
        return view('notifications.index', [
            'unreadNotifications' => Auth::user()->unreadNotifications()->get(),
            'readNotifications' => Auth::user()->readNotifications()->get()
        ]);
    }

    public function show(string $id): View {
        $notify = Notify::findOrFail($id);
        return view('notifications.show', compact('notify'));
    }

    public function read(string $id): RedirectResponse {
        DatabaseNotification::find($id)->markAsRead();
        return back()->with('success', 'Notification marked as read');
    }

    public function destroy(string $id): RedirectResponse {
        DatabaseNotification::find($id)->delete();
        return back()->with('success', 'Notification deleted.');
    }
}
