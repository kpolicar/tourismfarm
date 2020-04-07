<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InquiryApprove extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $name = 'Approve';

    public function handle(ActionFields $fields, Collection $models)
    {
        $models->each->update([
            'is_approved' => true,
        ]);
    }

    public function fields()
    {
        return [];
    }
}
