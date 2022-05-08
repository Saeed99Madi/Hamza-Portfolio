<?php

namespace App\Exports;

use App\Models\Beneficiary;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BeneExport implements FromCollection, WithHeadings
{
     protected $data;
     protected $header;
     function __construct($data, $header) {
            $this->data = $data;
            $this->header = $header;
     }
    public function collection()
    {
        return $this->data->get();
    }
    public function headings(): array
    {
        return $this->header;//["#", "الإسم", "تاريخ الإدخال", "تاريخ التعديل", "رقم الهوية", "المنطقه", "هوية الشريك", "إسم الشريك", "إسم المشروع", "المؤوسسه", "الممول", "الميزانية", "العملة", "تاريخ الإستفاده", "نوع المشروع", "الكشف" ];
    }
}
