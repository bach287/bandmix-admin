<?php

namespace App\Http\Controllers;

use App\Repositories\GenreRepository;
use App\Repositories\LocationRepository;
use function foo\func;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\EventCreateRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Repositories\EventRepository;
use App\Validators\EventValidator;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class EventsController.
 *
 * @package namespace App\Http\Controllers;
 */
class EventsController extends Controller
{
    /**
     * @var EventRepository
     */
    protected $repository;

    /**
     * @var EventValidator
     */
    protected $validator;

    /**
     * EventsController constructor.
     *
     * @param EventRepository $repository
     * @param EventValidator $validator
     */
    public function __construct(EventRepository $repository, EventValidator $validator,GenreRepository $genreRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->genreRespository = $genreRepository;

    }

    public function create() {
        return view('events.create');
    }

    public function getData()
    {
        $events = $this->repository->all();

        return DataTables::of($events)
            ->addColumn('member',function ($item) {
                return $item->member->name;
            })
            ->addColumn('status', function ($item) {
                $status = $item->status;
                return view('partials.label',compact('status'));
            })
            ->addColumn('avatar', function ($item) {
                $avatar = $item->avatar;
                $type = 'event';
                return view('partials.images', compact('avatar', 'type'));
            })
            ->addColumn('actions', function ($item) {
                $route = 'events';
                $id = $item->id;
                $type = array('e','s');

                return view('partials.actions',compact('route','id','type'));
            })
            ->rawColumns(['actions','avatar','status'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events.index', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EventCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(EventCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $data = $request->all();
            $data['member_id'] = Auth::id();
            //handle user upload avatar
            if($request->hasFile('avatar')){
                $data['avatar'] = $this->uploadFile($request->file('avatar'));
            }else{
                $data['avatar'] = 'uploads/avatar/default.jpg';
            }
            //handle null time input
            if($request['time'] == '') {
                $data['time'] = date("Y-m-d H:i:s");
            }
            $event = $this->repository->create($data);
            $data['slug'] = str_slug($event->name, '-') . '-n'. $event->id;
            $this->repository->update($data,$event->id);
            $response = [
                'message' => 'Event created.',
                'data'    => $event->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('events.index')->with('message', $response['message']);
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
        $event = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $event,
            ]);
        }

        return view('events.show', compact('event'));
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
        $event = $this->repository->find($id);

        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EventUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EventUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $event = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Event updated.',
                'data'    => $event->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('events.index')->with('message', $response['message']);
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
                'message' => 'Event deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Event deleted.');
    }
}
