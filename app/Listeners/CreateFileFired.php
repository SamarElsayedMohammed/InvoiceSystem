<?php

namespace App\Listeners;

use App\Models\File;
use App\Traits\FileTrait;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateFileFired
{
    use FileTrait;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $file_name = $this->saveFile($event->Data->file, $event->Data->folder, $event->Data->subFolder);
        $file_type = $this->FileType($event->Data->file->clientExtension());

        $images = new File();
        $images->file_name = $file_name;
        $images->Fileable_id = $event->Data->id;
        $images->Fileable_type = $event->Data->class;
        $images->type = $file_type;
        $images->save();
    }
}
