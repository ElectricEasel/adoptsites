var FileSelect = {
    modal: function (id) {
        var modalDiv = $('#modal_' + id),
            currentlySelectedId = $('#' + id).val();

        if (modalDiv.length) {
            modalDiv.find('.modal-body').load(
                modalDiv.data('remote'),
                function () {
                    modalDiv.modal('show');

                    var selectableItems = modalDiv.find('.item');

                    if (currentlySelectedId.length) {
                        modalDiv.find('[data-id="' + currentlySelectedId + '"]').addClass('selected');
                    }

                    selectableItems.on('click', function(){
                        var $this = $(this);

                        selectableItems.removeClass('selected');

                        $this.addClass('selected');
                    });
                }
            );
        }
    },

    select: function (id) {
        var targetInput = $('#' + id),
            modalDiv = $('#modal_' + id),
            previewImg = $('#preview_' + id),
            selectedItem = modalDiv.find('.modal-body').find('.selected').data('id');

        previewImg.attr('src', '/files/thumb/' + selectedItem + '/200/150/fit');

        targetInput.val(selectedItem);

        modalDiv.modal('hide');
    }
};