@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <todo-app></todo-app>
            <!-- måsvingar $todos->links() måsvingar  För att få ut paginate -->
        </div>

    </div>
    @endsection