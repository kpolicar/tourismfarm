<?php

namespace App\Nova;

use App\Nova\Actions\InquiryApprove;
use App\Nova\Filters\DateRangeFilter;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Inquiry extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Inquiry';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name', 'email',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Boolean::make('Approved', 'is_approved')
                ->help('Warning: modifying the value here will not notify the guest!'),

            new Panel('Booking details', $this->bookingFields()),
            new Panel('Guest information', $this->guestFields()),

            Currency::make('Price', 'price')
                ->help('The price is calculated upon creation')
                ->format('sl-SI')
                ->hideWhenCreating(),
        ];
    }

    public function bookingFields()
    {
        return [
            Date::make('Check-in', 'from')->sortable(),
            Date::make('Check-out', 'to'),
            Number::make('Adults', 'adults'),
            Number::make('Children', 'children'),
            Number::make('Infants', 'infants'),
        ];
    }

    public function guestFields()
    {
        return [
            Text::make('Name', 'name')->sortable(),
            Text::make('Contact email', 'email')->sortable(),
            Textarea::make('Message', 'message'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            new InquiryApprove()
        ];
    }

    public function subtitle()
    {
        return "From: {$this->resource->from->format('Y-m-d')} to {$this->resource->to->format('Y-m-d')}";
    }
}
