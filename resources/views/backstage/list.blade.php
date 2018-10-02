@inject('BuildTable', 'App\Services\TableServices\BaseBuildTableService')
@inject('BuildSearch', 'App\Services\SearchServices\BaseBuildSearchService')

@extends('backstage.dashboard')

@section('main')
    <div class="layui-col-md12">
        @component('backstage.layouts.search-bar', [
            'searchBar' => $BuildSearch->buildSearch($searchBarName),
            'dataRoute' => $dataRoute,
            'addPageRoute' => $addPageRoute,
            'submitForm' => $formEvent,
        ])
        @endcomponent
    </div>
    <div class="layui-col-md12">
        @component('backstage.layouts.list-table', [
            'tableThead' => $BuildTable->buildTable($tableName),
            'dataRoute' => $dataRoute,
        ])
        @endcomponent
    </div>
@endsection