<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titleModal">Modal title</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" id="form-Modal" method="post" data-success="{{route('users')}}">
            @csrf
            <div class="modal-body">
                <div class="form-group mt-3">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="role">Role <span class="text-danger">*</span></label>
                    <select name="role" id="role" class="form-control">
                        <option value=""></option>
                        @foreach ($roles as $item)
                        <option value="{{$item->name}}">{{$item->name}}</option>
                        @endforeach
                    </select>
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