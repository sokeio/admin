<?php

namespace Sokeio\Admin\Concerns;

use Illuminate\Support\Facades\DB;
use Sokeio\Admin\BaseManager;
use Sokeio\Concerns\WithHelpers;

trait WithItemManager
{
    use WithHelpers;
    private  $cache__itemManager = null;
    private  $cache__query = null;
    private  $cache__model_is_translatable = null;
    public function isModelTranslatable()
    {
        return $this->cache__model_is_translatable ?? ($this->cache__model_is_translatabl = method_exists($this->getModel(), 'translations'));
    }
    public function UpdateById($data, $id)
    {
        if ($this->isModelTranslatable()) {
            ($this->GetModel())::find($id)->translations()->update($data);
        } else {
            ($this->GetModel())::where('id', $id)->update($data);
        }
    }
    public function DeleteById($id)
    {
        DB::transaction(function () use ($id) {
            ($this->GetModel())::find($id)->delete();
        });
    }
    protected function ItemManager(): BaseManager|null
    {
        return null;
    }
    public function getItemManager()
    {
        return ($this->cache__itemManager) ?? ($this->cache__itemManager = $this->ItemManager()?->CheckHook());
    }
    public function ClearCacheItemManager()
    {
        $this->cache__itemManager = null;
    }
    /**
     * Get a new query builder for the model's table.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery()
    {
        return $this->getItemManager()?->getBeforeQuery($this->getItemManager()?->getQuery());
    }

    public function getModel()
    {
        return ($this->getItemManager()?->getModel());
    }

    public function newModel()
    {
        return new ($this->getModel());
    }

    /**
     * Get a new query builder for the model's table.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuery()
    {
        return ($this->cache__query) ?? ($this->cache__query = $this->newQuery());
    }
    public function callDoAction($key, $params = [])
    {
        return $this->getItemManager()?->callDoAction($key, $params, $this);
    }
}
