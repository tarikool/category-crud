
<div class="form-group">
    <label for="title">Title</label>
    <input id="title"
           class="form-control"
           name="title"
           type="text"
           value="{{ old('title', optional($subCategory)->title) }}"
           minlength="1"
           maxlength="255"
           required="true"
           placeholder="Enter title"/>
    {!! $errors->first('title', '<p class="text-danger">:message</p>') !!}
</div>

<div class="form-group">
    <label for="role_id">Role</label>
    <select class="form-control" id="role_id" name="category_id" required="true">
        <option value="" style="display: none;" {{ old('category_id', optional($subCategory)->category_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', optional($subCategory)->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->title }}
            </option>
        @endforeach
    </select>
    {!! $errors->first('category_id', '<p class="text-danger">:message</p>') !!}
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" cols="3" rows="5" id="description" required="true">{{ old('description', optional($subCategory)->description) }}</textarea>
    {!! $errors->first('description', '<p class="text-danger">:message</p>') !!}
</div>

