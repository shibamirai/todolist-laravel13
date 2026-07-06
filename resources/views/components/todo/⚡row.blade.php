<?php

use Livewire\Component;

new class extends Component
{
    public $todoItem;

    public function updateFinished()
    {
        if ($this->todoItem->finished_date) {
            $this->todoItem->finished_date = null;
        } else {
            $this->todoItem->finished_date = now()->format('Y-m-d');
        }
        $this->todoItem->save();
    }
};
?>

<tr class="{{ $todoItem->isExpired() ? 'bg-red-200' : '' }}">
    <td class="{{ $todoItem->finished_date ? 'line-through' : '' }}">{{ $todoItem->item_name }}</td>
    <td class="{{ $todoItem->finished_date ? 'line-through' : '' }}">{{ $todoItem->user->fullName() }}</td>
    <td class="{{ $todoItem->finished_date ? 'line-through' : '' }}">{{ $todoItem->registration_date }}</td>
    <td class="{{ $todoItem->finished_date ? 'line-through' : '' }}">{{ $todoItem->expire_date }}</td>
    <td class="{{ $todoItem->finished_date ? 'line-through' : '' }}">{{ $todoItem->finished_date }}</td>
    <td class="flex gap-1">
        <button class="btn btn-primary w-20"
            wire:click="updateFinished"
        >
            {{ $todoItem->finished_date ? '未完了' : '完了' }}
        </button>
        <a href="{{ route('edit', $todoItem) }}" class="btn btn-primary">修正</a>
        <a href="{{ route('delete', $todoItem) }}" class="btn btn-warning">削除</a>
    </td>
</tr>
