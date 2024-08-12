<?php

namespace Modules\Work\Http\Controllers;

use App\Services\CommonService;
use App\Http\Controllers\Controller;
use App\Services\ServiceContainer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Work\Repositories\ModelRepository;
use Modules\Work\Models\Work;

class WorkController extends Controller
{
    public function __construct(
        public ServiceContainer $services,
        public ModelRepository $repository,
        public CommonService $commonService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->q;
        $activeItemsCount = $this->repository->all_active()->count();
        if ($q) {
            $items = $this->repository->search($q, 10);
        } else {
            $items = $this->repository->all(10);
        }
        return view('work::index', compact('items', 'q', 'activeItemsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = $this->services->langRepository->all_active();
        return view('work::create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        return $this->executeSafely(function () use ($request) {

            $this->services->crudService->create(new Work(), $request, 'work');

            return redirect()->route('admin.work.index')->with('status', 'work uğurla əlavə edildi');
        }, 'admin.work.index');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('work::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->executeSafely(function () use ($id) {
            $model = $this->repository->find($id);
            $languages = $this->services->langRepository->all_active();
            return view('work::edit', compact('languages', 'model'));
        }, 'admin.work.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        return $this->executeSafely(function () use ($request, $id) {
            $model = $this->repository->find($id);
            $this->services->crudService->update($model, $request, 'work');
            return redirect()->route('admin.work.index')->with('status', 'work uğurla yeniləndi');
        }, 'admin.work.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatusTrue($id)
    {
        return $this->commonService->changeStatus($id, $this->repository, $this->services->statusService, new Work(), true, 'admin.work.index');
    }

    public function changeStatusFalse($id)
    {
        return $this->commonService->changeStatus($id, $this->repository, $this->services->statusService, new Work(), false, 'admin.work.index');
    }

    public function delete_selected_items(Request $request)
    {
        return $this->commonService->deleteSelectedItems($this->repository, $request, $this->services->removeService, 'admin.work.index');
    }

    public function deleteFile($id)
    {
        return $this->commonService->deleteFile($id, $this->services->imageService, 'admin.work.index');
    }

    public function changeOrderUp($id) {
        $this->services->orderService->up(new Work(), $id);
        return redirect()->back();
    }

    public function changeOrderDown($id) {
        $this->services->orderService->down(new Work, $id);
        return redirect()->back();
    }
}
