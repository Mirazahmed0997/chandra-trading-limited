

<div class="modal fade"
     id="createTypeModal"
     tabindex="-1"
     aria-labelledby="createTypeModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-sm">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="createTypeModalLabel">
                    Create Property Type
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>

            </div>

            <form action="<?= base_url('create_type') ?>" method="POST">

                <div class="modal-body">

                    <div class="mb-3">

                        <label for="category_name" class="form-label">
                            Property Type
                        </label>

                        <input type="text"
                               name="name"
                               id="category_name"
                               class="form-control"
                               placeholder="Enter property type"
                               required>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary btn-sm"
                            data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit"
                            class="btn btn-primary btn-sm">
                        Create
                    </button>

                </div>

            </form>

        </div>

    </div>
</div>