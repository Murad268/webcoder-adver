<?php

namespace Modules\MenuLinks\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\RemoveService;
use App\Services\ServiceContainer;
use App\Services\SimpleCrudService;
use Illuminate\Http\Request;
use Modules\MenuLinks\Http\Requests\MenuRequest;
use Modules\MenuLinks\Http\Requests\MenuUpdateRequest;
use Modules\MenuLinks\Repositories\MenuLinkRepository;
use Modules\Lang\Repositories\ModelRepository;

class MenuLinksController extends Controller
{
    public function __construct(
        protected SimpleCrudService $crudService,
        protected MenuLinkRepository $menuLinkRepository,
        protected RemoveService $removeService,
        protected ModelRepository $langRepository,
        public ServiceContainer $services
    ) {
    }

    public function index()
    {
        $q = request()->q;
        $perPage = 40;
        $items = $q
            ? $this->menuLinkRepository->search($q, $perPage)
            : $this->menuLinkRepository->paginate($perPage);

        return view('menulinks::index', compact('items', 'q'));
    }

    public function create()
    {

        return view('menulinks::create');
    }

    public function store(Request $request)
    {
        return $this->executeSafely(function () use ($request) {
            $data = $request->all();
            $this->crudService->create($this->menuLinkRepository->getModel(), $data);
            return redirect()->route('menulinks.index')->with('status', 'Link uğurla yaradıldı.');
        }, 'menulinks.index');
    }

    public function show($id)
    {
        return view('menulinks::show');
    }

    public function edit($id)
    {
        $languages = $this->langRepository->all_active();

        $menuLink = $this->menuLinkRepository->find($id);
        return view('menulinks::edit', compact('menuLink', 'languages'));
    }

    public function update(Request $request, $id)
    {

        return $this->executeSafely(function () use ($request, $id) {
            $model = $this->menuLinkRepository->find($id);
            $this->services->crudService->update($model, $request, 'siteinfo');
            return redirect()->route('menulinks.index')->with('status', 'Link uğurla yeniləndi.');
        }, 'menulinks.index');
    }

    public function destroy($id)
    {
        // Implement the destroy logic if needed
    }

    public function delete_selected_items(Request $request)
    {
        return $this->executeSafely(function () use ($request) {
            $models = $this->menuLinkRepository->findWhereInGet($request->ids);
            $this->removeService->deleteWhereIn($models);
            return response()->json(['success' => true, 'message' => 'Link uğurla silindi.']);
        });
    }
}
