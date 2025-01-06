<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titleModal">Modal title</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" id="form-Modal" method="post" data-success="{{route('menuitems')}}">
            @csrf
            <div class="modal-body">
                <div class="form-group mt-3">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="eng_name">English Name <span class="text-danger">*</span></label>
                    <input type="text" name="eng_name" id="eng_name" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="description">Description <span class="text-danger">*</span></label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="eng_description">English Description <span class="text-danger">*</span></label>
                    <input type="text" name="eng_description" id="eng_description" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="vendor_id">Vendor <span class="text-danger">*</span></label>
                    <select name="vendor_id" id="vendor_id" class="form-control">
                      <option value=""></option>
                      @foreach ($vendors as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="category_id">Category <span class="text-danger">*</span></label>
                    <select name="category_id" id="category_id" class="form-control">
                      <option value=""></option>
                      @foreach ($categories as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="price">Price <span class="text-danger">*</span></label>
                  <input type="number" name="price" id="price" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
              <button class="btn btn-secondary" type="submit">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>