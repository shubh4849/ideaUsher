<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class UserExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    use Exportable;

    protected $users;
    protected $columns;

    public function __construct($users, $columns)
    {
        $this->users = $users;
        $this->columns = $columns;
    }

    public function collection()
    {
        $data = [];
        foreach ($this->users as $user) {
            $rowData = [];

            if (in_array('name', $this->columns)) {
                $rowData[] = $user->name;
            }

            if (in_array('email', $this->columns)) {
                $rowData[] = $user->email;
            }

            if (in_array('address', $this->columns)) {
                $rowData[] = $user->address;
            }

            $data[] = $rowData;
        }

        return new Collection($data);
    }

    public function headings(): array
    {
        $headings = [];

        if (in_array('name', $this->columns)) {
            $headings[] = 'Name';
        }

        if (in_array('email', $this->columns)) {
            $headings[] = 'Email';
        }

        if (in_array('address', $this->columns)) {
            $headings[] = 'Address';
        }

        return $headings;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;

                // Auto-size the columns
                foreach (range('A', $sheet->getHighestColumn()) as $column) {
                    $sheet->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }
}
