<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MemberCreateRequest;
use App\Http\Requests\MemberUpdateRequest;
use App\Repositories\MemberRepository;
use App\Validators\MemberValidator;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class MembersController.
 *
 * @package namespace App\Http\Controllers;
 */
class MembersController extends Controller
{
    /**
     * @var MemberRepository
     */
    protected $repository;

    /**
     * @var MemberValidator
     */
    protected $validator;

    /**
     * MembersController constructor.
     *
     * @param MemberRepository $repository
     * @param MemberValidator $validator
     */
    public function __construct(MemberRepository $repository, MemberValidator $validator)
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
        return view('members.index', compact('members'));
    }
    public function getData()
    {
        $member = $this->repository->all();
//        dd($member);

        return DataTables::of($member)

            ->addColumn('actions', function ($item) {
                $route = 'members';
                $id = $item->id;
                $type = array('s','e','d');
                return view('partials.actions',compact('route','id', 'type'));
            })
            ->addColumn('avatar',function($item){
                $avatar = $item->avatar;
                return view('partials.images',compact('avatar'));
            })
            ->addColumn('status',function ($item){
                $status = $item->status;
                return view('partials.label',compact('status'));
            })
            ->rawColumns(['actions','avatar','status'])

            ->make(true);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  MemberCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
//    public function store(MemberCreateRequest $request)
//    {
//        try {
//
//            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
//
//            $member = $this->repository->create($request->all());
//
//            //handle user upload avatar
//            if($request->hasFile('avatar')){
//                $request['avatar'] = $this->uploadFile($request->file('avatar'));
//            }
//            $response = [
//                'message' => 'Member created.',
//                'data'    => $member->toArray(),
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
        $member = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $member,
            ]);
        }

        return view('members.show', compact('member'));
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
        $member = $this->repository->find($id);

        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MemberUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MemberUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $data = $request->all();
            if($request->hasFile('avatar')){
                if(!$request->has('status')) {
                    $data['status'] = 0;
                }
                $data['avatar'] = $this->uploadFile($request->file('avatar'));

                $member = $this->repository->update($data, $id);
            }else{
                if(!$request->has('status')) {
                    $data['status'] = 0;
                }
                $member = $this->repository->update($data,$id);

            }

            $response = [
                'message' => 'Member updated.',
                'data'    => $member->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('members.index')->with('message', $response['message']);
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
                'message' => 'Member deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Member deleted.');
    }
}
