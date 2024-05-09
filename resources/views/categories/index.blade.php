@extends('layout.main')

@section('content')
    <div class="btn-group btn-group float-right mt-3" role="group">
        @can("create", App\Models\Category::class)
            <a href="{{ route('categories.create') }}" class="btn btn-success" title="Create New Category">
                <span class="fa fa-plus" aria-hidden="true"></span>
            </a>
        @endcan
    </div>
    <p class="clearfix"></p>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="card-title">
                <h4>Categories</h4>
            </div>
        </div>
        <div class="card-card-body">
            @if(count($categories) == 0)
                <h4 class="text-center mb-5 mt-5">No Categories Available.</h4>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $index => $category)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->description }}</td>

                            <td style="width: 20%;">
                                <div class="btn-group" role="group">
                                    @can("view", $category)
                                        <a href="{{ route('categories.show', $category->id ) }}"
                                        class="btn btn-info btn-sm"
                                        title="Show Category">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    @endcan
                                    @can("update", $category)
                                        <a href="{{ route('categories.edit', $category->id ) }}" class="btn btn-primary btn-sm"
                                        title="Edit Category">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can("delete", $category)
                                        <button type="button" class="btn btn-danger btn-sm"
                                                title="Delete Category"
                                                data-toggle="modal"
                                                data-target="#delete-{{$index}}">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        @if($categories->hasPages())
            <div class="card-footer">
                <div class="float-right">
                    {!! $categories->render() !!}
                </div>
            </div>
        @endif

    </div>
      @foreach($categories as $index => $category)
        @can("delete", $category)
            <form method="POST" action="{!! route('categories.destroy', $category->id) !!}" accept-charset="UTF-8">
                @method("DELETE")
                @csrf
                <div class="modal fade in" id="delete-{{$index}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Confirm</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p> Delete {{$category->title}} ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endcan
    @endforeach
@endsection
