<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Customer Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">

                    <div class="mb-3">
                        <label>Customer Name</label><br><br>
                        <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Address</label><br><br>
                        <input type="text" class="form-control" name="address" id="address" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Phone Number </label><br><br>
                        <input type="number" class="form-control" name="phoneNo" id="phoneNo" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Email</label><br><br>
                        <input type="email" class="form-control" name="email" id="email" placeholder="">
                        <input type="hidden" class="form-control" name="id" id="idC" placeholder="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="updateButton" class="btn btn-primary">SavUpdatee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="switchery-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal Dialog</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                <a href="javascript:;" class="btn btn-success">Action</a>
            </div>
        </div>
    </div>
</div>
