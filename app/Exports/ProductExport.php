<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Events\AfterSheet;

class ProductExport implements FromCollection, WithMapping, WithHeadings, WithEvents,WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Slug',
            'Price (Rupiah)',
            'Deskripsi',
            'Store',
        ];
    }
    public function collection()
    {
        return Product::get();
    }

    public function map($product):array
    {
        $a = $a+1;
        return[
            $a,
            $product->name,
            $product->slug,
            'Rp '.$product->price,
            $product->description,
            $product->Store->name,
        ];
    }
    public function registerEvents(): array
    {
        return [
            // Handle by a closure.
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:F1')->applyFromArray([
                    'font' => [
                    'bold'=> true
                    ]
                    ]);
            },
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 3,
            'B' => 15,
            'C' => 30,
            'D' => 10,
            'E' => 30,
            'F' => 20,
        ];
    }
}



