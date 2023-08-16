<?php

namespace App\Repositories;

use Exception;
use App\DTO\SectionDTO;
use App\Enums\MessagesEnum;
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

        return $this->sectionService->CreateOrUpdateSection($sectionData);

    }

    public function UpdateSection($SectionData)
    {

        $sectionData = $this->sectionService->CreateSectionDTO($SectionData);
        $Section = $this->sectionService->FindById($SectionData->section_id);
        if ($Section != null) {
            return $this->sectionService->CreateOrUpdateSection($sectionData);
        }
        throw new Exception("Item NOt FOund");
    }

    public function DeleteSection(int $id)
    {
        $Section = $this->sectionService->FindById($id);
        if ($Section != null) {
            return $Section->delete();
        }
        throw new Exception("Item NOt FOund");

    }

    public function DeleteAllSections()
    {

    }
}
