var FileSelect = {
    modal: function (id) {
        var modalDiv = $('#modal_' + id);

        if (modalDiv.length) {
            modalDiv.find('.modal-body').load(
                modalDiv.data('remote'),
                function () {
                    modalDiv.modal('show');

                    var selectableItems = modalDiv.find('.item');

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
            selectedItem = modalDiv.find('.modal-body').find('.selected').data('path');

        targetInput.val(selectedItem);

        modalDiv.modal('hide');
    }
};