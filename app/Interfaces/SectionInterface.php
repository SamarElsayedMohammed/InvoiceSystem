<?php

namespace App\Interfaces;

use App\DTO\SectionDTO;
use App\Models\Section;

interface SectionInterface
{

    public function GetSectionById(int $id);
    public function GetAllSections();

    public function StoreNewSection($SectionData);

    // public function UpdateSection(SectionDTO $SectionDTOData ,int $id): Section;

    // public function DeleteSection(int $id):bool;

    // public function DeleteAllSections(): bool;

}