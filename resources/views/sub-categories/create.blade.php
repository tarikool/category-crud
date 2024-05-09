@extends('layout.main')

@section('content')

    <div class="btn-group btn-group float-right mt-3" role="group">
        @can("viewAny", App\Models\SubCategory::class)
            <a href="{{ route('sub-categories.index') }}" class="btn btn-primary" title="Show All sub Category">
                <span class="fa fa-list" aria-hidden="true"></span>
            </a>
        @endcan
    </div>
    <p class="clearfix"></p>
    <form method="POST" action="{{ route('sub-categories.store') }}" accept-charset="UTF-8">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="card-title">
                    <h4>Create New Sub Category</h4>
                </div>
            </div>
            <div class="card-body">
                @csrf()
                @include ('sub-categories.form', ['subCategory' => null ])
            </div>
            <div class="card-footer">
                <input class="btn btn-primary float-right" type="submit" value="Submit">
                <p class="clearfix"></p>
            </div>
        </div>
    </form>
@endsection


