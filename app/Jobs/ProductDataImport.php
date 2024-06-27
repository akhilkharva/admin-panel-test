<?php


namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Concerns\ToModel;
use Exception;
/*use Maatwebsite\Excel\Excel;*/
use App\Imports\ProductsBulkImport;
use Maatwebsite\Excel\Facades\Excel;
class ProductDataImport extends Job implements ShouldQueue
{
    use SerializesModels, RegistersEventListeners;

    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function handle(Excel $excel)
    {
        set_time_limit(0);
        Excel::import(new ProductsBulkImport,$this->file);

        /*return back();
        $load = $excel->import($this->file, function ($reader){
        $results = $reader->get();
        print_r($results);
        });*/

    }
}
