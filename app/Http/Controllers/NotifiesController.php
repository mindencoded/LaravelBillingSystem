<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreNotifiesRequest;
use App\Models\Notify;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Notifications\UserNotification;
use Auth;

class NotifiesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        return view('notifies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('notifies.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreNotifiesRequest $request): RedirectResponse
    {
        $recipient_id = $request->input('recipient_id');
        $body = $request->input('body');
        $notify = Notify::create([
            'recipient_id' =>  $recipient_id,
            'sender_id' => Auth::user()->id,
            'body' =>$body
        ]);

        $recipient = User::find($recipient_id);

        $user_notification = new UserNotification();
        $user_notification->setNotify($notify);
        $recipient->notify($user_notification);

        return back()->with('success', 'Your message has been sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function mark(string $id)
    {
    }
}
