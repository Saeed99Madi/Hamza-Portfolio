<?php

namespace App\Imports;

use App\Models\Temp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TempImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $id;

     function __construct($id) {
            $this->id = $id;
     }
    public function startRow(): int
    {
        return 2;
    }
    public function transformDate($value, $format = 'd/m/Y')
    {
        /*try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }*/
    }
    public function model(array $row)
    {
        return new Temp([
            'identity'     => $row[0],
            'name'     => $this->id//$row[1]
        ]);
    }
}
