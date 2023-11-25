<?php

namespace App\Http\Controllers;

use App\Events\MessageWasReceived;
use App\Interfaces\MessagesRepositoryInterface;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;

class MessagesController extends Controller
{
    protected MessagesRepositoryInterface $messages;

    public function __construct(MessagesRepositoryInterface $messages)
    {
        $this->messages = $messages;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return View
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
     * @param UpdateMessageRequest $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(UpdateMessageRequest $request, string $id): RedirectResponse
    {
        $this->messages->update($request, $id);
        return redirect()->route('messages.index')->with('success', 'Message updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->messages->destroy($id);
        return redirect()->route('messages.index');
    }
}
