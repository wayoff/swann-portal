<?php
namespace App\SwannPortal\Composers;

use App\Models\Schedule;
use Illuminate\View\View;

class ScheduleComposer
{
    protected $schedules;

    function __construct(Schedule $schedules)
    {
        $this->schedules = $schedules;
    }

    public function compose(View $view)
    {
        $schedule = $this->schedules
                        ->first();

        return $view->with('schedule', $schedule);
    }
}