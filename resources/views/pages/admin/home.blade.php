@extends('layouts.admin')
@section('content')
<style type="text/css">
    #newfield {
        margin-top: 2%;
        margin-left:1%;
    }
    .newfield {
        margin-top: 2% !important;
    }
    .newfield input {
        max-width: 350px;
    }
</style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
                @if(Session::has('success'))
                    <small class="alert alert-success">
                        {{ Session::get('error') }}
                    </small>
                @endif
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box box-info">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="fa fa-envelope"></i>

                    <h3 class="box-title">Introduction</h3>
                    <!-- tools box -->

                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <form role="form" action="{{ route('post') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <textarea class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;" placeholder="Message" name="desc">{{ (isset($desc))? $desc->desc : '' }}</textarea><input name="_wysihtml5_mode" value="1" type="hidden">
                            {{--<iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" marginwidth="0" marginheight="0" style="display: inline; background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(221, 221, 221); border-style: solid; border-width: 1px; clear: none; float: none; margin: 0px; outline: 0px none rgb(51, 51, 51); outline-offset: 0px; padding: 10px; position: static; top: auto; left: auto; right: auto; bottom: auto; z-index: auto; vertical-align: text-bottom; text-align: start; box-sizing: border-box; box-shadow: none; border-radius: 0px; width: 100%; height: 125px;" width="0" height="0" frameborder="0"></iframe>--}}
                        </div>
                        <div class="box-footer clearfix">
                            <button name="submit" type="submit" class="pull-right btn btn-default" id="sendEmail">Update
                                <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="box box-info">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="fa fa-envelope"></i>

                    <h3 class="box-title">Headings</h3>

                    <!-- tools box -->

                    <!-- /. tools -->
                </div>
                <div class="box-body">
                   <table class="table table-striped table-responsive">
                       <thead>
                        <tr>
                            <th>Headings</th>
                            <small><a class="btn btn-primary btn-sm add">Add New</a></small>
                        </tr>
                       </thead>
                       <tbody class="field">

                        @if (!empty($contents))
                           @foreach ($contents as $content)
                               <tr>
                                   <form role="form" action="{{ route('updateHead', $content->id) }}" method="post">
                                   <td><input name="heading" class="form-control" value="{{ $content->heading }}" required></td>
                                       {{ csrf_field() }}

                                       <td><button class="btn btn-primary btn-sm" type="submit">Update</button>   <a href="" data-toggle="modal" data-target="#delete{{ $content->id }}"  class="btn btn-danger">Delete</a></td>
                                   </form>
                                </tr>
                                <div class="modal fade" id="delete{{ $content->id }}">
                                 <div class="modal-dialog">
                                 <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete Headimg</h4>
                                      </div>
                                      <div class="modal-body">
                                        <p>This action can not be reverted.</p>
                                      </div>
                                      <div class="modal-footer">
                                        <a href="{{ route('delete', $content->id) }}" class="btn btn-danger">Delete</a>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                      </div>
                                    </div>
                                </div>
                           @endforeach
                        @endif
                            @if (empty($contents))
                            <tr>
                                <td><h3>No Entries</h3></td>
                            </tr>
                            @endif()
                       </tbody>
                   </table>
                   <div id="newfield"></div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
