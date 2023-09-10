<?php

namespace App\Services;

use App\DTO\FileDTO;
use App\Events\CreateFileEvent;

class FileService
{

    public function CreateFileDTO($file,$invoice)
    {

        return  new FileDTO(
            $file,
            'invoices',
            $invoice->invoice_number,
            get_class($invoice),
            $invoice->id
        );

    }
    public function CreateFile($file, $invoice){
        $data = $this->CreateFileDTO($file, $invoice);
        return  CreateFileEvent::dispatch($data);
    }
}
