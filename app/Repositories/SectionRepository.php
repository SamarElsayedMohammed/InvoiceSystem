<?php

namespace App\Repositories;

use Exception;
use App\DTO\SectionDTO;
use App\Enums\MessagesEnum;
use App\Services\SectionService;
use App\Interfaces\CRUDInterface;

class SectionRepository implements CRUDInterface
{
    private SectionService $sectionService;

    public function __construct(SectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }
    public function GetById(int $id)
    {

    }
    public function GetAlls()
    {

    }

    public function StoreNew($SectionData)
    {
        $sectionData = $this->sectionService->CreateDTO($SectionData);

        return $this->sectionService->CreateOrUpdate($sectionData);

    }

    public function Update($SectionData)
    {

        $sectionData = $this->sectionService->CreateDTO($SectionData);
        $Section = $this->sectionService->FindById($SectionData->section_id);
        if ($Section != null) {
            return $this->sectionService->CreateOrUpdate($sectionData);
        }
        throw new Exception("Item NOt FOund");
    }

    public function Delete(int $id)
    {
        $Section = $this->sectionService->FindById($id);
        if ($Section != null) {
            return $Section->delete();
        }
        throw new Exception("Item NOt FOund");

    }

    public function DeleteAll()
    {

    }
}