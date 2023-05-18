<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\Auth;

class UserExport implements FromCollection, WithHeadings
{
    use Exportable;


    function __construct($users, $columns)
    {
        $this->users = $users;
        $this->columns = $columns;
        // dd($this->user);
    }  

    public function headings(): array
    {
        // Define the column headings based on the selected columns
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

    public function collection()
    {
        $users = $this->users;
    $arr_to_return = [];

    foreach ($users as $user) {
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

        $arr_to_return[] = $rowData;

        
            }
        return collect($arr_to_return);
    }
}
