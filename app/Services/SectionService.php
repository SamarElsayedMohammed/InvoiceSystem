<?php

namespace App\Services;

use App\DTO\SectionDTO;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;

class SectionService
{

    public function CreateSectionDTO($SectionData) :SectionDTO {
        return  new SectionDTO(
            $SectionData->input('section_name'),
            $SectionData->input('description'),
            Auth::user()->name
        );

    }
    public function CreateSection(SectionDTO $SectionData) :Section
    {
        $newSection =  Section::create(
            [
                'section_name' => $SectionData->section_name,
                'description' => $SectionData->description,
                'created_by' => $SectionData->created_by

            ]
        );
        return $newSection;
    }
}