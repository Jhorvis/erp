<?php

namespace App\Exports;

use App\Personrole;
use Maatwebsite\Excel\Concerns\FromCollection;

class PersonrolesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Personrole::all();
    }
}
