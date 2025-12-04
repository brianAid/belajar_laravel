<?php

namespace App\Exports;

use App\Models\Guru; // atau koleksi apa pun
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class GuruExport implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize
{
    public function collection()
    {
        // Ambil data tanpa kolom id, created_at, dll jika tidak ingin ditampilkan
        return Guru::select('id', 'name', 'mapel', 'umur')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Mapel',
            'Umur'
        ];
    }

    /**
     * Register events untuk styling
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestRow();       // misal 51
                $highestColumn = $sheet->getHighestColumn(); // misal "D"
    
                // Range seluruh tabel termasuk header (A1:D51)
                $tableRange = "A1:{$highestColumn}{$highestRow}";

                // 1. Header (baris 1) → background kuning, bold, center, border
                $sheet->getStyle('A1:' . $highestColumn . '1')
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'size' => 11,
                            'color' => ['argb' => 'FF000000'],
                        ],
                        'fill' => [
                            'fillType' => Fill::FILL_SOLID,
                            'startColor' => ['argb' => 'FFFFFF00'], // kuning
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_CENTER,
                            'vertical' => Alignment::VERTICAL_CENTER,
                        ],
                    ]);

                // 2. Seluruh tabel → border tipis semua sisi
                $sheet->getStyle($tableRange)
                    ->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['argb' => 'FF000000'],
                            ],
                        ],
                    ]);

                // 3. Text wrap untuk semua sel (biar nama panjang tidak terpotong)
                $sheet->getStyle($tableRange)
                    ->getAlignment()
                    ->setWrapText(true);

                // 4. Alignment kolom tertentu
                // No & Umur → center
                $sheet->getStyle("A2:A{$highestRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle("D2:D{$highestRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // Mapel → center juga (opsional)
                $sheet->getStyle("C2:C{$highestRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // 5. Tinggi baris header
                $sheet->getRowDimension(1)->setRowHeight(25);

                // 6. Freeze pane di bawah header (biar header selalu kelihatan saat scroll)
                $sheet->freezePane('A2');

                // 7. (Opsional) Bold kolom No
                $sheet->getStyle("A1:A{$highestRow}")->getFont()->setBold(true);
            },
        ];
    }
}
