<?php

namespace App\Http\Livewire;

use App\Models\DailyReport;
use Livewire\Component;
use Livewire\WithPagination;

class DairyReportList extends Component
{
    use WithPagination;

    protected $listeners = [
        'refresh' => '$refresh', // 再読み込み
        'destroy' => 'destroy'
    ];

    public function render()
    {
        $dairy_reports = DailyReport::paginate(10);
        
        return view('livewire.dairy-report-list', [
            'dairy_reports' => $dairy_reports,
        ]);
    }

    public function destroy(DailyReport $dairy_report)
    {
        $dairy_report->delete();
    }

}
