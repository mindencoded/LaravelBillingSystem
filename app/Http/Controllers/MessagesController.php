<?php

namespace App\Http\Controllers;

use App\Events\MessageWasReceived;
use App\Interfaces\MessagesInterface;
use App\Presenters\Presenter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Presenters\MessagePresenter;

class MessagesController extends Controller
{
    protected MessagesInterface $messages;

    public function __construct(MessagesInterface $messages)
    {
        $this->messages = $messages;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $messages = $this->messages->getMessages($request);
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request): RedirectResponse
    {
        $message = $this->messages->store($request);
        event(new MessageWasReceived($message));
        return redirect()->route('messages.index')->with('success', 'Message created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $message = $this->messages->findById($id);
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $message = $this->messages->findById($id);
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, string $id): RedirectResponse
    {
        $this->messages->update($request, $id);
        return redirect()->route('messages.index')->with('success', 'Message updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->messages->destroy($id);
        return redirect()->route('messages.index');
    }
}
