<?php

namespace App\Http\Controllers;

use App\Repositories\MemberRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BandCreateRequest;
use App\Http\Requests\BandUpdateRequest;
use App\Repositories\BandRepository;
use App\Validators\BandValidator;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class BandsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BandsController extends Controller
{
    /**
     * @var BandRepository
     */
    protected $repository;
    protected $memberRepository;

    /**
     * @var BandValidator
     */
    protected $validator;

    /**
     * BandsController constructor.
     *
     * @param BandRepository $repository
     * @param BandValidator $validator
     */
    public function __construct(BandRepository $repository, BandValidator $validator, MemberRepository $memberRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->memberRepository = $memberRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $members = $this->memberRepository->pluck('name', 'id');
        return view('bands.index', compact('bands', 'members'));
    }

    public function getData()
    {
        $bands = $this->repository->all();
        return DataTables::of($bands)
            ->addColumn('status', function ($item) {
                $status = $item->status;
                return view('partials.label', compact('status'));
            })
            ->addColumn('avatar', function ($item) {
                $avatar = $item->avatar;
                $type = 'news';
                return view('partials.images', compact('avatar', 'type'));
            })
            ->addColumn('actions', function ($item) {
                $route = 'bands';
                $id = $item->id;
                return view('partials.actions',compact('route','id'));
            })
            ->addColumn('member',function ($item) {
                if($item->member != null) {
                    return $item->member->name;
                }
                return '';
            })
            ->rawColumns(['actions', 'avatar', 'status'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BandCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
//    public function store(BandCreateRequest $request)
//    {
//        try {
//
//            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
//
//            $band = $this->repository->create($request->all());
//
//            $response = [
//                'message' => 'Band created.',
//                'data' => $band->toArray(),
//            ];
//
//            if ($request->wantsJson()) {
//
//                return response()->json($response);
//            }
//
//            return redirect()->route('bands.index')->with('message', $response['message']);
//        } catch (ValidatorException $e) {
//            if ($request->wantsJson()) {
//                return response()->json([
//                    'error' => true,
//                    'message' => $e->getMessageBag()
//                ]);
//            }
//
//            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
//        }
//    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $band = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $band,
            ]);
        }

        return view('bands.show', compact('band'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $band = $this->repository->find($id);

        return view('bands.edit', compact('band'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BandUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BandUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $band = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Band updated.',
                'data' => $band->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('bands.index')->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Band deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Band deleted.');
    }
}
