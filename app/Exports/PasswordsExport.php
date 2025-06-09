<?php

namespace App\Exports;

use App\Models\Password;
use Maatwebsite\Excel\Concerns\FromCollection;

class PasswordsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Password::where('user_id', auth()->user()->id)->get();
    }
}
