<div class="card mt-3 mb-3">
    <div class="card-header">Filter</div>
    <div class="card-body">
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <label for="search" class="col-form-label">Search</label>
                    <form>
                        <input type="text" name="search" id="search" class="form-control"/>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="status" class="col-form-label">Status</label>
                    <select id="status" class="form-control status"
                            data-sorting_type="asc" data-column_name="status">
                        <option value="all" data-sorting_type="asc">All</option>
                        <option value="wait" data-sorting_type="asc">Wait</option>
                        <option value="active" data-sorting_type="asc">Active</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
