<?php

namespace App\Http\Controllers;

use App\Repositories\BandRepository;
use App\Repositories\BookRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\EventRepository;
use App\Repositories\MemberRepository;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\StatisticCreateRequest;
use App\Http\Requests\StatisticUpdateRequest;
use App\Repositories\StatisticRepository;
use App\Validators\StatisticValidator;

/**
 * Class StatisticsController.
 *
 * @package namespace App\Http\Controllers;
 */
class StatisticsController extends Controller
{
    /**
     * @var StatisticRepository
     */
    protected $repository;

    /**
     * @var StatisticValidator
     */
    protected $validator;
    protected $eventRepository;
    protected $memberRepository;
    protected $bookRepository;
    protected $categoryRepository;
    protected $newsRepository;
    protected $bandRepository;


    /**
     * StatisticsController constructor.
     *
     * @param StatisticRepository $repository
     * @param StatisticValidator $validator
     */
    public function __construct(StatisticRepository $repository, StatisticValidator $validator,EventRepository $eventRepository,MemberRepository $memberRepository
    , BookRepository $bookRepository,CategoryRepository $categoryRepository,NewsRepository $newsRepository ,BandRepository $bandRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->eventRepository = $eventRepository;
        $this->memberRepository = $memberRepository;
        $this->bookRepository = $bookRepository;
        $this->categoryRepository = $categoryRepository;
        $this->newsRepository = $newsRepository;
        $this->bandRepository = $bandRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->bookRepository->all();
        $members = $this->memberRepository->all();
        $events= $this->eventRepository->all();
        $categories = $this->categoryRepository->all();
        $news = $this->newsRepository->all();
        $bands = $this->bandRepository->all();
        return view('Statistics.index',compact('events','members','books','categories','news','bands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StatisticCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(StatisticCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $statistic = $this->repository->create($request->all());

            $response = [
                'message' => 'Statistic created.',
                'data'    => $statistic->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statistic = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $statistic,
            ]);
        }

        return view('statistics.show', compact('statistic'));
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
        $statistic = $this->repository->find($id);

        return view('statistics.edit', compact('statistic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StatisticUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(StatisticUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $statistic = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Statistic updated.',
                'data'    => $statistic->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
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
                'message' => 'Statistic deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Statistic deleted.');
    }
}
