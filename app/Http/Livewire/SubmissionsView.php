<?php

namespace App\Http\Livewire;

use App\Models\Submission;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class SubmissionsView extends Component
{
    public $submissions;
    public $form;
    public int|null $selectedSubmissionId = null;
    public Submission|null $selectedSubmission = null;
    public $search;
    public $filter;

    public function mount($form, $filter)
    {
        $this->form = $form;
        $this->filter = $filter;
    }

    public function render()
    {
        $this->submissions = $this->form->submissions();
        if ($this->submissions) {
            $this->applyFilters();
            $this->applySearch();
        }

        $this->submissions ? $this->submissions = $this->submissions->latest()->get() : '';
        if(!$this->selectedSubmissionId){
            $this->selectedSubmissionId = $this->submissions && count($this->submissions) > 0 ? $this->submissions[0]->id : null;
        }
        if(!$this->selectedSubmission){
            $this->selectedSubmission = $this->submissions && count($this->submissions) > 0 ? $this->submissions[0] : null;
        }

        return view('livewire.submissions-view');
    }

    protected function applyFilters()
    {
        if ($this->filter == 'spam') {
            $this->submissions->where('spam', true);
        } elseif ($this->filter == 'archive') {
            $this->submissions->where('archived', true);
        } else{
            $this->submissions->where('spam', false)->where('archived', false);
        }
    }

    protected function applySearch()
    {
        if ($this->search) {
            $this->submissions->where('data', 'like', '%' . $this->search . '%');
        }
    }

    public function selectSubmission(int | null $id)
    {
        $this->selectedSubmissionId = $id;

        if ($id === null) {
            $this->selectedSubmission = null;
            return;
        }

        $this->selectedSubmission = $this->submissions->firstWhere('id', $id);
    }

    public function setArchived(bool $archived)
    {
        if ($this->selectedSubmission === null) {
            return;
        }

        $this->selectedSubmission->update([
            'archived' => $archived,
            'spam' => 0,
        ]);

        // Don't remove the submission from the list if it's spam
        // because the current list would probably be spam already
        if ($this->selectedSubmission->spam) {
            return;
        }

        $this->submissions = $this->submissions->filter(function ($submission) {
            return $submission->id !== $this->selectedSubmission->id;
        });

        $this->selectSubmission(null);
    }

    public function setSpam(bool $spam)
    {
        if ($this->selectedSubmission === null) {
            return;
        }

        $this->selectedSubmission->update([
            'spam' => $spam,
            'archived' => 0,
        ]);

        $this->submissions = $this->submissions->filter(function ($submission) {
            return $submission->id !== $this->selectedSubmission->id;
        });

        $this->selectSubmission(null);
    }

    function truncateString($inputString, $maxLength)
    {
        if (strlen($inputString) > $maxLength) {
            return substr($inputString, 0, $maxLength) . "...";
        } else {
            return $inputString;
        }
    }

    public function getSubmittionName($entry)
    {
        if (isset($entry['name']['value'])) {
            return $entry['name']['value'];

        } elseif(isset($entry['Name']['value'])) {
            return $entry['Name']['value'];

        } else {
            return '(Untitled)';
        }
    }
}
