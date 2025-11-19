<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;

class AssignmentScoreExport implements FromArray, WithStyles, ShouldAutoSize, WithEvents
{
    protected $assignment;
    protected $students;
    protected $submissions;

    public function __construct($assignment, $students, $submissions)
    {
        $this->assignment   = $assignment;
        $this->students     = $students;
        $this->submissions  = $submissions;
    }

    public function array(): array
    {
        $data = [];

        // ============== HEADER KIRI + KANAN ==================
        // ================= HEADER KIRI + KANAN =================
        $data[] = ['Nama Sekolah', ': SMA Negeri Contoh 01', '', 'Deadline Tanggal', ': ' . $this->assignment->deadline_date];
        $data[] = ['Mata Pelajaran', ': ' . $this->assignment->subject->subject_name, '', 'Deadline Jam', ': ' . $this->assignment->deadline_time];
        $data[] = ['Nama Tugas', ': ' . $this->assignment->title, '', 'Tanggal Export', ': ' . now()->format('d-m-Y')];
        $data[] = ['Kelas', ': ' . $this->assignment->classroom->grade_level . ' ' . $this->assignment->classroom->class_name, '', 'Waktu Export', ': ' . now()->format('H:i')];


        // Tambah 2 row kosong
        $data[] = ['', '', '', '', '', '', ''];
        $data[] = ['', '', '', '', '', '', ''];


        // ============== HEADER TABEL ==================
        $data[] = ['No', 'Nama Siswa', 'Status Pengumpulan', 'Nilai', 'Tanggal Submit', 'Jam Submit', 'Feedback'];

        // ============== DATA SISWA ==================
        $no = 1;

        foreach ($this->students as $student) {

            $submission = $this->submissions->where('student_id', $student->id)->first();

            // safely parse tanggal
            $tanggalSubmit = "-";
            $jamSubmit = "-";

            if ($submission && $submission->submitted_at) {
                try {
                    $tanggalSubmit = Carbon::parse($submission->submitted_at)->format('d-m-Y');
                    $jamSubmit     = Carbon::parse($submission->submitted_at)->format('H:i');
                } catch (\Exception $e) {
                    // fallback jika error parsing
                    $tanggalSubmit = "-";
                    $jamSubmit = "-";
                }
            }

            $data[] = [
                $no++,
                $student->full_name,
                $submission ? 'Sudah Mengumpulkan' : 'Belum Mengumpulkan',
                $submission->score ?? '-',
                $tanggalSubmit,
                $jamSubmit,
                $submission->feedback ?? '-',
            ];
        }

        return $data;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            6 => ['font' => ['bold' => true]], // header tabel
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                // HEADER BOLD
                $event->sheet->getStyle('A1:A4')->applyFromArray(['font' => ['bold' => true]]);
                $event->sheet->getStyle('D1:D4')->applyFromArray(['font' => ['bold' => true]]);

                // BORDER HEADER TABEL
                $event->sheet->getStyle('A7:G7')->applyFromArray([
                    'font'      => ['bold' => true],
                    'alignment' => ['horizontal' => 'center'],
                    'borders'   => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                        ]
                    ],
                ]);

                // BORDER DATA SISWA
                $lastRow = $event->sheet->getHighestRow();
                if ($lastRow > 6) {
                    $event->sheet->getStyle("A7:G$lastRow")->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                            ]
                        ]
                    ]);
                }

                // ALIGNMENT
                $event->sheet->getStyle("A7:G$lastRow")->getAlignment()->setHorizontal('left');
                $event->sheet->getStyle("A6:A$lastRow")->getAlignment()->setHorizontal('center');
                $event->sheet->getStyle("D6:D$lastRow")->getAlignment()->setHorizontal('center');
                $event->sheet->getStyle("E6:E$lastRow")->getAlignment()->setHorizontal('center');
                $event->sheet->getStyle("F6:F$lastRow")->getAlignment()->setHorizontal('center');

            }
        ];
    }
}
