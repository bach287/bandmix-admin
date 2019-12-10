<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Repositories\NewsRepository;
use App\Validators\NewsValidator;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\CategoryRepository;


/**
 * Class NewsController.
 *
 * @package namespace App\Http\Controllers;
 */
class NewsController extends Controller
{
    /**
     * @var NewsRepository
     */
    protected $repository;
    protected $categoryRepository;

    /**
     * @var NewsValidator
     */
    protected $validator;

    /**
     * NewsController constructor.
     *
     * @param NewsRepository $repository
     * @param NewsValidator $validator
     */
    public function __construct(NewsRepository $repository, NewsValidator $validator, CategoryRepository $categoryRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->categoryRepository = $categoryRepository;
    }


    public function create()
	{
		$categories = $this->categoryRepository->pluck('name','id');
		return view('news.create',compact('categories'));
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->pluck('name','id');
        return view('news.index', compact('news','categories'));
    }

    public function getData()
	{
		$news = $this->repository->all();

		return DataTables::of($news)
            ->addColumn('title', function ($item) {
                $title_sub = $item->title;
                if(strlen($title_sub) > 50) {
                    return substr($title_sub,0,50) . '...';
                }
                return $title_sub;
            })
            ->addColumn('description', function ($item) {
                $description_sub = $item->description;
                if(strlen($description_sub) > 500) {
                    return substr($description_sub,0,500) . '...';
                }
                return $description_sub;
            })
            ->addColumn('status', function ($item) {
                $status = $item->status;
                return view('partials.label',compact('status'));
            })
            ->addColumn('avatar', function ($item) {
                $avatar = $item->avatar;
                $type = 'news';
                return view('partials.images', compact('avatar', 'type'));
            })
			->addColumn('actions', function ($item) {
				$route = 'news';
				$id = $item->id;
//				$slug = $item->slug;
				
				return view('partials.actions',compact('route','id'));
			})
			->addColumn('category',function ($item) {
                if($item->category != null) {
                    return $item->category->name;
                }
                return '';
			})
            ->addColumn('user',function ($item) {
                if($item->user != null) {
                    return $item->user->name;
                }
                return '';
            })
			->rawColumns(['actions','avatar','status'])
			->make(true);
	}
    /**
     * Store a newly created resource in storage.
     *
     * @param  NewsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(NewsCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $data = $request->all();

            $data['user_id'] = Auth::id();

            //handle user upload avatar
            if($request->hasFile('avatar')){
                $data['avatar'] = 'http://dev.admin.bandmix.com'. $this->uploadFile($request->file('avatar'));
            }else{
                $data['avatar'] = 'uploads/avatar/default.jpg';
            }
            $news = $this->repository->create($data);
            $data['slug'] = str_slug($news->title, '-') . '-n'. $news->id;
            $this->repository->update($data,$news->id);
            $response = [
                'message' => 'News created.',
                'data'    => $news->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }


            return redirect()->route('news.index')->with('message', $response['message']);
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
        $news = $this->repository->find($id);
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $news,
            ]);
        }

        return view('news.show', compact('news'));
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
        $categories = $this->categoryRepository->pluck('name', 'id');
        $news = $this->repository->find($id);
        return view('news.edit', compact('news','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NewsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(NewsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $data = $request->all();
            if($request->hasFile('avatar')){
                if(!$request->has('status')) {
                    $data['status'] = 0;
                }
                $data['avatar'] = 'http://dev.admin.bandmix.com'. $this->uploadFile($request->file('avatar'));
                $news = $this->repository->update($data, $id);
            }else{
                if(!$request->has('status')) {
                    $data['status'] = 0;
                }

                $news = $this->repository->update($request->except('avatar'),$id);
            }

            $response = [
                'message' => 'News updated.',
                'data'    => $news->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect('news')->with('message', $response['message']);
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
                'message' => 'News deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'News deleted.');
    }
}
