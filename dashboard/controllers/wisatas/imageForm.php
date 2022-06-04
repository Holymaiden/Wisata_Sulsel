<div class="modal fade imageModal" id="imageModal" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-l">
                <div class="modal-content">
                        <form class="repeater" id="imageForms" enctype="multipart/form-data">
                                <input type="hidden" id="id" name="id">
                                <input type="hidden" name="id" id="idImage">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="titleImage"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="ti-close"></i>
                                        </button>
                                </div>
                                <div class="modal-body mb-4">
                                        <div class="form-row">
                                                <div class="col-md-12 mb-12">
                                                        <div data-repeater-list="group-a">
                                                                <div data-repeater-item>
                                                                        <div class="row">
                                                                                <div class="col-md-12 col-sm-12 form-group">
                                                                                        <label for="image">Image 1</label>
                                                                                        <input type="file" class="form-control" name="images[0]" id="image1">
                                                                                </div>
                                                                        </div>
                                                                        <div class="row">
                                                                                <div class="col-md-12 col-sm-12 form-group">
                                                                                        <label for="image">Image 2</label>
                                                                                        <input type="file" class="form-control" name="images[1]" id="image2">
                                                                                </div>
                                                                        </div>
                                                                        <div class="row">
                                                                                <div class="col-md-12 col-sm-12 form-group">
                                                                                        <label for="image">Image 3</label>
                                                                                        <input type="file" class="form-control" name="images[2]" id="image3">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                        <button type="submit" id="imageUpdate" class="btn btn-primary">Update</button>
                                </div>
                        </form>
                </div>
        </div>
</div>