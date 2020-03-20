<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Category</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/category.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body style="margin:20px 10px 0px 10px;">
        <aside class="panel panel-default col-md-3">
            <div class='panel-heading'>
                <h3 class="panel-title">Tree List</h3>
            </div>
            <div class="panel-body">
                <ul>
                    @foreach($arr['parent'] as $parentEntity)
                        <li>{{$parentEntity->categories}}</li>
                        @if(count($parentEntity->childs))
                            @include('layouts.childs',['childs'=>$parentEntity->childs])
                        @endif
                    @endforeach
                </ul>
            </div>
        </aside>
        <main class="col-md-9">
            <div class="row col-md-offset-2 col-md-8"><h5><b>Create category</b><br><hr></h5></div>
            <form class="row col-md-offset-2 col-md-8">
                <input hidden value="" type="number" id='categoryId'>
                Parent:
                <select name="parent" id="parent">
                <option disabled selected>--select--</option>
                @foreach($arr['categories'] as $entity)
                    <option value="{{$entity->categories}}">{{$entity->categories}}</option>
                @endforeach
                </select>
                Category:
                <input type="text" id="category">
                <button type="button" name="addCategory" class="row col-md-offset-8 btn btn-info">Create</button>
            </form>
            <div style="margin-top: 30px;" class="row col-md-offset-2 col-md-8"><h5><b>List</b><br><hr></h5></div>
            <div class="table">
                <table class="row table table-hover table-condensed">
                    <thead>
                        <th>#ID</th>
                        <th>Category Name</th>
                        <th>Parent Name</th>
                        <th>Children</th>
                        <th hidden>Edit</th>
                        <th hidden>Del</th>
                    </thead>
                    <tbody>
                        @foreach($arr['page'] as $entity)
                            <tr data-id='{{$entity->id}}'>
                                <td>{{$entity->id}}</td>
                                <td name="category">{{$entity->categories}}</td>
                                <td name="parent">{{$entity->parent}}</td>
                                <td>
                                    @if(count($entity->childs))
                                        @foreach($entity->childs as $child)
                                            <span>{{$child->categories}} </span>
                                        @endforeach
                                    @endif
                                </td>
                                <td><a name="editCateogry" data-toggle="modal" onclick="event.preventDefault();editCateogy()" data-target="#updateModal"  href="#">Edit</a></td>
                                <td><a name="deleteCategory" data-toggle="modal" href="#" data-target="#deleteModal">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class='col-md-offset-9 col-md-3'>
                <td>{{$arr['page']->links()}}</td>
            </div>
        </main>
        @include('layouts.delete_modal')
    <script type="text/javascript" src="{{asset('js/category.js')}}"></script>
    </body>
</html>
