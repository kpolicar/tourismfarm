<?php

namespace App\Nova\Actions;

use App\Inquiry;
use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;

class InquiryApprove extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $name = 'Approve';

    public function handle(ActionFields $fields, Collection $models)
    {
        $models->each(function (Inquiry $model) {
            $model->update([
                'is_approved' => true,
            ]);
            $model->sendEmailApprovalNotification();
        });
    }

    public function fields()
    {
        return [];
    }
}
