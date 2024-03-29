<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\FeedbackCreateRequest;
use App\Http\Requests\FeedbackUpdateRequest;
use App\Repositories\FeedbackRepository;
use App\Validators\FeedbackValidator;
use Yajra\DataTables\DataTables;

/**
 * Class FeedbackController.
 *
 * @package namespace App\Http\Controllers;
 */
class FeedbackController extends Controller
{
    /**
     * @var FeedbackRepository
     */
    protected $repository;

    /**
     * @var FeedbackValidator
     */
    protected $validator;

    /**
     * FeedbackController constructor.
     *
     * @param FeedbackRepository $repository
     * @param FeedbackValidator $validator
     */
    public function __construct(FeedbackRepository $repository, FeedbackValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('feedbacks.index');
    }
    public function getData()
    {
        $feedback = $this->repository->all();
        return DataTables::of($feedback)
            ->addColumn('status', function ($item) {
                $status = $item->status;
                return view('partials.label',compact('status'));
            })

            ->addColumn('actions', function ($item) {
                $route = 'feedback';
                $id = $item->id;
                $type = array('s','d');
                return view('partials.actions',compact('route','id','type'));
            })
            ->rawColumns(['status','actions'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FeedbackCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
//    public function store(FeedbackCreateRequest $request)
//    {
//        try {
//
//            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
//
//            $feedback = $this->repository->create($request->all());
//
//            $response = [
//                'message' => 'Feedback created.',
//                'data'    => $feedback->toArray(),
//            ];
//
//            if ($request->wantsJson()) {
//
//                return response()->json($response);
//            }
//
//            return redirect()->back()->with('message', $response['message']);
//        } catch (ValidatorException $e) {
//            if ($request->wantsJson()) {
//                return response()->json([
//                    'error'   => true,
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
        $feedback = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $feedback,
            ]);
        }

        return view('feedbacks.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        $feedback = $this->repository->find($id);
//
//        return view('feedback.edit', compact('feedback'));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FeedbackUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
//    public function update(FeedbackUpdateRequest $request, $id)
//    {
//        try {
//
//            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
//
//            $feedback = $this->repository->update($request->all(), $id);
//
//            $response = [
//                'message' => 'Feedback updated.',
//                'data'    => $feedback->toArray(),
//            ];
//
//            if ($request->wantsJson()) {
//
//                return response()->json($response);
//            }
//
//            return redirect()->back()->with('message', $response['message']);
//        } catch (ValidatorException $e) {
//
//            if ($request->wantsJson()) {
//
//                return response()->json([
//                    'error'   => true,
//                    'message' => $e->getMessageBag()
//                ]);
//            }
//
//            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
//        }
//    }


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
                'message' => 'Feedback deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Feedback deleted.');
    }
}
