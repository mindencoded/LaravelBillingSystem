<?php

namespace App\Repositories;

use App\Interfaces\MessagesInterface;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class MessagesRepository extends Repository implements MessagesInterface
{
    public function getMessages(Request $request): LengthAwarePaginator
    {
        $sorted = $request->sorted ?? 'DESC';
        return Message::with(['user', 'note', 'tags'])
            ->orderBy('created_at', $sorted)
            ->paginate(10);

    }

    public function findById(string $id): Message
    {
        return Message::findOrFail($id);
    }

    public function store(Request $request): Message
    {
        $message = Message::create($request->all());
        if (Auth::check()) {
            Auth::user()->messages()->save($message);
        }
        return $message;
    }

    public function update(Request $request, string $id): void
    {
        Message::findOrFail($id)->update($request->all());
    }

    public function destroy(string $id): void
    {
        Message::findOrFail($id)->delete();
    }
}
