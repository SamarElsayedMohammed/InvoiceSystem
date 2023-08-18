<?php

namespace App\Interfaces;

use App\DTO\SectionDTO;
use App\Models\Section;

interface CRUDInterface
{

    public function GetById(int $id);
    public function GetAlls();

    public function StoreNew($Data);

    public function Update($Data);
    public function Delete(int $id);

    // public function DeleteAllSections(): bool;

}