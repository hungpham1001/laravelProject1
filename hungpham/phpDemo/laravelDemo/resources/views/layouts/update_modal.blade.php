
<div id="updateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Category</h4>
      </div>
      <div class="modal-body">
        <ul id="updateFrm"></ul>
        <input id="categoryId" type="number" hidden>
        <label class="form-inline">Parent: <select class="form-control" name="editParent" id="editParent">
            @foreach($arr['parent'] as $entity)
                <option value="{{$entity->parent}}">{{$entity->parent}}</option>
            @endforeach
        </select></label><br>
        <label class="form-inline">Category: <input id="editCategoryName" class="form-control" type="text" placeholder="change category name"></label>
      </div>
      <div class="modal-footer">
        <button id="updateButton" type="button" class="btn btn-warning">Update</button>
        <button type="button" name="close_update_modal" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>