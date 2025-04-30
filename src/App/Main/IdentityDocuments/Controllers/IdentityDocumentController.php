<?php

declare(strict_types=1);


namespace App\Main\IdentityDocuments\Controllers;

use App\Main\IdentityDocuments\Queries\IdentityDocumentIndexQuery;
use App\Main\IdentityDocuments\Tables\IdentityDocumentsTable;
use Domain\IdentityDocuments\Actions\SaveIdentityDocument;
use Domain\IdentityDocuments\Data\IdentityDocumentData;
use Domain\IdentityDocuments\Models\IdentityDocument;
use Domain\Shared\Enums\ResourcesEnum;
use Illuminate\Http\RedirectResponse;
use Spatie\LaravelData\PaginatedDataCollection;
use Support\Controllers\ResourcesController;

class IdentityDocumentController extends ResourcesController
{

    /**
     * @inheritDoc
     */
    protected function model(): ?string
    {
        return IdentityDocument::class;
    }

    /**
     * @inheritDoc
     */
    protected static function resource(): ResourcesEnum
    {
        return ResourcesEnum::IDENTITY_DOCUMENT;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(IdentityDocumentIndexQuery $query)
    {
        self::checkIfIsAllowedToView();

        $dataRows = IdentityDocumentData::collect(
            $query ->paginate() ->appends(request()->query()),
            PaginatedDataCollection::class
        ) ->include('deleted_at');

        return inertia('IdentityDocument/Index', [
            "viewElements"  => static::getListViewElements(),
            "dataTable"     => IdentityDocumentsTable::make($dataRows) ->toArray(),
            "filters"       => request() ->input("search"),
            "formSchema"    => IdentityDocumentData::empty(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IdentityDocumentData $data
     *
     * @return RedirectResponse
     */
    public function store(IdentityDocumentData $data): RedirectResponse
    {
        self::checkIfIsAllowedToCreate();

        SaveIdentityDocument::execute($data);

        flash_success(__('messages.data.saved'));

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param IdentityDocument $identityDocument
     * @param IdentityDocumentData $data
     *
     * @return RedirectResponse
     */
    public function update(IdentityDocument $identityDocument, IdentityDocumentData $data): RedirectResponse
    {
        self::checkIfIsAllowedToUpdate();

        SaveIdentityDocument::execute($data, $identityDocument);

        flash_success(__('messages.data.updated'));

        return back();
    }
}
