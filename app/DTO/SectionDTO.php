<?php

namespace App\DTO;

class SectionDTO
{

    public int $section_id;
    public string $section_name;
    public string $description;
    public string $created_by;

    public function __construct(int $section_id, string $section_name, string $description, string $created_by)
    {
        $this->section_id = $section_id;
        $this->section_name = $section_name;
        $this->description = $description;
        $this->created_by = $created_by;
    }
}
