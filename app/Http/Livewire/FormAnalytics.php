<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FormAnalytics extends Component
{
    public $form;
    public $totalSubmissions;
    public $totalSpamSubmissions;
    public $totalSubmissionsByDays = 30;
    public $getLineChartWeeklyByDays = 60;
    public $getLineChartDailyByDays = 60;
    public $totalSpamSubmissionsByDays = 30;
    public $barChartData = [];
    public $showSubmissions = true;
    public $showSpam;
    public $barChartlabels;
    public $barChartdatasets;
    public $lineChartlabels;
    public $lineChartdatasets;
    public $lineChartlabelsDaily;
    public $lineChartdatasetsDaily;

    public function mount()
    {
        $this->totalSubmissions = $this->form->submissions->count();
    }

    public function render()
    {
        $startDate = Carbon::now()->subDays($this->totalSubmissionsByDays);
        $this->totalSubmissions = $this->form->submissions()
            ->where('form_id', $this->form->id)
            ->inbox()
            ->where('created_at', '>=', $startDate)
            ->count();

        $startDate = Carbon::now()->subDays($this->totalSpamSubmissionsByDays);
        $this->totalSpamSubmissions = $this->form->submissions()
            ->where('form_id', $this->form->id)
            ->where('spam', true)
            ->where('created_at', '>=', $startDate)
            ->count();

        $this->getBarChart();
        $this->getLineChartWeekly();
        $this->getLineChartDaily();



        return view('livewire.form-analytics');
    }

    public function getBarChart()
    {
        $this->barChartlabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        $submissionData = [];
        $spamData = [];

        // Calculate total submissions and spam submissions for each month
        foreach ($this->barChartlabels as $month) {
            $monthNumber = Carbon::parse($month)->month;

            $submissionCount = $this->form->submissions()
                ->where('form_id', $this->form->id)
                ->inbox()
                ->whereMonth('created_at', $monthNumber)
                ->count();

            $spamCount = $this->form->submissions()
                ->where('form_id', $this->form->id)
                ->where('spam', true)
                ->whereMonth('created_at', $monthNumber)
                ->count();

            $submissionData[] = $submissionCount;
            $spamData[] = $spamCount;
        }

        $this->barChartdatasets = [
            [
                'label' => 'Submission',
                'backgroundColor' => '#047856',
                'borderColor' => '#047856',
                'data' => $submissionData,
                'fill' => false,
            ],
            [
                'label' => 'Spam',
                'backgroundColor' => '#3db3b1',
                'borderColor' => '#3db3b1',
                'data' => $spamData,
                'fill' => false,
            ],
        ];
    }

    public function getLineChartWeekly()
    {
        $this->lineChartlabels = Carbon::getDays();

        $submissionData = [];
        $spamData = [];


        $startDate = Carbon::now()->subDays($this->getLineChartWeeklyByDays);
        $startDate = $startDate->format('Y-m-d H:i:s');

        foreach ($this->lineChartlabels as $day) {
            $dayNumber = Carbon::parse($day)->dayOfWeek;

            $submissionCount = $this->form->submissions()
                ->where('form_id', $this->form->id)
                ->inbox()
                ->whereRaw("DAYOFWEEK(created_at) = ?", [$dayNumber + 1])
                ->where('created_at', '>=', $startDate)
                ->count();

            $spamCount = $this->form->submissions()
                ->where('form_id', $this->form->id)
                ->where('spam', true)
                ->whereRaw("DAYOFWEEK(created_at) = ?", [$dayNumber + 1])
                ->where('created_at', '>=', $startDate)
                ->count();

            $submissionData[] = $submissionCount;
            $spamData[] = $spamCount;
        }

        $this->lineChartdatasets = [
            [
                'label' => 'Submission',
                'backgroundColor' => '#047856',
                'borderColor' => '#047856',
                'data' => $submissionData,
                'fill' => false,
            ],
            [
                'label' => 'Spam',
                'backgroundColor' => '#3db3b1',
                'borderColor' => '#3db3b1',
                'data' => $spamData,
                'fill' => false,
            ],
        ];

        $this->dispatchBrowserEvent('updateLineWeeklyChart', [
            'lineChartdatasets' => $this->lineChartdatasets,
        ]);
    }

    public function getLineChartDaily()
    {
        $this->lineChartlabelsDaily = [
            '12 AM', '1 AM', '2 AM', '3 AM', '4 AM', '5 AM', '6 AM', '7 AM', '8 AM', '9 AM', '10 AM', '11 AM',
            '12 PM', '1 PM', '2 PM', '3 PM', '4 PM', '5 PM', '6 PM', '7 PM', '8 PM', '9 PM', '10 PM', '11 PM',
        ];

        $submissionData = [];
        $spamData = [];

        $timeIntervals = [
            ['00:00:00', '01:00:00'],
            ['01:00:01', '02:00:00'],
            ['02:00:01', '03:00:00'],
            ['03:00:01', '04:00:00'],
            ['04:00:01', '05:00:00'],
            ['05:00:01', '06:00:00'],
            ['06:00:01', '07:00:00'],
            ['07:00:01', '08:00:00'],
            ['08:00:01', '09:00:00'],
            ['09:00:01', '10:00:00'],
            ['10:00:01', '11:00:00'],
            ['11:00:01', '12:00:00'],
            ['12:00:01', '13:00:00'],
            ['13:00:01', '14:00:00'],
            ['14:00:01', '15:00:00'],
            ['15:00:01', '16:00:00'],
            ['16:00:01', '17:00:00'],
            ['17:00:01', '18:00:00'],
            ['18:00:01', '19:00:00'],
            ['19:00:01', '20:00:00'],
            ['20:00:01', '21:00:00'],
            ['21:00:01', '22:00:00'],
            ['22:00:01', '23:00:00'],
            ['23:00:01', '23:59:59'],
        ];

        $startDate = Carbon::now()->subDays($this->getLineChartDailyByDays);
        $startDate = $startDate->format('Y-m-d H:i:s');

        foreach ($timeIntervals as $interval) {
            $submissionCount = $this->form->submissions()
                ->where('form_id', $this->form->id)
                ->inbox()
                ->whereBetween(DB::raw('TIME(created_at)'), $interval)
                ->where('created_at', '>=', $startDate)
                ->count();

            $spamCount = $this->form->submissions()
                ->where('form_id', $this->form->id)
                ->where('spam', true)
                ->whereBetween(DB::raw('TIME(created_at)'), $interval)
                ->where('created_at', '>=', $startDate)
                ->count();

            $submissionData[] = $submissionCount;
            $spamData[] = $spamCount;
        }

//        dd($submissionData, $spamData, $startDate);

        $this->lineChartdatasetsDaily = [
            [
                'label' => 'Submission',
                'backgroundColor' => '#047856',
                'borderColor' => '#047856',
                'data' => $submissionData,
                'fill' => false,
            ],
            [
                'label' => 'Spam',
                'backgroundColor' => '#3db3b1',
                'borderColor' => '#3db3b1',
                'data' => $spamData,
                'fill' => false,
            ],
        ];

        $this->dispatchBrowserEvent('updateLineDailyChart', [
            'lineChartdatasetsDaily' => $this->lineChartdatasetsDaily,
        ]);
    }
}
