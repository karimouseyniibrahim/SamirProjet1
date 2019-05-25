<div class="modal fade" id="modalstatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-notify modal-primary text-left" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">{{$title}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <form action="{{ $url }}" id="validateform" method="post" enctype="multipart/form-data">
                <!--Body-->
                <div class="modal-body">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <select class="form-control" name="status" id="status" required>
                            <option value="" disabled selected>{{ adminTrans('inscription','status') }}</option>
                            <option value="1">{{trans('inscription.accept')}}</option>
                            <option value="2">{{trans('inscription.refuse')}}</option>
                        </select>
                    </div>
                    <input name="id" class="form-control" id="identifiant" type="hidden">
                    <input name="{{$name_id}}" class="form-control" id="{{$name_id}}" type="hidden">

                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <button type="submit"
                            class="btn btn-outline-primary waves-effect">{{ trans('inscription.validate') }} </button>
                </div>
            </form>
        </div>
        <!--/.Content-->
    </div>
</div>