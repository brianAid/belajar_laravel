<?php

namespace App\Imports;

use App\Models\Guru;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImport implements ToModel
{
    /**
     * @param array
     */
    public function model(array $row)
    {
        return new Guru([
            'nama' => (isset($row['nama']) ? $row['nama'] : $row[1]),
            'mapel' => (isset($row['mapel']) ? $row['mapel'] : $row[2]),
            'umur' => (isset($row['Umur']) ? $row['Umur'] : $row[3]),
        ]);
    }
}
