<?php

namespace App\Http\Controllers;

use App\Repositories\BillDetailRepository;
use App\Repositories\EventRepository;
use App\Repositories\MemberRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Repositories\BookRepository;
use App\Validators\BookValidator;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class BooksController.
 *
 * @package namespace App\Http\Controllers;
 */
class BooksController extends Controller
{
    /**
     * @var BookRepository
     */
    protected $repository;
    protected $memberRepository;
    protected $eventRepository;
    protected $billDetailRepository;

    /**
     * @var BookValidator
     */
    protected $validator;

    /**
     * BooksController constructor.
     *
     * @param BookRepository $repository
     * @param BookValidator $validator
     */
    public function __construct(BookRepository $repository, BookValidator $validator, MemberRepository $memberRepository, EventRepository $eventRepository,BillDetailRepository $billDetailRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->memberRepository = $memberRepository;
        $this->eventRepository = $eventRepository;
        $this->billDetailRepository = $billDetailRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = $this->memberRepository->pluck('name','id');
        $events = $this->eventRepository->pluck('name','id');
        return view('books.index', compact('books','members','events'));
    }
    public function getData(){
        $books = $this->repository->all();

        return DataTables::of($books)
            ->addColumn('total',function ($item) {
                $total = $item->bills->total;
                return $total;
            })
            ->addColumn('ship_form',function ($item) {
                    $ship_form =$item->ship_form;
                return view('partials.ship_form',compact('ship_form'));
            })
            ->addColumn('status',function ($item) {
                $status =$item->status;
                return view('partials.status_ship',compact('status'));
            })
            ->addColumn('date_order',function ($item) {
                  $date =  $item->bills->date_order;
                return $date;
            })
            ->addColumn('actions', function ($item) {
                $route = 'books';
                $id = $item->id;
                $type = array('e','s');
                return view('partials.actions',compact('route','id','type'));
            })

            ->rawColumns(['actions','total','date_order','ship_form','status'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BookCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BookCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $book = $this->repository->create($request->all());

            $response = [
                'message' => 'Book created.',
                'data'    => $book->toArray(),
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
        $book = $this->repository->find($id);
        $bill_detail = $this->billDetailRepository->findWhere([
            'book_id' => $book->id
        ]);
//
        return view('books.show', compact('book','bill_detail'));
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
        $book = $this->repository->find($id);

        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BookUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BookUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $book = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Book updated.',
                'data'    => $book->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect(route('books.index'))->with('message', $response['message']);
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
                'message' => 'Book deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Book deleted.');
    }
}
