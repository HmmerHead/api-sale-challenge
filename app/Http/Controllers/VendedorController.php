<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendedorRequest;
use App\Http\Requests\UpdateVendedorRequest;
use App\Models\Vendedor;
use App\Services\Interfaces\Vendedor\VendedorServiceInterface as VendedorService;

class VendedorController extends Controller
{
    public function __construct(public readonly VendedorService $vendedor)
    {

    }

    public function index()
    {
        return $this->vendedor->getVendedor();
    }

    public function store(StoreVendedorRequest $request)
    {
        return $this->vendedor->storeVendedor($request->all());
    }

    public function show(Vendedor $vendedor)
    {
        return $this->vendedor->showVendedor($vendedor->id);
    }

    public function update(UpdateVendedorRequest $request, Vendedor $vendedor)
    {
        return $this->vendedor->updateVendedor($request->all(), $vendedor->id);
    }

    public function destroy(Vendedor $vendedor)
    {
        return $this->vendedor->deleteVendedor($vendedor->id);
    }
}
