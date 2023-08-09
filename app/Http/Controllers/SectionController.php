<?php

namespace App\Http\Controllers;

use App\DTO\SectionDTO;
use App\Models\Section;
use App\Enums\MessagesEnum;
use App\Traits\WebResponce;
use Illuminate\Http\Request;
use App\Services\SectionService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SectionRequset;
use App\Repositories\SectionRepository;

class SectionController extends Controller
{
    use WebResponce;
    private SectionRepository $sectionRepository;

    public function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sections.index');
    }

    public function store(SectionRequset $request)
    {
        try {

            $this->sectionRepository->StoreNewSection($request);

            return $this->success(MessagesEnum::CreateItem, 'admin.sections.index');
        } catch (\Exception $e) {
            return $this->error(MessagesEnum::CodeError, "admin.sections.index");

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }
}