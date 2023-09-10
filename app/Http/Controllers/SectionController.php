<?php

namespace App\Http\Controllers;

use App\DTO\SectionDTO;
use App\Models\Section;
use App\Enums\MessagesEnum;
use App\Traits\WebResponce;
use Illuminate\Http\Request;
use App\Services\SectionService;

use App\DataTables\SectionDataTable;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SectionRequset;
use App\Repositories\SectionRepository;
use Yajra\DataTables\Facades\DataTables;

class SectionController extends Controller
{
    use WebResponce;
    private SectionRepository $sectionRepository;

    public function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    public function index(SectionDataTable $dataTable)
    {

        if (request()->ajax()) {
            return $dataTable->ajax()->content();
        }
        return view('dashboard.sections.index');

    }

    public function store(SectionRequset $request)
    {
        try {

            $this->sectionRepository->StoreNew($request);

            return $this->success(MessagesEnum::CreateItem, 'admin.sections.index');
        } catch (\Exception $e) {
            return $this->error(MessagesEnum::CodeError, "admin.sections.index");

        }
    }
    public function update(SectionRequset $request)
    {
        try {

            $section = $this->sectionRepository->Update($request);
            return $this->success(MessagesEnum::UpdatetItem, 'admin.sections.index');

        } catch (\Exception $e) {
            return $this->error($e->getMessage(), "admin.sections.index");

        }

    }

    public function destroy(Request $request)
    {

        try {
            $this->sectionRepository->Delete($request->section_id);
            return $this->success(MessagesEnum::DeletItem, 'admin.sections.index');

        } catch (\Exception $e) {
            return $this->error($e->getMessage(), "admin.sections.index");

        }
    }
}
