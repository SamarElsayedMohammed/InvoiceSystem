<?php

namespace App\Services;

use App\DTO\SectionDTO;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;

class SectionService
{

    public function CreateSectionDTO($SectionData): SectionDTO
    {
        return new SectionDTO(
            $SectionData->input('section_id'),
            $SectionData->input('section_name'),
            $SectionData->input('description'),
            Auth::user()->name
        );

    }
    public function CreateOrUpdateSection(SectionDTO $SectionData): Section
    {
        $newSection = Section::updateOrCreate(
            ['id' => $SectionData->section_id],
            [
                'section_name' => $SectionData->section_name,
                'description' => $SectionData->description,
                'created_by' => $SectionData->created_by

            ]
        );
        return $newSection;
    }

    public function FindById($id)
    {
        $section = Section::find($id);

        return $section;
    }
}
