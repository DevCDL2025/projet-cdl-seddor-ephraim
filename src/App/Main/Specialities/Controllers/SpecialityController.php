<?php

declare(strict_types=1);


namespace App\Main\Specialities\Controllers;

use App\Main\Specialities\Queries\SpecialityIndexQuery;
use App\Main\Specialities\Tables\SpecialitiesTable;
use Domain\Shared\Enums\ResourcesEnum;
use Domain\Specialities\Actions\SaveSpeciality;
use Domain\Specialities\Data\SpecialityData;
use Domain\Specialities\Models\Speciality;
use Illuminate\Http\RedirectResponse;
use Spatie\LaravelData\PaginatedDataCollection;
use Support\Controllers\ResourcesController;

class SpecialityController extends ResourcesController
{

    /**
     * @inheritDoc
     */
    protected function model(): ?string
    {
        return Speciality::class;
    }

    /**
     * @inheritDoc
     */
    protected static function resource(): ResourcesEnum
    {
        return ResourcesEnum::SPECIALITY;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(SpecialityIndexQuery $query)
    {
        self::checkIfIsAllowedToView();

        $dataRows = SpecialityData::collect(
            $query ->paginate() ->appends(request()->query()),
            PaginatedDataCollection::class
        ) ->include('deleted_at');

        return inertia('Speciality/Index', [
            "viewElements"  => static::getListViewElements(),
            "dataTable"     => SpecialitiesTable::make($dataRows) ->toArray(),
            "filters"       => request() ->input("search"),
            "formSchema"    => SpecialityData::empty(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SpecialityData $data
     *
     * @return RedirectResponse
     */
    public function store(SpecialityData $data): RedirectResponse
    {
        self::checkIfIsAllowedToCreate();

        SaveSpeciality::execute($data);

        flash_success(__('messages.data.saved'));

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Speciality $speciality
     * @param SpecialityData $data
     *
     * @return RedirectResponse
     */
    public function update(Speciality $speciality, SpecialityData $data): RedirectResponse
    {
        self::checkIfIsAllowedToUpdate();

        SaveSpeciality::execute($data, $speciality);

        flash_success(__('messages.data.updated'));

        return back();
    }
}
