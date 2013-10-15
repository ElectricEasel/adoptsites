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
            previewDiv = $('#preview_' + id),
            previewImg = document.createElement('img'),
            selectedItem = modalDiv.find('.modal-body').find('.selected').data('id');

        previewImg.src = '/files/thumb/' + selectedItem + '/100/100/crop';
        previewImg.class = "img-polaroid";

        previewDiv.append(previewImg);
        targetInput.val(selectedItem);

        modalDiv.modal('hide');
    }
};