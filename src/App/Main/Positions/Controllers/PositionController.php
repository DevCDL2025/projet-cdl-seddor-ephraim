<?php

declare(strict_types=1);


namespace App\Main\Positions\Controllers;

use App\Main\Positions\Queries\PositionIndexQuery;
use App\Main\Specialities\Tables\SpecialitiesTable;
use Domain\Positions\Actions\SavePosition;
use Domain\Positions\Data\PositionData;
use Domain\Positions\Models\Position;
use Domain\Shared\Enums\ResourcesEnum;
use Illuminate\Http\RedirectResponse;
use Spatie\LaravelData\PaginatedDataCollection;
use Support\Controllers\ResourcesController;

class PositionController extends ResourcesController
{

    /**
     * @inheritDoc
     */
    protected function model(): ?string
    {
        return Position::class;
    }

    /**
     * @inheritDoc
     */
    protected static function resource(): ResourcesEnum
    {
        return ResourcesEnum::POSITION;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(PositionIndexQuery $query)
    {
        self::checkIfIsAllowedToView();

        $dataRows = PositionData::collect(
            $query ->paginate() ->appends(request()->query()),
            PaginatedDataCollection::class
        ) ->include('deleted_at');

        return inertia('Position/Index', [
            "viewElements"  => static::getListViewElements(),
            "dataTable"     => SpecialitiesTable::make($dataRows) ->toArray(),
            "filters"       => request() ->input("search"),
            "formSchema"    => PositionData::empty(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PositionData $data
     *
     * @return RedirectResponse
     */
    public function store(PositionData $data): RedirectResponse
    {
        self::checkIfIsAllowedToCreate();

        SavePosition::execute($data);

        flash_success(__('messages.data.saved'));

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Position $Position
     * @param PositionData $data
     *
     * @return RedirectResponse
     */
    public function update(Position $Position, PositionData $data): RedirectResponse
    {
        self::checkIfIsAllowedToUpdate();

        SavePosition::execute($data, $Position);

        flash_success(__('messages.data.updated'));

        return back();
    }
}
