@extends('website.master')
@section('title', 'Corporate Packages')

@section('body')
    @include('website.includes.page-hero', [
        'title' => 'Corporate Packages',
        'subtitle' => 'Dependable connectivity for offices, shops and growing businesses.',
        'crumbs' => ['Packages' => route('corporate-package')],
    ])

    @include('website.includes.package-page', [
        'packages' => $corporatePackages,
        'tag' => 'Corporate',
        'idField' => 'corporate_package_id',
        'orderRoute' => 'corporate-package.orderCorporatePackage',
    ])
@endsection
