<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DailyReport;
use Illuminate\Support\Facades\Auth;

class DairyReportInput extends Component
{

    protected $listeners = [
        'create' => 'create',
        'edit' => 'edit'
    ];

    protected $rules = [ // ここがないと wire:model に反映されない
        'dairy_report.lesson_date' => ['required'],
        'dairy_report.user_id' => ['required'],
        'dairy_report.goal' => ['required'],
        'dairy_report.results' => ['required'],
        'dairy_report.issue' => ['required'],
        'dairy_report.plan' => ['required'],
    ];

    public $dairy_report;

    public function render()
    {
        return view('livewire.dairy-report-input');
    }

    public function mount() 
    {
        $this->create();
    }

    public function create()
    {
        $this->dairy_report = new DailyReport();
    }

    public function edit(DailyReport $dairy_report)
    {
        $this->dairy_report = $dairy_report;
    }

    public function save()
    {
        //$this->validate();

        //$id = Auth::id();
        $this->dairy_report->user_id = 1;
        $this->dairy_report->save();

        session()->flash('status', '保存が完了しました。');
        $this->emitTo('dairy-report-list', 'refresh');
        $this->create();
    }
}
