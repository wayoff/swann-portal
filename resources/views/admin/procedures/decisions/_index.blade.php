@extends('admin.layouts.content')

@section('Page__Description')
    Trouble Shooting / Decision Tree
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
        </li>
        <li>
            <a href="#">Procedure : {{$procedure->name}}</a>
        </li>
        <li class="active">
            <a href="#"> Decision Tree </a>
        </li>
    </ol>
@stop

@section('header')
    <meta id="procedure_id" data-content="{{$procedure->id}}">
@stop

@section('Content')
    <div class="col-md-12" id="app" v-cloak>
        <div class="pull-right">
            <button class="btn btn-primary" data-toggle="modal" href='#addTreeModal'>
                Add New Tree
            </button>
        </div>
        <div class="modal fade" id="addTreeModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add New Tree</h4>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" 
                                        v-model="newTree"
                                        placeholder="Enter Tree Title">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary" v-on:click="addTree()">
                            Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    
        <table class="table table-striped table-hover" 
            v-hide="tree.show"
            v-show="!tree.show">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-show="decisions.length == 0">
                    <td colspan="5" class="text-center">
                        <div class="alert alert-info">
                            No Data was found
                        </div>
                    </td>
                </tr>
                <tr v-for="(key, decision) in decisions">
                    <td>@{{key+1}}</td>
                    <td>@{{decision.title}}</td>
                    <td>
                        <button class="btn-info btn btn-xs" v-on:click="viewTree(decision)">
                            View
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="clearfix"></div>

        <div class="row" 
            v-show="tree.show"
            v-hide="!tree.show">

            <div class="col-md-12 text-center">
                <div>
                    <button class="btn btn-success btn-lg btn-circle">
                        @{{tree.data.title}}
                    </button>
                </div>

                <div class="col-md-6">
                    <div v-hide="tree.data.left == null">
                        <div class="pull-right"> 
                                @{{tree.data.left.label}}
                        </div>
                        <div class="clearfix"></div>
                        <div class="text-center">
                                @{{tree.data.left.title}}
                        </div>
                    </div>

                    <div class="text-center" v-show="tree.data.right == null ">
                        <button class="btn btn-primary btn-circle btn-lg">
                            New
                        </button>
                    </div>
                </div>


                <div class="col-md-6">
                    <div v-hide="tree.data.right == null">
                        <div class="pull-right"> @{{tree.data.right.label}}</div>
                        <div class="clearfix"></div>
                        <div class="text-center">
                            <h4> @{{tree.data.right.title}} </h4>
                        </div>
                    </div>

                    <div class="text-center" v-show="tree.data.right == null">
                        <button class="btn btn-primary btn-circle btn-lg">
                            New
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@section('footer')
    <script src="/js/vue.js"></script>
    <script src="/js/decisions.js"></script>
@stop