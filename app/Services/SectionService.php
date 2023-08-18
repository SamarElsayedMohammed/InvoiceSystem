<?php

namespace App\Services;

use App\DTO\SectionDTO;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\ServicesInterface;

class SectionService implements ServicesInterface
{

    public function CreateDTO($SectionData): SectionDTO
    {
        return new SectionDTO(
            $SectionData->input('section_id') ?? 0,
            $SectionData->input('section_name'),
            $SectionData->input('description'),
            Auth::user()->name
        );

    }
    public function CreateOrUpdate($SectionData): Section
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