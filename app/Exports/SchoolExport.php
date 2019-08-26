<?php

namespace App\Exports;

use App\School;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class SchoolExport implements FromQuery, WithMapping,WithHeadings, WithEvents
{
   	use Exportable,RegistersEventListeners;

   	private $rows ="0";

    public function query()
    {
        return School::query()->with(['infrastructure','infrastructure.Classroom','infrastructure.Library','infrastructure.LeadershipRoom','infrastructure.TeacherRoom','infrastructure.Toilet','infrastructure.Lab','infrastructure.Warehouse','infrastructure.WorshipRoom','infrastructure.Sportsvenue','infrastructure.HealthUnit']);
    }

    public function map($school): array
    {
    	++$this->rows;


        return [
           $this->rows,
           $school->nama,
           $school->npsn,
           $school->bp,
           $school->status,
           $school->alamat,
           $school->kecamatan,
           $school->lb1,
           $school->lb2,
           $school->lb3,
           (isset($school->infrastructure->peserta_didik)) ? strval( $school->infrastructure->peserta_didik ):"0",
            (isset($school->infrastructure->rombel)) ? strval( $school->infrastructure->rombel):"0",
            (isset($school->infrastructure->guru)) ? strval( $school->infrastructure->guru ):"0",
            (isset($school->infrastructure->tendik)) ? strval( $school->infrastructure->tendik ):"0",
            (isset($school->infrastructure->classroom[0]->jumlah)) ? strval( $school->infrastructure->classroom[0]->jumlah ):"0",
            (isset($school->infrastructure->library[0]->jumlah)) ? strval($school->infrastructure->library[0]->jumlah):"0",
            (isset($school->infrastructure->lab[0]->jumlah)) ? strval( $school->infrastructure->lab[0]->jumlah ):"0",
            (isset($school->infrastructure->leadershipRoom[0]->jumlah)) ? strval( $school->infrastructure->leadershipRoom[0]->jumlah ):"0",
            (isset($school->infrastructure->teacherRoom[0]->jumlah)) ? strval( $school->infrastructure->teacherRoom[0]->jumlah ):"0",
            (isset($school->infrastructure->worshipRoom[0]->jumlah)) ? strval( $school->infrastructure->worshipRoom[0]->jumlah):"0",
            (isset($school->infrastructure->toilet[0]->jumlah)) ? strval( $school->infrastructure->toilet[0]->jumlah ):"0",
            (isset($school->infrastructure->sportsvenue[0]->jumlah)) ? strval( $school->infrastructure->sportsvenue[0]->jumlah):"0",
            (isset($school->infrastructure->warehouse[0]->jumlah)) ? strval( $school->infrastructure->warehouse[0]->jumlah ):"0",
            (isset($school->infrastructure->healthunit[0]->jumlah)) ? strval( $school->infrastructure->healthunit[0]->jumlah ):"0",
           
        ];
    }	

      public function headings(): array
     {
        return [
            'No',
            'Nama Sekolah',
            'NPSN',
            'BP',
            'Status',
            'Alamat',
            'Kecamatan',
            'Luas 1 Lantai',
            'Luas 2 Lantai',
            'Luas 3 Lantai',
            'PD',
            'Rombel',
            'Guru',
            'Tendik',
            'R.Kelas',
            'R.Perpus',
            'R.Lab',
            'R.Pemimpin',
            'R.Guru',
            'Tempat Ibadah',
            'Toilet',
            'Tempat Olahraga',
            'Gudang',
            'Uks',
        ];
    }

    public static function beforeSheet(BeforeSheet $event)
    {
        return [
            BeforeSheet::class => function(BeforeSheet $event) {
            	$event->getActiveSheet()->getActiveSheet()->setCellValue('A5', 'PhpSpreadsheet');
            },
        ];
    }
}
