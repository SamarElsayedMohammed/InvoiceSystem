<?php

namespace App\Repositories;

use App\DTO\SectionDTO;
use App\Services\SectionService;
use App\Interfaces\SectionInterface;

class SectionRepository implements SectionInterface
{
    private SectionService $sectionService;

    public function __construct(SectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }
    public function GetSectionById(int $id)
    {

    }
    public function GetAllSections()
    {

    }

    public function StoreNewSection($SectionData)
    {
        $sectionData = $this->sectionService->CreateSectionDTO($SectionData);

        return $this->sectionService->CreateSection($sectionData);

    }

    public function UpdateSection(SectionDTO $SectionDTOData, int $id)
    {

    }

    public function DeleteSection(int $id)
    {

    }

    public function DeleteAllSections()
    {

    }
}