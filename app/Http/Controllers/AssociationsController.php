<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssociationsStoreRequest;
use App\Models\Association;
use App\Models\Donor;
use App\Models\Organizations;
use App\Models\OrganizationType;
use App\Repositories\AssociationRepository;
use Illuminate\Http\Request;

class AssociationsController extends Controller
{

    private $associationRepository;

    public function __construct(AssociationRepository $associationRepository)
    {
        $this->associationRepository = $associationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->associationRepository->getAll();

        if (request()->ajax()) {
            return $this->datatable($data);
        }

        request()->flash();

        $organizationTypes  = OrganizationType::all();

        return view('associations.index', [
            "organizationTypes" => $organizationTypes,
        ]);
    }

    public function datatable($data)
    {
        return datatables()->of($data)
            ->addColumn('action', function ($association) {
                $button = '<a href="' . route("association.edit", $association->slug) . '" class="btn btn-primary btn-sm mr-1" data-toggle="tooltip" data-title="Edit" data-placement="left">
                                        <i class="mdi mdi-account-edit"></i>
                                    </a>';
                $button .= '<button type="button" id="' . $association->slug . '" onclick="deleteObj(\'associations\', \'id\', \'' . $association->id . '\', \'\', \'association\', \'\', \'yes\')" class="edit btn btn-danger btn-sm" data-toggle="tooltip" data-title="Delete" data-placement="left">
                                        <i class="mdi mdi-trash-can"></i>
                                    </button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $association            = new Association();
        $organizationsGroup     = $this->associationRepository->getOrganizationsGroupedByType();

        return view('associations.form', [
            "association"           => $association,
            "organizationsGroup"    => $organizationsGroup,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssociationsStoreRequest $request)
    {
        $response = $request->storeAssociation($request);

        session()->flash($response["status"], $response["message"]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $association       = $this->associationRepository->findAssociationBySlug($slug);
        if (!$association) {
            abort(404);
        }

        $donors         = Donor::all();
        $organizations  = Organizations::all();

        return view('associations.form', [
            "association"      => $association,
            "donors"           => $donors,
            "organizations"    => $organizations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(AssociationsStoreRequest $request, $slug)
    {
        $response = $request->updateCurrentAssociation($request, $slug);

        session()->flash($response["status"], $response["message"]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
