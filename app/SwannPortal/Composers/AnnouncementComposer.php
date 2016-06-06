<?php
namespace App\SwannPortal\Composers;

use DB;
use Carbon\Carbon;
use Illuminate\View\View;
use App\Models\Announcement;

class AnnouncementComposer
{
    protected $announcements;

    function __construct(Announcement $announcements)
    {
        $this->announcements = $announcements;
    }

    public function compose(View $view)
    {
        $announcement = $this->announcements
                            ->where('end_date', '<=', Carbon::today()->toDateString())
                            ->orWhereNull('end_date')
                            ->orderBy(DB::raw('RAND()'))
                            ->get();
                            
        return $view->with('announcement', $announcement);
    }
}