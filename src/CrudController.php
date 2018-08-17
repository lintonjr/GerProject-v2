<?php


namespace GERP\Framework;
use App\Models\Users;

abstract class CrudController
{
    abstract protected function getModel() :string;

    public function index($container, $request)
    {
        return $container[$this->getModel()]->all();
    }

   public function create($container, $request)
    {
        return $container[$this->getModel()]->create($request->request->all());
    }

   public function update($container, $request)
    {
        $id = $request->attributes->get(1);
        return $container[$this->getModel()]->update(['id' => $id], $request->request->all());
    }

   public function show($container, $request)
    {
        $id = $request->attributes->get(1);
        return $container[$this->getModel()]->get(['id' => $id]);
    }

   public function delete($container, $request)
    {
        $id = $request->attributes->get(1);
        return $container[$this->getModel()]->delete(['id' => $id]);
    }


}