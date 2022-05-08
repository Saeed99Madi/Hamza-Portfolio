<?php

namespace App\Imports;

use App\Models\Beneficiary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BeneficiarysImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
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
        $date = explode('/',$row[8]);//explode('/', $date_from);
        $date_from = $date[2] . '-' . $date[1] . '-' . $date[0];

        return new Beneficiary([
            'identity'     => $row[0],
            'name'     => $row[1],
            'city'     => $row[2],
            'project'     => $row[3],
            'institute'     => $row[4],
            'donor'     => $row[5],
            'budget'     => $row[6],
            'currency'     => $row[7],
            'date'     => $date_from,//$this->transformDate($row[8]),
            'project_type'     => $row[9],
            'partnarId'     => $row[10],
            'partnarName'     => $row[11],
            'book'     => $row[12]
        ]);
    }
}
