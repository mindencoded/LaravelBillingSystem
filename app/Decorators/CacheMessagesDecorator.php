<?php

namespace App\Decorators;

use App\Interfaces\MessagesInterface;
use App\Models\Message;
use App\Repositories\MessagesRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class CacheMessagesDecorator extends Decorator implements MessagesInterface
{
    protected MessagesRepository $messagesRepository;

    public function __construct(MessagesRepository $messagesRepository)
    {
        $this->messagesRepository = $messagesRepository;
    }

    public function getMessages(Request $request): LengthAwarePaginator
    {
        $page = $request->page ?? 1;
        return Cache::tags('messages')->rememberForever('messages.page.' . $page, function () use ($request) {
            return $this->messagesRepository->getMessages($request);
        });
    }
    public function findById(string $id): Message
    {
        return Cache::tags('messages')->rememberForever('message.' . $id, function () use ($id) {
            return $this->messagesRepository->findById($id);
        });
    }

    public function store(Request $request): Message
    {
        $message = $this->messagesRepository->store($request);
        Cache::tags('messages')->flush();
        return $message;
    }

    public function update(Request $request, string $id): void
    {
        $this->messagesRepository->update($request, $id);
        Cache::tags('messages')->flush();
    }

    public function destroy(string $id): void
    {
        $this->messagesRepository->destroy($id);
        Cache::tags('messages')->flush();
    }
}
