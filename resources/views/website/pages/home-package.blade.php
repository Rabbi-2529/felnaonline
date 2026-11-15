@extends('website.master')
@section('title', 'Home Packages')

@section('body')
    @include('website.includes.page-hero', [
        'title' => 'Home Packages',
        'subtitle' => 'Fast, reliable broadband for homes and families in Dhaka.',
        'crumbs' => ['Packages' => route('home-package')],
    ])

    @include('website.includes.package-page', [
        'packages' => $homePackages,
        'tag' => 'Home',
        'idField' => 'home_package_id',
        'orderRoute' => 'home-package.orderHomePackage',
    ])
@endsection
