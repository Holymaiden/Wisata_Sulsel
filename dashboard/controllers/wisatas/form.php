<div class="modal fade ajaxModal" id="ajaxModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                        <form class="needs-validation" novalidate id="formsKu">
                                <input type="hidden" name="id" id="id">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="title"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="ti-close"></i>
                                        </button>
                                </div>
                                <div class="modal-body mb-4">
                                        <div class="form-row">
                                                <div class="col-md-12 mb-12">
                                                        <label for="name">Name</label>
                                                        <div class="input-group">
                                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                                                <div class="invalid-feedback">
                                                                        Masukan Nama.
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                                <div class="col-md-12 mb-12">
                                                        <label for="description">Description</label>
                                                        <textarea class="form-control" name="description" id="description" rows="3" Require></textarea>
                                                        <div class="invalid-feedback">
                                                                Masukan Description
                                                        </div>
                                                </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                                <div class="col-md-12 mb-12">
                                                        <label for="address">Address</label>
                                                        <div class="input-group">
                                                                <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
                                                                <div class="invalid-feedback">
                                                                        Masukan Description.
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                                <div class="col-md-12 mb-12">
                                                        <label for="category">Category</label>
                                                        <div class="input-group">
                                                                <select class="select2-example" multiple require id="category" name="category[]">
                                                                        <option disabled>Select Category</option>
                                                                        <?php
                                                                        require_once("../controllers/conn.php");
                                                                        $data = many("SELECT * FROM types");
                                                                        foreach ($data as $c) :
                                                                        ?>
                                                                                <option value="<?= $c['id'] ?>"><?= ucfirst($c['type']) ?></option>
                                                                        <?php endforeach ?>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                        Pilih Category.
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                                <div class="col-md-6 mb-6">
                                                        <label for="openHour">Open Hour</label>
                                                        <div class="input-group">
                                                                <input type="text" data-input-mask="time" value="10:10:10" class="form-control" name="openHour" id="openHour" placeholder="00:00:00" required>
                                                                <div class="invalid-feedback">
                                                                        Masukan Open Hour.
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-6 mb-6">
                                                        <label for="closeHour">Close Hour</label>
                                                        <div class="input-group">
                                                                <input type="text" data-input-mask="time" class="form-control" name="closeHour" id="closeHour" placeholder="00:00:00" required>
                                                                <div class="invalid-feedback">
                                                                        Masukan Close Hour.
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                                <div class="col-md-12 mb-12">
                                                        <label for="openDay">Days</label>
                                                        <div class="input-group">
                                                                <select class="select2-example" multiple require id="openDay" name="openDay[]">
                                                                        <option disabled>Select Day</option>
                                                                        <option value="Senin">Senin</option>
                                                                        <option value="Selasa">Selasa</option>
                                                                        <option value="Rabu">Rabu</option>
                                                                        <option value="Kamis">Kamis</option>
                                                                        <option value="Jumat">Jumat</option>
                                                                        <option value="Sabtu">Sabtu</option>
                                                                        <option value="Minggu">Minggu</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                        Pilih Days.
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                                <div class="col-md-12 mb-12">
                                                        <label for="fee">Fee</label>
                                                        <div class="input-group">
                                                                <input type="number" class="form-control" name="fee" id="fee" placeholder="Fee" required>
                                                                <div class="invalid-feedback">
                                                                        Masukan Fee.
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" id="saveBtn" class="btn btn-primary">Save</button>
                                        <button type="submit" id="updateBtn" class="btn btn-primary">Update</button>
                                </div>
                        </form>
                </div>
        </div>
</div>