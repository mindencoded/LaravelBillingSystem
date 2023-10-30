<?php

namespace App\Interfaces;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface MessagesInterface
{
    public function getMessages(Request $request): LengthAwarePaginator;

    public function findById(string $id): Message;

    public function store(Request $request): Message;

    public function update(Request $request, string $id): void;

    public function destroy(string $id): void;
}
