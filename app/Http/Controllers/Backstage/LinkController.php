<?php

namespace App\Http\Controllers\Backstage;

use App\Models\Link;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    protected $master = 'link';
    protected $formEvent = 'linkForm';
    protected $tableName = 'LinkTableService';
    protected $searchBarName = 'LinkSearchService';
    protected $formName = 'LinkFormService';
    protected $model = Link::class;

    /**
     * @param $data
     */
    public function handleDataDisplay(&$data)
    {
        if ($data) {
            $data->each(function ($item, $key) {
                $item->editRoute = route($this->routeConf['editPage'], $item->id);
                $item->delRoute = route($this->routeConf['del'], $item->id);
                $item->status = Link::$linkStatus[$item->status];
                $item->allowEdit = true;
                $item->allowDel = true;
            });
        }
    }

    /**
     * @return array
     */
    public function validateRules()
    {
        return [
            'name' => 'required|max:255',
            'link' => 'required|max:255',
        ];
    }

    /**
     * @param $id
     * @return array
     */
    public function delLink($id)
    {
        return parent::del($id, route($this->routeConf['list']));
    }
}
